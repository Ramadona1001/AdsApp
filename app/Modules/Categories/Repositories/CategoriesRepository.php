<?php


namespace Categories\Repositories;

use Categories\Models\Categories;
use File;

class CategoriesRepository implements CategoriesRepositoryInterface
{
    public function allData(){
        return Categories::all();
    }

    public function dataWithConditions( $conditions){
        $wheres = '';
        foreach ($conditions as $key => $value){
            $wheres .= '->where("'.$key.'","'.$key.'")';
        }
        $wheres = str_replace("'","",$wheres);
        return Categories::$wheres->get();
    }

    public function getDataId($id){
        return Categories::where('id',$id)->first();
    }

    public function saveData($request,$id = null)
    {
        if ($id == null) {
            $category = new Categories();
        }else{
            $category = $this->getDataId($id);
        }
        $category->title = $request->title;
        $category->content = $request->content;
        $category->save();
    }

    public function deleteData($id)
    {
        $category = Categories::findOrfail($id);
        $category->delete();
    }
}
