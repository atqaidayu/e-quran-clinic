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

    public function registerTutor(Request $request)
    {
        // Validate fields, including custom binary validation rule
        $attrs = $request->validate([
            'name' => 'required|string',
            'about' => 'required|string',
            'phone_num' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'profile_picture' => 'required|string',
            'age' => 'required|int',
            'gender' => 'required|string',
            'document' => 'required|string',
            'status' => 'required|string',
        ]);

        // Create user
        $tutor = Tutor::create([
            'name' => $attrs['name'],
            'about' => $attrs['about'],
            'phone_num' => $attrs['phone_num'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password']),
            'profile_picture' => $attrs['profile_picture'],
            'age' => $attrs['age'],
            'gender' => $attrs['gender'],
            'document' => $attrs['document'],
            'status' => $attrs['status'],
        ]);

        // Return user in response
        return response([
            'tutor' => $tutor
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
        if (!Auth::guard('tutor')->attempt($attrs)) {
            return response([
                'message' => 'Invalid credentials.'
            ], 403);
        }

        // Retrieve the authenticated tutor
        $tutor = Auth::guard('tutor')->user();

        // Check if the tutor's status is active
        if ($tutor->status !== 'active') {
            return response([
                'message' => 'Account is not active.'
            ], 403);
        }

        // Log tutor data
        \Log::info('Received tutor data: ', $tutor->toArray());

        // Return user & token in response
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
    public function show_tutor(Tutor $tutor)
    {
        $tutors = Tutor::all();
        
        // Pass the tutors to the view
        return view('tutor-management', compact('tutors'));
       
    }

    public function remove_tutor($id)
    {
        $tutor = Tutor::find($id);
        $tutor->delete();

        return redirect()->back();
       
    }

    public function update_tutor($id)
    {
        $tutor = Tutor::find($id);
    
        return view('updatetutor', compact('tutor'));
       
    }

    public function update_tutor2($id)
    {
        $tutor = Tutor::find($id);
    
        return view('updatetutor', compact('tutor'));
       
    }

    public function edit_tutor(Request $request, $id)
    {
        $tutor = Tutor::find($id);
     
        $tutor->name = $request->name;
        $tutor->about = $request->about;
        $tutor->age = $request->age;
        $tutor->gender = $request->gender;
        $tutor->status = $request->status;

        $tutor->save();
        return redirect()->back();
       
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
