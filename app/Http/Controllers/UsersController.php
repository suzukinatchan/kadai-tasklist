<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
     public function index()
    {
        $users = User::paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
     public function show($id)
    {
        $user = User::find($id);
        $tasks = $user->tasks()->orderby('created_at','desc')->pagenate(10);
        
        $data = [
            'user' => $user,
            'tasks' =>$tasks,
            ];
            
        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
}
