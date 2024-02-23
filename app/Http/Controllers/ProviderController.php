<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

        public function index()
    {
      $providers = Provider::all();
      return response()->json($providers);
    }

    // Store a new customer
    public function store(Request $request)
    {
      $provider = Provider::create($request->all());
      return response()->json($provider);
    }

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
