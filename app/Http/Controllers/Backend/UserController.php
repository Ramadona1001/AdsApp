<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserData;
use App\VerifyUserRequest;
use Auth;
use Spatie\Permission\Models\Role;
use File;
use Hash;

class UserController extends Controller
{
    public $path = 'backend.pages.users.';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($type = null)
    {
        hasPermissions('show_users');
        $title = $type.' (Users)';
        $pages = [
            ['Users','users']
        ];
        if ($type != null) {
            $users = User::role($type)->get();
        }else{
            $users = User::all();
        }
        return view($this->path.'index',compact('users','pages','title'));
    }

    public function create()
    {
        hasPermissions('create_users');
        $title = 'Create New User';
        $pages = [
            ['Users','users'],
            ['Create New User','create_users']
        ];
        $roles = $roles = Role::all();
        return view($this->path.'create',compact('roles','pages','title'));
    }

    public function store(Request $request)
    {
        hasPermissions('create_users');
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:255',
            'title.*' => 'required',
            'content.*' => 'required',
            'slug.*' => 'required',
        ]);

        $user = new User();
        $user->name = $request->title['en'];
        $user->email = $request->email;
        $user->publish = 1;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->assignRole($request->roles);

        return redirect()->route('users',['type'=>$request->roles])->with('success');
    }

    public function show($id)
    {
        hasPermissions('show_users');
        $title ='Show User Data';
        $user = User::findOrfail($id);
        $pages = [
            ['Users','users'],
            [$user->name,'']
        ];
        return view($this->path.'show',compact('user','pages','title'));
    }

    public function edit($id)
    {
        hasPermissions('update_users');
        $title ='Edit User Data';
        $user = User::findOrfail($id);
        $showUrl = route('show_users', ['id'=>$user->id]);
        $pages = [
            ['Users','users'],
            [$user->name,['show_users',$user->id]]
        ];
        $roles = Role::all();
        return view($this->path.'edit',compact('user','roles','pages','title'));
    }

    public function profile()
    {
        $title ='Edit My Profile';
        $user = Auth::user();
        $pages = [
            ['My Profile',''],
        ];
        $roles = Role::all();
        return view($this->path.'profile',compact('user','roles','pages','title'));
    }

    public function update($id,Request $request)
    {
        hasPermissions('update_users');
        $user = User::findOrfail($id);

        if ($request->password) {
            $request->validate([
                'name' => 'required|min:2|max:255',
                'email' => 'unique:users,email,'.$user->id,
                'password' => 'confirmed|min:6|max:255',
            ]);
        }else{
            $request->validate([
                'name' => 'required|min:2|max:255',
                'email' => 'unique:users,email,'.$user->id,
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if (isset($request->roles)) {
            foreach ($request->roles as $role) {
                $roleName = Role::findOrfail($role);
                $user->syncRoles($roleName->name);
            }
        }

        return redirect()->route('users')->with('success','');
    }

    public function destroy($id)
    {
        hasPermissions('delete_users');
        $user = User::findOrfail($id);
        $user->delete();
        return redirect()->route('users')->with('success','');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
