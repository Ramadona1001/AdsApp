<?php

namespace Api\Controllers;

use App\Http\Controllers\Controller;
use Categories\Repositories\CategoriesRepository;
use Categories\Requests\CategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoriesController extends Controller
{
    public $path;
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->middleware('auth:api',['except'=>[
            'index',
            'show'
        ]]);

        $this->categoriesRepository = $categoriesRepository;
    }

    public function index()
    {
        $categories = $this->categoriesRepository->allData();
        return response()->json([
            'data' => $categories
        ],200);
    }

    public function store(CategoriesRequest $request)
    {
        $this->categoriesRepository->saveData($request,null);
        return response()->json([
            'data' => 'success'
        ],200);
    }

    public function show($id)
    {
        $categories = $this->categoriesRepository->getDataId($id);
        if ($categories) {
            return response()->json([
                'data' => $categories
            ],200);
        }else{
            return response()->json([
                'data' => 'not found'
            ],404);
        }
    }

    public function update(CategoriesRequest $request,$id)
    {
        $this->categoriesRepository->saveData($request,$id);
        return response()->json([
            'data' => 'success'
        ],200);
    }

    public function destroy($id){
        $this->categoriesRepository->deleteData($id);
        return response()->json([
            'data' => 'success'
        ],200);
    }
}
