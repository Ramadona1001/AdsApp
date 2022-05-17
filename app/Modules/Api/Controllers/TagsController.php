<?php

namespace Api\Controllers;

use App\Http\Controllers\Controller;
use Tags\Requests\TagsRequest;
use Illuminate\Http\Request;
use Tags\Repositories\TagsRepository;

class TagsController extends Controller
{
    public $path;
    private $tagsRepository;

    public function __construct(TagsRepository $tagsRepository)
    {
        $this->middleware('auth:api',['except'=>[
            'index',
            'show'
        ]]);

        $this->tagsRepository = $tagsRepository;
    }

    public function index()
    {
        $tags = $this->tagsRepository->allData();
        return response()->json([
            'data' => $tags
        ],200);
    }

    public function store(TagsRequest $request)
    {
        $this->tagsRepository->saveData($request,null);
        return response()->json([
            'data' => 'success'
        ],200);
    }

    public function show($id)
    {
        $tags = $this->tagsRepository->getDataId($id);
        if ($tags) {
            return response()->json([
                'data' => $tags
            ],200);
        }else{
            return response()->json([
                'data' => 'not found'
            ],404);
        }
    }

    public function update(TagsRequest $request,$id)
    {
        $this->tagsRepository->saveData($request,$id);
        return response()->json([
            'data' => 'success'
        ],200);
    }

    public function destroy($id){
        $this->tagsRepository->deleteData($id);
        return response()->json([
            'data' => 'success'
        ],200);
    }
}
