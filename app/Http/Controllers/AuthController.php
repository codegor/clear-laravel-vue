<?php

namespace App\Http\Controllers;

use App\Models\User as Entity;
use App\Http\{
  Controllers\Controller,
  Requests\Auth as Request,
  Resources\Auth as Resource
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController {
  /**
   * Create User
   * @param Request\Create $request
   * @return Resource | \Illuminate\Http\Response
   */
  public function create(Request\Create $request) {
    try {
      $ent = Entity::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password)
      ]);

      return new Resource($ent);

    } catch (\Throwable $th) {
      return response()->json([
        'status'  => false,
        'message' => $th->getMessage()
      ], 500);
    }
  }

  /**
   * Login The Entity
   * @param Request\Login $request
   * @return Resource | \Illuminate\Http\Response
   */
  public function login(Request\Login $request) {
    try {
      if (!Auth::attempt($request->only(['email', 'password']))) {
        return response()->json([
          'status'  => false,
          'message' => 'Email & Password does not match with our record.',
        ], 401);
      }

      $ent = Entity::where('email', $request->email)->first();

      return new Resource($ent);
    } catch (\Throwable $th) {
      return response()->json([
        'status'  => false,
        'message' => $th->getMessage()
      ], 500);
    }
  }

  public function logout() {
    Auth::logout();
  }
}
