<?php

namespace App\AdsFilter;
use Closure;

class Category
{
    public function handle($request, Closure $next)
    {
        $data = $next($request);

        if (request()->has('category')) {
            $search = request('category');
            if ($search != '') {
                $data->where('category_id',$search);
            }

        }
        return $data;
    }
}
