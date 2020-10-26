<?php

namespace App\Http\Controllers;

use App\Rank;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public  function index()
    {
        return view('users.index')
            ->with('users',User::all());

    }
    public function create()
    {
        return view('users.create')
            ->with('ranks',Rank::all());

    }
    public function store(Request $request)
    {
        $user=new User();
        $user->username=$request->uname;
        $user->name=$request->fname;
        $user->rank_id=$request->rank;
        $user->password=Hash::make($request->password);
        $user->type='user';
        $user->save();
        Session::flash('message', 'تم انشاء المستخدم بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect('/users');

    }
    public function delete($id)
    {
        User::destroy($id);
    }
}
