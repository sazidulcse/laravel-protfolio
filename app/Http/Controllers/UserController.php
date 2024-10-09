<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // Fetch all users
        $users = User::all();

        // Pass users to the view
        return view('users.index', compact('users'));
    }

    public function toggleStatus(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);
        
        // Check if the user is being activated
        if (!$user->is_active) {
            // Deactivate all other users
            User::where('is_active', 1)->update(['is_active' => 0]);
        }

        // Toggle the is_active status
        $user->is_active = !$user->is_active;
        $user->save();

        // Return a response
        return response()->json(['success' => true, 'is_active' => $user->is_active]);
    }
}
