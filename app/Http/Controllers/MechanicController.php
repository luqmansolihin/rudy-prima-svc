<?php

namespace App\Http\Controllers;

use App\Http\Requests\MechanicStoreRequest;
use App\Http\Requests\MechanicUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MechanicController extends Controller
{
    public function index(): View
    {
        $mechanics = DB::table('mechanics')->orderBy('mechanic_id')->get();

        return view('mechanics.index', compact('mechanics'));
    }

    public function create(): View
    {
        return view('mechanics.create');
    }

    public function store(MechanicStoreRequest $request): RedirectResponse
    {
        DB::table('mechanics')->insert([
            'name' => $request->nama,
            'dob' => $request->tanggal_lahir,
            'join_date' => $request->tanggal_bergabung,
            'specialization' => $request->keahlian,
            'status' => $request->status
        ]);

        return to_route('mechanics.index')->with('success', 'Mekanik berhasil ditambahkan.');
    }

    public function edit(int $id): View
    {
        $mechanic = DB::table('mechanics')->where('mechanic_id', $id)->first();

        if (! $mechanic) {
            abort(404);
        }

        return view('mechanics.edit', compact('mechanic'));
    }

    public function update(int $id, MechanicUpdateRequest $request): RedirectResponse
    {
        DB::table('mechanics')
            ->where('mechanic_id', $id)
            ->update([
                'name' => $request->nama,
                'dob' => $request->tanggal_lahir,
                'join_date' => $request->tanggal_bergabung,
                'specialization' => $request->keahlian,
                'status' => $request->status
            ]);

        return to_route('mechanics.index')->with('success', 'Mekanik berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        DB::table('mechanics')->where('mechanic_id', $id)->delete();

        return to_route('mechanics.index')->with('success', 'Mekanik berhasil dihapus.');
    }
}
