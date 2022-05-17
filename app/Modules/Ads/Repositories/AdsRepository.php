<?php


namespace Ads\Repositories;

use Ads\Models\Ads;
use Ads\Models\AdTag;
use Categories\Models\Categories;
use Tags\Models\Tags;
use Illuminate\Pipeline\Pipeline;

class AdsRepository implements AdsRepositoryInterface
{
    public function allData(){
        return Ads::all();
    }

    public function dataWithConditions( $conditions){
        $wheres = '';
        foreach ($conditions as $key => $value){
            $wheres .= '->where("'.$key.'","'.$key.'")';
        }
        $wheres = str_replace("'","",$wheres);
        return Ads::$wheres->get();
    }

    public function getDataId($id){
        return Ads::where('id',$id)->first();
    }

    public function saveData($request,$id = null)
    {
        if ($id == null) {
            $ad = new Ads();
        }else{
            $ad = $this->getDataId($id);
            AdTag::where('ad_id',$ad->id)->delete();
        }
        $ad->title = $request->title;
        $ad->content = $request->content;
        $ad->category_id = $request->category;
        $ad->user_id = auth()->user()->id;
        $ad->type = $request->type;
        $ad->start_date = $request->start_date;
        $ad->save();

        foreach ($request->tags as $tag) {
            $tags = new AdTag();
            $tags->ad_id = $ad->id;
            $tags->tag_id = $tag;
            $tags->save();
        }

    }

    public function deleteData($id)
    {
        $ad = Ads::findOrfail($id);
        $ad->delete();
    }

    public function categories()
    {
        return Categories::all();
    }

    public function tags()
    {
        return Tags::all();
    }

    public function adTags($id)
    {
        return AdTag::where('ad_id',$id)->pluck('tag_id')->toArray();
    }

    public function advertiser($id)
    {
        return Ads::where('user_id',$id)->get();
    }

    public function filter()
    {
        $query = Ads::query();
        $ads = app(Pipeline::class)->send($query)->through([
            \App\AdsFilter\Tags::class,
            \App\AdsFilter\Category::class,
        ])->thenReturn();

        return $ads->get();
    }
}
