<?php

namespace galbert\cwhelpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CWFile
{
    public static function renameFile (Request $request, $key)
    {
        /**
         * @param Request $request
         * @param $key
         * @return string
         * This function returns the filename (string) of the file, after uploading the file to disk
         * This function in specific for storing a new image
         */
        $chars = [' ', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '+', '=',
            '[', ']', '{', '}', ';', ':', "'", '"', ',', '<', '>', '.', '/', '?', '`', '~'];

        $ext = '.'.$request->$key->getClientOriginalExtension();
        $originalFilename = $request->$key->getClientOriginalName();
        $originalFilename = str_replace($ext, "", $originalFilename);
        $originalFilename = str_replace($chars, "_", $originalFilename);
        $fileName = date('dmYHis-').$originalFilename.$ext;
        $fileName = strtolower($fileName);
        return $fileName;
    }

    public static function storeImage(Request $request, $key, $disk)
    {
        // $request->validate([
        //     $key => 'image|max:2048'
        // ]);

        /*Check if new file exist*/
        if ($request->hasFile($key)){

            /* Get File */
            $uploadedFile = $request->file($key);

            /* Rename image */
            $fileName = self::renameFile($request, $key);

            /* Put new image in storage */
            Storage::disk($disk)->put($fileName, File::get($uploadedFile));

            return $fileName;
        }
    }

    /**
     * @param Request $request
     * @param $model
     * @param $column
     * @param $key
     * @param $disk
     * @param $id
     * @return string|string[]
     * This function returns the filename (string) of the file, after uploading the file to disk
     * This function in specific for updating an image, where the old image must be deleted
     */

    public static function updateImage(Request $request, $key, $disk, $model, $id, $column)
    {
        // $request->validate([
        //     $key => 'image|max:2048'
        // ]);

        /* Define Old Image */
        $oldImage = $model::find($id);

        /*Check if new file exist*/
        if ($request->hasFile($key)){

            /* Get File */
            $uploadedFile = $request->file($key);

            /* Rename image */
            $fileName = self::renameFile($request, $key);

            /* Put new image in storage */
            Storage::disk($disk)->put($fileName, File::get($uploadedFile));

            /* Delete old image in storage */
            Storage::disk($disk)->delete($oldImage->$column);

            return $fileName;
        }

        /* If user don't input new file */
        else {
            return $oldImage->$column;
        }
    }

    public static function storeImageInSubDir(Request $request, $key, $disk, $slug)
    {
        // $request->validate([
        //     $key => 'image|max:2048'
        // ]);

        /*Check if new file exist*/
        if ($request->hasFile($key)){

            /* Get File */
            $uploadedFile = $request->file($key);

            /* Rename image */
            $fileName = self::renameFile($request, $key);

            /* Put new image in storage */
            Storage::disk($disk)->put('/'.$slug.'/'.$fileName, File::get($uploadedFile));

            return $fileName;
        }
    }

    public static function updateImageInSubDir (Request $request, $key, $disk, $slug, $model, $id, $column)
    {
        // $request->validate([
        //     $key => 'image|max:2048'
        // ]);

        /* Define Old Image */
        $oldImage = $model::find($id);

        /*Check if new file exist*/
        if ($request->hasFile($key)){

            /* Get File */
            $uploadedFile = $request->file($key);

            /* Rename image */
            $fileName = self::renameFile($request, $key);

            /* Put new image in storage */
            Storage::disk($disk)->put('/'.$slug.'/'.$fileName, File::get($uploadedFile));

            /* Delete old image in storage */
            Storage::disk($disk)->delete('/'.$slug.'/'.$oldImage->$column);

            return $fileName;
        }

        /* If user don't input new file */
        else {
            return $oldImage->$column;
        }
    }

    public static function deleteImage($key, $disk) {
        Storage::disk($disk)->delete($key);
    }


}
