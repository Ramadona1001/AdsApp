<?php

namespace Tags\Controllers;

use App\Http\Controllers\Controller;
use Tags\Repositories\TagsRepository;
use Tags\Requests\TagsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TagsController extends Controller
{
    public $path;
    private $tagsRepository;

    public function __construct(TagsRepository $tagsRepository)
    {
        $this->middleware('auth');
        $this->path = 'Tags::';
        $this->tagsRepository = $tagsRepository;
    }

    public function index()
    {
        hasPermissions('show_tags');
        $title = 'Tags';
        $pages = [
            ['Tags','tags']
        ];
        $tags = $this->tagsRepository->allData();
        return view($this->path.'index',compact('tags','pages','title'));
    }

    public function create()
    {
        hasPermissions('create_tags');
        $title = 'Create Tags';
        $pages = [
            ['All Tags','tags'],
            ['Create Tags','create_tags']
        ];
        return view($this->path.'create',compact('pages','title'));
    }

    public function store(TagsRequest $request)
    {
        hasPermissions('create_tags');
        $this->tagsRepository->saveData($request,null);
        return redirect()->route('tags')->with('success','');
    }

    public function show($id)
    {
        hasPermissions('show_tags');
        $id = Crypt::decrypt($id);
        $tags = $this->tagsRepository->getDataId($id);

        $title = 'Show Tags Details';
        $pages = [
            ['Tags','tags'],
        ];
        return view($this->path.'.show',compact('tags','title','pages'));
    }

    public function edit($id)
    {
        hasPermissions('update_tags');
        $id = Crypt::decrypt($id);
        $tags = $this->tagsRepository->getDataId($id);

        $title = 'Edit Tags Data';
        $pages = [
            ['Tags','tags'],
        ];
        return view($this->path.'.edit',compact('tags','title','pages'));
    }

    public function update(TagsRequest $request,$id)
    {
        hasPermissions('update_tags');
        $id = Crypt::decrypt($id);
        $this->tagsRepository->saveData($request,$id);
        return redirect()->route('tags')->with('success','');
    }

    public function destroy($id){
        hasPermissions('delete_tags');
        $id = Crypt::decrypt($id);
        $this->tagsRepository->deleteData($id);
        return back()->with('success','');
    }
}
