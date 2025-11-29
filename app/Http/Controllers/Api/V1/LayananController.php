<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\LayananResource;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    public function index(): JsonResponse
    {
        $layanan = Layanan::aktif()->urutan()->get();

        return response()->json([
            'success' => true,
            'data' => LayananResource::collection($layanan),
        ]);
    }

    public function show(string $id): JsonResponse
    {
        $layanan = Layanan::find($id);

        if (!$layanan) {
            return response()->json([
                'success' => false,
                'message' => 'Layanan not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new LayananResource($layanan),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'link' => 'nullable|url',
            'aktif' => 'boolean',
            'urutan' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $layanan = Layanan::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Layanan created successfully',
            'data' => new LayananResource($layanan),
        ], 201);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $layanan = Layanan::find($id);

        if (!$layanan) {
            return response()->json([
                'success' => false,
                'message' => 'Layanan not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required|string|max:255',
            'deskripsi' => 'sometimes|required|string',
            'icon' => 'nullable|string|max:255',
            'link' => 'nullable|url',
            'aktif' => 'boolean',
            'urutan' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $layanan->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Layanan updated successfully',
            'data' => new LayananResource($layanan),
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $layanan = Layanan::find($id);

        if (!$layanan) {
            return response()->json([
                'success' => false,
                'message' => 'Layanan not found',
            ], 404);
        }

        $layanan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Layanan deleted successfully',
        ]);
    }
}
