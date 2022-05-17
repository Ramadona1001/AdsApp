<?php

namespace Ads\Controllers;

use App\Http\Controllers\Controller;
use Ads\Repositories\AdsRepository;
use Ads\Requests\AdsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdsController extends Controller
{
    public $path;
    private $adsRepository;

    public function __construct(AdsRepository $adsRepository)
    {
        $this->middleware('auth');
        $this->path = 'Ads::';
        $this->adsRepository = $adsRepository;
    }

    public function index()
    {
        hasPermissions('show_ads');
        $title = 'Ads';
        $pages = [
            ['Ads','ads']
        ];
        $ads = $this->adsRepository->allData();
        return view($this->path.'index',compact('ads','pages','title'));
    }

    public function create()
    {
        hasPermissions('create_ads');
        $title = 'Create Ads';
        $pages = [
            ['All Ads','ads'],
            ['Create Ads','create_ads']
        ];
        $categories = $this->adsRepository->categories();
        $tags = $this->adsRepository->tags();
        return view($this->path.'create',compact('pages','title','categories','tags'));
    }

    public function store(AdsRequest $request)
    {
        hasPermissions('create_ads');
        $this->adsRepository->saveData($request,null);
        return redirect()->route('ads')->with('success','');
    }

    public function show($id)
    {
        hasPermissions('show_ads');
        $id = Crypt::decrypt($id);
        $ads = $this->adsRepository->getDataId($id);

        $title = 'Show Ads Details';
        $pages = [
            ['Ads','ads'],
        ];
        return view($this->path.'.show',compact('ads','title','pages'));
    }

    public function edit($id)
    {
        hasPermissions('update_ads');
        $id = Crypt::decrypt($id);
        $ads = $this->adsRepository->getDataId($id);

        $title = 'Edit Ads Data';
        $pages = [
            ['Ads','ads'],
        ];
        $categories = $this->adsRepository->categories();
        $tags = $this->adsRepository->tags();
        $ad_tags = $this->adsRepository->adTags($id);
        return view($this->path.'.edit',compact('ads','title','pages','categories','tags','ad_tags'));
    }

    public function update(AdsRequest $request,$id)
    {
        hasPermissions('update_ads');
        $id = Crypt::decrypt($id);
        $this->adsRepository->saveData($request,$id);
        return redirect()->route('ads')->with('success','');
    }

    public function destroy($id){
        hasPermissions('delete_ads');
        $id = Crypt::decrypt($id);
        $this->adsRepository->deleteData($id);
        return back()->with('success','');
    }
}
