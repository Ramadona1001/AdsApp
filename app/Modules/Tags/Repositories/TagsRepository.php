<?php


namespace Tags\Repositories;

use Tags\Models\Tags;
use File;

class TagsRepository implements TagsRepositoryInterface
{
    public function allData(){
        return Tags::all();
    }

    public function dataWithConditions( $conditions){
        $wheres = '';
        foreach ($conditions as $key => $value){
            $wheres .= '->where("'.$key.'","'.$key.'")';
        }
        $wheres = str_replace("'","",$wheres);
        return Tags::$wheres->get();
    }

    public function getDataId($id){
        return Tags::where('id',$id)->first();
    }

    public function saveData($request,$id = null)
    {
        if ($id == null) {
            $tags = new Tags();
        }else{
            $tags = $this->getDataId($id);
        }
        $tags->title = $request->title;
        $tags->content = $request->content;
        $tags->save();
    }

    public function deleteData($id)
    {
        $tags = Tags::findOrfail($id);
        $tags->delete();
    }
}
