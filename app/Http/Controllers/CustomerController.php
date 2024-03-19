<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
        return response()->json($customer);
    }

    // Update a customer
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return response()->json($customer);
    }

    // Delete a customer
    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json('Customer deleted');
    }
}
