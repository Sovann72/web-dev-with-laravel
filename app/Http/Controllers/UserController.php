<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id')->get();

        $tmp = [];
        foreach($users as $user) {
            unset($user["password"]);

            array_push($tmp, $user);
        }

        return $tmp;
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
    public function store(StoreUserRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // if(!(auth()->user()->id != $user->id && auth()->user()->role == "user") || (auth()->user()->id != $user->id && auth()->user()->role != "admin")) {
        //     return response([
        //         "message" => "Fobidden resource"
        //     ], 403);
        //     // return $found;
        // }

        $found = User::find($user);
        if(!isset($found)) {
            return response([
                'message' => 'Resource not found!'
            ], 404);
        }

        return $found;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
