<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->paginate(10);
        // dd($users);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'role'=>'required'
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);
          if ($request->role === 'doctor') {
        doctor::create([
            'user_id' => $user->id,
            'start_date' => $user->created_at,
        ]);
    }

        return redirect()->route('admin.users.index')->with('success', 'User added successfully');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // dd($request->all(),$user);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'role'=>'required'
        ]);
        $user=User::findOrFail($user->id);
        // dd($user);
        // dd($user->email);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->role= $request->role;

        // User::update([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'role'=>$request->role,
        // ]);

        if ($request->filled('password')) {
            $user->update(['password'=>Hash::make($request->password)]);
        }
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        // dd($user->id);
    $user = User::findOrFail($user->id);

    $user->delete();
        // $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}