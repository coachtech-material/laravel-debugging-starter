<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // TODO: dd()でリクエストデータを確認する
        // dd($request->all());

        // TODO: Log::info()で処理の流れを追跡する
        // \Log::info('User registration attempt', $request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // TODO: Log::info()でユーザー作成を記録する
        // \Log::info('User created successfully', ['user_id' => $user->id]);

        return redirect('/users');
    }
}
