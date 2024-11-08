<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GeneralJsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): object {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): object {
        $user_created = User::create($request->validated());
        return new UserResource($user_created);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): object {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user): object {
        $user->update($request->validated());
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): object {
        $user->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
