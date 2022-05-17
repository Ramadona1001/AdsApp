<?php

namespace Api\Controllers;

use Ads\Repositories\AdsRepository;
use App\Http\Controllers\Controller;
use Ads\Requests\AdsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdsController extends Controller
{
    public $path;
    private $adsRepository;

    public function __construct(AdsRepository $adsRepository)
    {
        $this->middleware('auth:api',['except'=>[
            'filter',
            'advertiser'
        ]]);

        $this->adsRepository = $adsRepository;
    }

    public function filter()
    {
        $ads = $this->adsRepository->filter();
        return response()->json([
            'data' => $ads
        ],200);
    }

    public function advertiser($id)
    {
        $ads = $this->adsRepository->advertiser($id);
        return response()->json([
            'data' => $ads
        ],200);
    }
}
