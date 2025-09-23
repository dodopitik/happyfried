<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::orderBy('name', 'ASC')->get();

        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
                'is_available' => 'required|boolean',
            ],
            [
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.mimes' => 'Format gambar harus berupa jpeg, png, jpg, gif, atau svg.',
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 2048 kilobytes.',
                'name.required' => 'Nama menu wajib diisi.',
                'description.required' => 'Deskripsi menu wajib diisi.',
                'price.required' => 'Harga menu wajib diisi.',
                'category_id.required' => 'Kategori menu wajib dipilih.',
                'is_available.required' => 'Status ketersediaan menu wajib dipilih.',

            ]
        );

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalExtension();
            $image->move(public_path('img_item_upload'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $item = Item::create($validatedData);
        return redirect()->route('items.index')->with('success', 'Menu berhasil ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
