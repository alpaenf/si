<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of berita.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Berita::where('status', 'published');

        // Search
        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Filter by date
        if ($request->has('date')) {
            $query->whereDate('tanggal', $request->date);
        }

        // Filter by tags
        if ($request->has('tags')) {
            $tags = explode(',', $request->tags);
            $query->where(function($q) use ($tags) {
                foreach ($tags as $tag) {
                    $q->orWhereJsonContains('tags', trim($tag));
                }
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'tanggal');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $perPage = min($request->get('per_page', 15), 100);
        $beritas = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => BeritaResource::collection($beritas),
            'meta' => [
                'current_page' => $beritas->currentPage(),
                'last_page' => $beritas->lastPage(),
                'per_page' => $beritas->perPage(),
                'total' => $beritas->total(),
                'from' => $beritas->firstItem(),
                'to' => $beritas->lastItem(),
            ],
            'links' => [
                'first' => $beritas->url(1),
                'last' => $beritas->url($beritas->lastPage()),
                'prev' => $beritas->previousPageUrl(),
                'next' => $beritas->nextPageUrl(),
            ],
        ]);
    }

    /**
     * Display the specified berita.
     */
    public function show(string $id): JsonResponse
    {
        $berita = Berita::where('status', 'published')->find($id);

        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Berita not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new BeritaResource($berita),
        ]);
    }

    /**
     * Store a newly created berita.
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'tanggal' => 'required|date',
            'tags' => 'nullable|array',
            'status' => 'required|in:published,draft',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita = Berita::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Berita created successfully',
            'data' => new BeritaResource($berita),
        ], 201);
    }

    /**
     * Update the specified berita.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Berita not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'sometimes|required|string|max:255',
            'deskripsi' => 'sometimes|required|string',
            'gambar' => 'nullable|image|max:2048',
            'tanggal' => 'sometimes|required|date',
            'tags' => 'nullable|array',
            'status' => 'sometimes|required|in:published,draft',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($berita->gambar) {
                \Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Berita updated successfully',
            'data' => new BeritaResource($berita),
        ]);
    }

    /**
     * Remove the specified berita.
     */
    public function destroy(string $id): JsonResponse
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Berita not found',
            ], 404);
        }

        // Delete image
        if ($berita->gambar) {
            \Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berita deleted successfully',
        ]);
    }
}
