<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\User;
use App\Providers\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{

        public function index()
    {
        $providers = DB::table('$providers')
        ->select('providers.id as id', 'customers.user_id', 'users.name as name',
         'users.email','users.mobile','users.img','users.user_name','users.role','users.passwords')
        ->leftJoin('users', 'users.id', '=', 'providers.user_id')->get();
      return response()->json($providers);
    }

    // Store a new customer
    public function store(Request $request)
    {
        $provider = $request->all();
        $user = Registration::store( $request->all());
        // Add $user ->id  to the request data
        $providerData['user_id'] = $user->id;
        $provider = Provider::create($providerData);
        $message = "Customer created successfully.";
        return response()->json($provider,$message);}

    // Get a customer by ID
    public function show($id)
    {
      $provider = Provider::findOrFail($id);
      $provider->user();
      return response()->json($provider);
    }

    // Update a customer
    public function update(Request $request, $id)
    {
      $provider = Provider::findOrFail($id);
      $provider->update($request->all());
      $user = User::find($provider->user_id);
      if($user){
        $user->update($request->all());
        $message="success";
      }else{
        $message="Not fount this user";
      }

      return response()->json($user,$message);
    }

    // Delete a customer
    public function delete($id)
    {
      $provider = Provider::findOrFail($id);
      $user = User::find($provider->user_id);
      $provider->delete();
      $user->delete();
      return response()->json('provider deleted');
    }


}
