<?php

namespace App\Http\Controllers;

use App\Models\SRequest;
use Illuminate\Http\Request;

class SRequestController extends Controller
{
    public function index()
{
  $sRequests = SRequest::all();
  return response()->json($sRequests);
}

// Store a new customer
public function store(Request $request) 
{
  $sRequest = SRequest::create($request->all());
  return response()->json($sRequest);
}

// Get a customer by ID
public function show($id)
{
  $sRequest = SRequest::findOrFail($id);
  return response()->json($sRequest);  
}

// Update a customer
public function update(Request $request, $id)
{
  $sRequest = SRequest::findOrFail($id);
  $sRequest->update($request->all());
  return response()->json($sRequest);
} 

// Delete a customer
public function delete($id)
{
  $sRequest = SRequest::findOrFail($id);
  $sRequest->delete();
  return response()->json('Customer deleted');
}
}
