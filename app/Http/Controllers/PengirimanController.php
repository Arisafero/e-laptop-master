<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;
        if (isset($q)) {
            $pengiriman = Pengiriman::where('nama', 'like', '%' . $q . '%')
                ->paginate(5);
        } else {
            $pengiriman = Pengiriman::paginate(5);
        }
        // return $pengiriman;
        return view('pengiriman.index', compact('pengiriman', 'q'));
    }

    public function create()
    {
        return view('pengiriman.create');
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate(
            [
                'nama' => 'required|min:3|max:70',
                'biaya' => 'required',
            ],
            [
                'nama.required' => 'Silahkan isi nama  😇',
                'nama.min' => 'Nama terlalu pendek 😇',
                'nama.max' => 'Nama terlalu panjang 😇',
                'biaya.required' => 'Silahkan isi biaya 😇',
            ]
        );


        Pengiriman::create([
            'nama' => $request->nama,
            'biaya' => $request->biaya,
        ]);

        return redirect('/pengiriman');
    }

    public function show(Pengiriman $pengiriman)
    {
        //
    }

    public function edit(Pengiriman $pengiriman)
    {
        return view('pengiriman.edit', compact('pengiriman'));
    }

    public function update(Request $request, Pengiriman $pengiriman)
    {
        //
    }

    public function destroy(Pengiriman $pengiriman)
    {
        //
    }
}
