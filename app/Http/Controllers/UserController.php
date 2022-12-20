<?php

namespace App\Http\Controllers;

use App\Http\{
  Controllers\Controller,
  Requests\User as Request,
  Resources\User as Resource
};
use App\Models\User as Entity;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return Resource
   */
  public function index() {
    return Resource::collection(Entity::get());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request\Create $request
   * @return Resource
   */
  public function store(Request\Store $request) {
    $ent = Entity::create([
      'name'     => $request->name,
      'email'    => $request->email,
      'password' => Hash::make($request->password)
    ]);

    return new Resource($ent);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param Entity $ent
   * @return \Illuminate\Http\Response
   */
  public function update(Request\Update $request, Entity $user) {
    $user->fill($request->all())->save();
    return new Resource($user);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Entity $ent
   * @return \Illuminate\Http\Response
   */
  public function destroy(Entity $user) {
    $user->delete();
    return new Resource($user);
  }
}
