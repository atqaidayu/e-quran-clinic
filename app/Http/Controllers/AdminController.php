<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request)
    {
        
        // Validate fields
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        // Attempt login
        if (!Auth::guard('admin')->attempt($attrs)) {
            return response([
                'message' => 'Invalid credentials.'
            ], 403);
        }

      
        // Return user & token in response
        $admin = Auth::guard('admin')->user();
        \Log::info('Received container data: ' . $admin);
        return response([
            'admin' => $admin,
            'token' => $admin->createToken('secret')->plainTextToken
        ], 200);
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/viewlogin');
    }

    // Other methods...
}
