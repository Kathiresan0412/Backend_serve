<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Provider;
use App\Models\User;
use App\Providers\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('$customers')
        ->select('customers.id as id', 'customers.user_id', 'users.name as name',
         'users.email','users.mobile','users.img','users.user_name','users.role','users.passwords')
        ->leftJoin('users', 'users.id', '=', 'customers.user_id')->get();
        return response()->json($customers);
    }
    // Store a new customer
    public function store(Request $request)
    {
        $customer = $request->all();
        $user = Registration::store( $request->all());
        // Add $user ->id  to the request data
        $customerData['user_id'] = $user->id;
        $customer = Customer::create($customerData);
        $message = "Customer created successfully.";
        return response()->json($customer,$message);

    }

    // Get a customer by ID
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->user();
        return response()->json($customer);
    }

    // Update a customer
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $user = User::find($customer->user_id);
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
        $customer = Customer::findOrFail($id);
        $user = User::find($customer->user_id);
        $customer->delete();
        $user->delete();
        return response()->json('Customer deleted');
    }
}
