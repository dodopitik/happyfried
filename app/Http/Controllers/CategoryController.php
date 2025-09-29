<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'category_name' => ['required', 'string', 'max:255', Rule::unique('categories', 'category_name')],
                'description' => 'required|string',
            ],
            [
                'category_name.unique'   => 'Nama category sudah dipakai. Gunakan nama lain.',
                'category_name.required' => 'Nama category wajib diisi.',
                'description.required' => 'Deskripsi category wajib diisi.',
            ]
        );

        $categories = Category::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'role berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Category::findOrFail($id);

        $validatedData = $request->validate(
            [
                'category_name' => ['required', 'string', 'max:255'],
                'description' => 'required|string',
            ],
            [
                'category_name.unique'   => 'Nama role sudah dipakai. Gunakan nama lain.',
                'category_name.required' => 'Nama role wajib diisi.',
                'description.required' => 'Deskripsi role wajib diisi.',
            ]
        );


        $categories->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::findOrFail($id);

        // hapus data dari database
        $categories->forceDelete(); // benar-benar hilang dari DB

        return redirect()->route('categories.index')->with('success', 'Category berhasil dihapus.');
    }
}
