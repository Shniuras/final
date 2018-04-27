<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $showUser = User::orderBy('id','desc')->paginate(5);
        return view('user.index', ['showUser' => $showUser]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreUserRequest $userRequest)
    {
        $user = Auth::user();
        $user->create([
            'display_name' => $userRequest['name'],
            'email' => $userRequest['email'],
            'password' => Hash::make($userRequest['password']),
        ]);
        return redirect()->route('user.index');

    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', ['userSingle' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit',['edit' => $user]);
    }

    public function update(EditUserRequest $editUserRequest, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'display_name' => $editUserRequest->get('name'),
            'email' => $editUserRequest->get('email'),
            'password' => $editUserRequest->get('password')
        ]);
        return redirect()->route('user.show',$id);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
