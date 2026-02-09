<?php

namespace App\Http\Controllers;

use App\Http\Requests\SparepartStoreRequest;
use App\Http\Requests\SparepartUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SparepartController extends Controller
{
    public function index(): View
    {
        $spareparts = DB::table('spareparts')->orderBy('sparepart_id')->get();

        return view('spareparts.index', compact('spareparts'));
    }

    public function create(): View
    {
        return view('spareparts.create');
    }

    public function store(SparepartStoreRequest $request): RedirectResponse
    {
        DB::table('spareparts')->insert([
            'name' => $request->nama,
            'part_number' => $request->part_number,
            'buy_price' => $request->harga_beli,
            'sell_price' => $request->harga_jual,
            'stock' => 0
        ]);

        return to_route('spareparts.index')->with('success', 'Sparepart berhasil ditambahkan.');
    }

    public function edit(int $id): View
    {
        $sparepart = DB::table('spareparts')->where('sparepart_id', $id)->first();

        if (! $sparepart) {
            abort(404);
        }

        return view('spareparts.edit', compact('sparepart'));
    }

    public function update(int $id, SparepartUpdateRequest $request): RedirectResponse
    {
        DB::table('spareparts')
            ->where('sparepart_id', $id)
            ->update([
                'name' => $request->nama,
                'part_number' => $request->part_number,
                'buy_price' => $request->harga_beli,
                'sell_price' => $request->harga_jual
            ]);

        return to_route('spareparts.index')->with('success', 'Sparepart berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        DB::table('spareparts')->where('sparepart_id', $id)->delete();

        return to_route('spareparts.index')->with('success', 'Sparepart berhasil dihapus.');
    }
}
