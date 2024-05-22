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

    public function registerLearner(Request $request)
    {
        // Validate fields, including custom binary validation rule
        $attrs = $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'phone_num' => 'required|string',
            'password' => 'required|string',
            'proficiency_level' => 'required|string',
            
        ]);

        // Create user
        $learner = Learner::create([
            'name' => $attrs['name'],
            'gender' => $attrs['gender'],
            'age' => $attrs['age'],
            'phone_num' => $attrs['phone_num'],
            'password' => bcrypt($attrs['password']),
            'proficiency_level' => $attrs['proficiency_level'],
        ]);

        // Return user & token in response
        return response([
            'learner' => $learner
        ], 200);
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

      // refresh token
      public function refreshToken(Request $request)
      {
          try {
              // Retrieve the token from the request headers
              $token = $request->header('phone_num');
  
              \Log::info('Received container data: ' . $token);
  
              if (!$token) {
                  return response()->json(['error' => 'Token not provided'], 401);
              }
  
              // Authenticate the user using the provided token
              $learner = Learner::where('phone_num', $token)->first();
  
              if (!$learner) {
                  return response()->json(['error' => 'Invalid phone num'], 401);
              }
  
              // Generate a new token based on the user's email
              $newToken = $learner->createToken($learner->phone_num)->plainTextToken;
  
              return response()->json(['token' => $newToken], 200);
          } catch (\Exception $e) {
              return response()->json(['error' => $e->getMessage()], 500);
          }
      }

      public function learner()
      {
          return response([
              'learners' => [auth()->learner()]
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