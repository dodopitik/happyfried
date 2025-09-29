<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('role_name', 'ASC')->get();
        return view('admin.role.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'role_name' => ['required', 'string', 'max:255', Rule::unique('roles', 'role_name')],
                'description' => 'required|string',
            ],
            [
                'role_name.unique'   => 'Nama role sudah dipakai. Gunakan nama lain.',
                'role_name.required' => 'Nama role wajib diisi.',
                'description.required' => 'Deskripsi role wajib diisi.',
            ]
        );

        $roles = Role::create($validatedData);
        return redirect()->route('roles.index')->with('success', 'role berhasil ditambahkan.');
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
        $roles = Role::findOrFail($id);
        return view('admin.role.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = Role::findOrFail($id);

        $validatedData = $request->validate(
            [
                'role_name' => ['required', 'string', 'max:255'],
                'description' => 'required|string',
            ],
            [
                'role_name.unique'   => 'Nama role sudah dipakai. Gunakan nama lain.',
                'role_name.required' => 'Nama role wajib diisi.',
                'description.required' => 'Deskripsi role wajib diisi.',
            ]
        );


        $roles->update($validatedData);

        return redirect()->route('roles.index')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles = Role::findOrFail($id);

        // hapus data dari database
        $roles->forceDelete(); // benar-benar hilang dari DB

        return redirect()->route('roles.index')->with('success', 'Role berhasil dihapus.');
    }
}
