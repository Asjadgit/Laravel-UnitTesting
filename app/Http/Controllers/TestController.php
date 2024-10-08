<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function test()
    {
        return 'Salaam';
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user in the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Return a response (optional, depending on your needs)
        return response()->json(['message' => 'User created successfully'], 200);
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id, // Ensure unique email except for this user
            'password' => 'nullable|string|min:8', // Password is optional
        ]);


        $updateData = [
            'name' => $req->name,
            'email' => $req->email,
        ];

        if ($req->filled('password')) {
            $updateData['password'] = Hash::make($req->password);
        }

        DB::table('users')->where('id', $id)->update($updateData);

        return response()->json(['message' => 'User updated successfully'], 200);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
