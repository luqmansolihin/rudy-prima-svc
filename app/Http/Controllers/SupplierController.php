<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierStoreRequest;
use App\Http\Requests\SupplierUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public function index(): View
    {
        $suppliers = DB::table('suppliers')->orderBy('supplier_id')->get();

        return view('suppliers.index', compact('suppliers'));
    }

    public function create(): View
    {
        return view('suppliers.create');
    }

    public function store(SupplierStoreRequest $request): RedirectResponse
    {
        DB::table('suppliers')->insert([
            'name' => $request->nama,
            'contact_person' => $request->kontak_person,
            'phone' => $request->telepon,
            'address' => $request->alamat
        ]);

        return to_route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function edit(int $id): View
    {
        $supplier = DB::table('suppliers')->where('supplier_id', $id)->first();

        if (! $supplier) {
            abort(404);
        }

        return view('suppliers.edit', compact('supplier'));
    }

    public function update(int $id, SupplierUpdateRequest $request): RedirectResponse
    {
        DB::table('suppliers')
            ->where('supplier_id', $id)
            ->update([
                'name' => $request->nama,
                'contact_person' => $request->kontak_person,
                'phone' => $request->telepon,
                'address' => $request->alamat
            ]);

        return to_route('suppliers.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        DB::table('suppliers')->where('supplier_id', $id)->delete();

        return to_route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }
}
