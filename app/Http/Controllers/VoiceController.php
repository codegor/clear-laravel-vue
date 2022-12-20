<?php

namespace App\Http\Controllers;

use App\Http\{
  Requests\Voice as Request,
  Resources\Voice as Resource
};
use App\Models\Voice as Entity;

class VoiceController extends Controller {
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
   * @param Request\Store $request
   * @return Resource
   */
  public function store(Request\Store $request) {
    $voice = Entity::create($request->all());
    return new Resource($voice);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request\Update $request
   * @param Entity $voice
   * @return Resource
   */
  public function update(Request\Update $request, Entity $voice) {
    $voice->fill($request->all())->save();
    return new Resource($voice);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Entity $voice
   * @return Resource
   */
  public function destroy(Entity $voice) {
    $voice->delete();
    return new Resource($voice);
  }
}
