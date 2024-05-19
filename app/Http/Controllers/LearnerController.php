<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\Learner;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLearnerRequest;
use App\Http\Requests\UpdateLearnerRequest;

class LearnerController extends Controller
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
        if (!Auth::guard('learner')->attempt($attrs)) {
            return response([
                'message' => 'Invalid credentials.'
            ], 403);
        }

      
        // Return user & token in response
        $learner = Auth::guard('learner')->user();
        \Log::info('Received container data: ' . $learner);
        return response([
            'learner' => $learner,
            'token' => $learner->createToken('secret')->plainTextToken
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
    public function store(StoreLearnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Learner $learner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Learner $learner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLearnerRequest $request, Learner $learner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Learner $learner)
    {
        //
    }
}
