<?php

namespace App\Http\Controllers\Backend;

use ActivityLog\Models\ActivityLog;
use App\Http\Controllers\Controller;
use App\User;
use Areas\Models\City;
use Areas\Models\Region;
use Authors\Models\Authors;
use Blogs\Models\Blog;
use Books\Models\BookRequest;
use Books\Models\Books;
use Books\Models\BookWishlist;
use Categories\Models\Categories;
use Contacts\Models\Contact;
use Events\Models\Events;
use Gallery\Models\Gallery;
use Languages\Models\Language;
use Spatie\Permission\Models\Role;
use NewsTicker\Models\NewsTicker;
use Pages\Models\Page;
use Polls\Models\Polls;
use Services\Models\Service;
use SubCategories\Models\SubCategories;
use Tags\Models\Tags;
use Translates\Models\Translate;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Home';
        $pages = [];
        $users_count = User::count();
        $categories_count = Categories::count();
        $tags_count = Tags::count();

        $components = [
            [$users_count,'Users','users','primary'],
            [$categories_count,'Categories','list','primary'],
            [$tags_count,'Tags','list','primary'],
        ];

        return view('backend.index',compact('components','pages','title'));
    }
}
