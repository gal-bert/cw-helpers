<?php

namespace galbert\cwhelpers;

use Illuminate\Support\Str;

class CWSlug
{

    public static function createSlug($title, $model, $slugColumn)
    {
        $id = 0;
        $slug = Str::slug($title);
        $allSlugs = (new CWSlug)->getRelatedSlugs($slug, $slugColumn, $model);
        if (! $allSlugs->contains($slugColumn, $slug)){
            return $slug;
        }
        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains($slugColumn, $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }

    private function getRelatedSlugs($slug, $column, $model)
    {
        return $model::select($column)->where($column, 'like', $slug.'%')->get();
    }

}
