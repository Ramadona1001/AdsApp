<?php

namespace Categories\Controllers;

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
        $this->middleware('auth');
        $this->path = 'Categories::';
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index()
    {
        hasPermissions('show_categories');
        $title = 'Categories';
        $pages = [
            ['Categories','categories']
        ];
        $categories = $this->categoriesRepository->allData();
        return view($this->path.'index',compact('categories','pages','title'));
    }

    public function create()
    {
        hasPermissions('create_categories');
        $title = 'Create Categories';
        $pages = [
            ['All Categories','categories'],
            ['Create Categories','create_categories']
        ];
        return view($this->path.'create',compact('pages','title'));
    }

    public function store(CategoriesRequest $request)
    {
        hasPermissions('create_categories');
        $this->categoriesRepository->saveData($request,null);
        return redirect()->route('categories')->with('success','');
    }

    public function show($id)
    {
        hasPermissions('show_categories');
        $id = Crypt::decrypt($id);
        $categories = $this->categoriesRepository->getDataId($id);

        $title = 'Show Categories Details';
        $pages = [
            ['Categories','categories'],
        ];
        return view($this->path.'.show',compact('categories','title','pages'));
    }

    public function edit($id)
    {
        hasPermissions('update_categories');
        $id = Crypt::decrypt($id);
        $categories = $this->categoriesRepository->getDataId($id);

        $title = 'Edit Categories Data';
        $pages = [
            ['Categories','categories'],
        ];
        return view($this->path.'.edit',compact('categories','title','pages'));
    }

    public function update(CategoriesRequest $request,$id)
    {
        hasPermissions('update_categories');
        $id = Crypt::decrypt($id);
        $this->categoriesRepository->saveData($request,$id);
        return redirect()->route('categories')->with('success','');
    }

    public function destroy($id){
        hasPermissions('delete_categories');
        $id = Crypt::decrypt($id);
        $this->categoriesRepository->deleteData($id);
        return back()->with('success','');
    }
}
