<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $data = DB::table('services')
        ->select('services.id','services.name', 'services.description', 'service_type_id', 'service_types.name as service_type_name')
        ->leftJoin('service_types as service_types', 'service_types.id', '=', 'services.service_type_id')->get();
        return response()->json($data);
    }
    // Store a new Service
    public function store(Request $request)
    {
        $Service = Service::create($request->all());
        return response()->json($Service);
    }

    // Get a Service by ID
    public function show($id)
    {
        $Service = Service::findOrFail($id);
        $Service->serviceType();
        return response()->json($Service);
    }

    // Update a Service
    public function update(Request $request, $id)
    {
        $Service = Service::findOrFail($id);
        $Service->update($request->all());
        return response()->json($Service);
    }

    // Delete a Service
    public function delete($id)
    {
        $Service = Service::findOrFail($id);
        $Service->delete();
        return response()->json('Service deleted');
    }
}
