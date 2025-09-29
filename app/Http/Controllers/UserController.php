<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('role_name', 'ASC')->get();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'username'   => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users', 'username')],
                'fullname'   => ['required', 'string', 'max:255'],
                'email'      => ['required', 'string', 'email:rfc,dns', 'max:255', Rule::unique('users', 'email')],
                'phone'      => ['required', 'string', 'regex:/^\+?[\d\s\-().]{8,20}$/'],
                'role_id'    => ['required', 'exists:roles,id'],
                'password'   => ['required', 'string', 'min:8'], // jika ada konfirmasi: tambahkan 'confirmed'
            ],
            [
                'username.required' => 'Username wajib diisi.',
                'username.alpha_dash' => 'Username hanya boleh huruf, angka, strip (-), dan garis bawah (_).',
                'username.unique'   => 'Username sudah digunakan.',
                'fullname.required' => 'Nama lengkap wajib diisi.',
                'email.required'    => 'Email wajib diisi.',
                'email.email'       => 'Format email tidak valid.',
                'email.unique'      => 'Email sudah digunakan.',
                'phone.required'    => 'Nomor HP wajib diisi.',
                'phone.regex'       => 'Nomor HP tidak valid. Gunakan format 08… atau +62…',
                'role_id.required'  => 'Role wajib dipilih.',
                'role_id.exists'    => 'Role tidak valid.',
                'password.required' => 'Password wajib diisi.',
                'password.min'      => 'Password minimal 8 karakter.',
            ],
        );
        $validatedData['password'] = Hash::make($validatedData['password']);

        $users = User::create($validatedData);
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
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
        $users = User::findOrFail($id);
        $roles = Role::orderBy('role_name', 'ASC')->get();
        return view('admin.user.edit', compact('roles', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);

        $validatedData = $request->validate(
            [
                'username'   => ['required', 'string', 'max:255',  'regex:/^[a-zA-Z0-9._-]+$/', Rule::unique('users', 'username')->ignore($users->id)],
                'fullname'   => ['required', 'string', 'max:255'],
                'email'      => ['required', 'string', 'email:rfc,dns', 'max:255', Rule::unique('users', 'email')->ignore($users->id)],
                'phone'      => ['required', 'string', 'regex:/^\+?[\d\s\-().]{8,20}$/'],
                'role_id'    => ['required', 'exists:roles,id'],

            ],
            [
                'username.required' => 'Username wajib diisi.',
                'username.alpha_dash' => 'Username hanya boleh huruf, angka, strip (-), dan garis bawah (_).',
                'email.required'    => 'Email wajib diisi.',
                'email.email'       => 'Format email tidak valid.',
                'email.unique'      => 'Email sudah digunakan.',
                'phone.required'    => 'Nomor HP wajib diisi.',
                'phone.regex'       => 'Nomor HP tidak valid. Gunakan format 08… atau +62…',
                'role_id.required'  => 'Role wajib dipilih.',
                'role_id.exists'    => 'Role tidak valid.',

            ],
        );


        $users->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);

        // hapus data dari database
        $users->forceDelete(); // benar-benar hilang dari DB

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
