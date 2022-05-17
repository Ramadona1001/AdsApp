<?php

namespace App\AdsFilter;

use Ads\Models\AdTag;
use Closure;

class Tags
{
    public function handle($request, Closure $next)
    {
        $data = $next($request);
        if (request()->has('tags')) {
            $search = request('tags');
            if (count($search) > 0) {
                $ads_tag = AdTag::whereIn('tag_id',$search)->pluck('ad_id');
                $data->whereIn('id',$ads_tag);
                return $data;
            }
        }
        return $data;
    }
}
