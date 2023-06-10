<?php

namespace galbert\cwhelpers;

use Illuminate\Http\Request;

class CWPaginator {

    public static function getNextPageUrl(Request $request, $nextPage) {

        if ($nextPage == null) {
            return null;
        }

        $nextUrl = $request->fullUrlWithQuery(['page' => $nextPage]);

        return $nextUrl;
    }

    public static function getNextPageNumber($currentPage, $lastPage) {

        $next = $currentPage + 1 > $lastPage ? null : $currentPage + 1;

        return $next;
    }

}
