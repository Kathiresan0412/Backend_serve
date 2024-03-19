<?php

namespace App\Http\Controllers;

use App\Models\ProviderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceProviderController extends Controller
{
    public function index()
    {
        $providerServices = DB::table('provider_services as serve_pro')
            ->select(
                'serve_pro.provider_id',
                'serve_pro.service_id',
                'serve_pro.amount_per_hour',
                'services.name as service_name',
                'services.description as service_description',
                'users.name as provider_name',
                'service_types.name as service_type_name'
            )
            ->leftJoin('providers', 'providers.id', '=', 'serve_pro.provider_id')
            ->leftJoin('users', 'users.id', '=', 'providers.user_id')
            ->leftJoin('services', 'services.id', '=', 'serve_pro.service_id')
            ->leftJoin('service_types', 'service_types.id', '=', 'services.service_type_id')
            ->get();
        return response()->json($providerServices);
    }

    // Store a new customer
    public function store(Request $request)
    {
        $providerServices = ProviderService::create($request->all());
        return response()->json($providerServices);
    }

    // Get a customer by ID
    public function show($id)
    {
        try {
            $providerServices = ProviderService::findOrFail($id);
            $providerServices->service();
            $providerServices->provider();
            return response()->json($providerServices);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Resource not found.'], 404);
        }
    }

    // Update a customer
    public function update(Request $request, $id)
    {
        $providerServices = ProviderService::findOrFail($id);
        $providerServices->update($request->all());
        return response()->json($providerServices);
    }

    // Delete a customer
    public function delete($id)
    {
        $providerServices = ProviderService::findOrFail($id);
        $providerServices->delete();
        return response()->json('provider Services deleted');
    }
}

