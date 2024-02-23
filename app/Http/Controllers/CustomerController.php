<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $selectedColumns = ['name', 'email', 'password'];
        $data = [
            'columns' => $selectedColumns,
            'customers' => $customers,
        ];
        return response()->json($data);
    }

    // Store a new customer
    public function store(Request $request)
    {
      $customer = Customer::create($request->all());
      return response()->json($customer);
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
