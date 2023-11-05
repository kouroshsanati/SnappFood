<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $user = User::query()->create($request->validated());
        $token = $user->createToken('registered')->plainTextToken;
        return response([
            'token' => $token,
            'message' => 'User has been registered successfully'
        ]);
    }


    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $token = Auth::user()->createToken('loggedIn')->plainTextToken;
            return response([
                'token' => $token,
                'message' => 'User has been logged in successfully'
            ]);
        } else {

            return response([
                'message' => 'no user has been found'
            ], 401);
        }

    }


    /**
     * Display a listing of the resource.
     */
    public
    function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public
    function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(string $id)
    {
        //
    }
}
