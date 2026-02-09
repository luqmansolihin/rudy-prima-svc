<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = DB::table('customer')->orderBy('customer_id')->get();

        return view('customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('customers.create');
    }

    public function store(CustomerStoreRequest $request): RedirectResponse
    {
        DB::table('customer')->insert([
            'name' => $request->nama,
            'phone' => $request->telepon,
            'address' => $request->alamat,
            'fleet' => $request->armada,
            'monthly' => $request->tagihan,
            'created_at' => now(),
        ]);

        return to_route('customers.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    public function edit(int $id): View
    {
        $customer = DB::table('customer')->where('customer_id', $id)->first();

        if (! $customer) {
            abort(404);
        }

        return view('customers.edit', compact('customer'));
    }

    public function update(int $id, CustomerUpdateRequest $request): RedirectResponse
    {
        DB::table('customer')
            ->where('customer_id', $id)
            ->update([
                'name' => $request->nama,
                'phone' => $request->telepon,
                'address' => $request->alamat,
                'fleet' => $request->armada,
                'monthly' => $request->tagihan
            ]);

        return to_route('customers.index')->with('success', 'Customer berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        DB::table('customer')->where('customer_id', $id)->delete();

        return to_route('customers.index')->with('success', 'Customer berhasil dihapus.');
    }
}
