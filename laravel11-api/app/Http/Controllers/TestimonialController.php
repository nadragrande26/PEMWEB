<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  // Pastikan baris ini ada

class TestimonialController extends Controller
{
    public function index()
    {
        return response()->json(Testimonial::all(), 200);
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh client
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Menyimpan testimonial baru
        $testimonial = Testimonial::create($validatedData);
        return response()->json($testimonial, 201);
    }

    public function show($id)
    {
        // Mencari testimonial berdasarkan ID
        $testimonial = Testimonial::findOrFail($id);
        return response()->json($testimonial, 200);
    }

    public function update(Request $request, $id)
    {
        // Mencari testimonial berdasarkan ID
        $testimonial = Testimonial::findOrFail($id);

        // Validasi data yang dikirimkan oleh client
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Memperbarui testimonial
        $testimonial->update($validatedData);
        return response()->json($testimonial, 200);
    }

    public function destroy($id)
    {
        // Mencari testimonial berdasarkan ID
        $testimonial = Testimonial::findOrFail($id);

        // Menghapus testimonial
        $testimonial->delete();
        return response()->json(['message' => 'Testimonial deleted'], 200);
    }
}
