<?php

// app/Http/Controllers/UsersController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth'); // Ensure only authenticated users can access
    // }

    public function admin()
    {
        // Get all users with their roles
        $users = User::all();
        $currentUser = Auth::user(); // Get the currently logged-in user
        
        return view('users.admin', compact('users', 'currentUser'));
    }

    public function destroy($id)
    {
        // Find the user to be deleted
        $user = User::findOrFail($id);

        // Prevent deletion of the logged-in user
        if ($user->id === Auth::id()) {
            return redirect()->route('users.admin')->with('error', 'You cannot delete your own account.');
        }

        // Delete the user
        $user->delete();

        return redirect()->route('users.admin')->with('success', 'User deleted successfully.');
    }
}
