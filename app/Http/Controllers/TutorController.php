<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Tutor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTutorRequest;
use App\Http\Requests\UpdateTutorRequest;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function login(Request $request)
    {
        
        // Validate fields
        $attrs = $request->validate([
            'phone_num' => 'required',
            'password' => 'required|min:8'
        ]);

        // Attempt login
        if (!Auth::guard('tutor')->attempt($attrs)) {
            return response([
                'message' => 'Invalid credentials.'
            ], 403);
        }

      
        // Return user & token in response
        $tutor = Auth::guard('tutor')->user();
        \Log::info('Received container data: ' . $tutor);
        return response([
            'tutor' => $tutor,
            'token' => $tutor->createToken('secret')->plainTextToken
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTutorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutor $tutor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTutorRequest $request, Tutor $tutor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
