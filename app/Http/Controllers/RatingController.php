<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
      $ratings = Rating::all();
      return response()->json($ratings);
    }
    
    // Store a new customer
    public function store(Request $request) 
    {
      $rating = Rating::create($request->all());
      return response()->json($rating);
    }
    
    // Get a customer by ID
    public function show($id)
    {
      $rating = Rating::findOrFail($id);
      return response()->json($rating);  
    }
    
    // Update a customer
    public function update(Request $request, $id)
    {
      $rating = Rating::findOrFail($id);
      $rating->update($request->all());
      return response()->json($rating);
    } 
    
    // Delete a customer
    public function delete($id)
    {
      $rating = Rating::findOrFail($id);
      $rating->delete();
      return response()->json('Customer deleted');
    }
}
