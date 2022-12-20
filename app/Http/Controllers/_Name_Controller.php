<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\_Name_ as Resource;
use App\Http\Requests\Api\_Name_ as Request;
//use App\Entities\_Name_  as Entity;
use App\Repositories\_Name_ as Repository;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

class _Name_Controller extends Controller {
  use AuthorizesRequests, DispatchesJobs;
  
  /**
   * Display a listing of the resource.
   * @return Resource
   */
  public function index(Request\Index $request) {
    return Resource::collection(Repository::get());
  }
  
  /**
   * Store a newly created resource in storage.
   * @param  Request $request
   * @return Resource
   */
  public function store(Request\Store $request) {
    $_name_ = Repository::create($request->all());
    return new Resource($_name_);
  }
  
  /**
   * Update the specified resource in storage.
   * @param  Request $request
   * @return Resource
   */
  public function update(Request\Update $request, Repository $_name_) {
    $_name_->fill($request->all())->save();
    return new Resource($_name_);
  }
  
  /**
   * Remove the specified resource from storage.
   * @return Resource
   */
  public function destroy(Request\Destroy $request, Repository $_name_) {
    $_name_->delete();
    return new Resource($_name_);
  }
}
