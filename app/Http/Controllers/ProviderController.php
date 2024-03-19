<?php

namespace App\Http\Controllers;

use App\Models\Provider;
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
        $customer = $request->all();
        $user = Registration::store( $request->all());
        // Add $user ->id  to the request data
        $customerData['user_id'] = $user->id;
        $customer = Provider::create($customerData);
        $message = "Customer created successfully.";
        return response()->json($customer,$message);}

    // Get a customer by ID
    public function show($id)
    {
      $provider = Provider::findOrFail($id);
      return response()->json($provider);
    }

    // Update a customer
    public function update(Request $request, $id)
    {
      $provider = Provider::findOrFail($id);
      $provider->update($request->all());
      return response()->json($provider);
    }

    // Delete a customer
    public function delete($id)
    {
      $provider = Provider::findOrFail($id);
      $provider->delete();
      return response()->json('Customer deleted');
    }


}
