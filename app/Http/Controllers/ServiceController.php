<?php

namespace App\Http\Controllers;

use App\Models\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()

    {
        $services = Service::all();
        $selectedColumns = ['name', 'service_type', 'description'];
        $data = [
            'columns' => $selectedColumns,
            'services' => $services,
        ];
        return response()->json($data);
    }

    // Store a new customer
    public function store(Request $request)
    {
      $Service = Service::create($request->all());
      return response()->json($Service);
    }

    // Get a customer by ID
    public function show($id)
    {
      $Service = Service::findOrFail($id);
      return response()->json($Service);
    }

    // Update a customer
    public function update(Request $request, $id)
    {
      $Service = Service::findOrFail($id);
      $Service->update($request->all());
      return response()->json($Service);
    }

    // Delete a customer
    public function delete($id)
    {
      $Service = Service::findOrFail($id);
      $Service->delete();
      return response()->json('Customer deleted');
    }
}
