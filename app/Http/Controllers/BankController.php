<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;
        if (isset($q)) {
            $bank = Bank::where('nama', 'like', '%' . $q . '%')
                ->paginate(5);
        } else {
            $bank = Bank::paginate(5);
        }
        // return $bank;
        return view('bank.index', compact('bank','q'));
    }

    public function create()
    {
        return view('bank.create');
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate(
            [
                'nama_bank' => 'required|min:3|max:70',
                'nama_pemilik' => 'required|min:3|max:70',
                'no_rekening' => 'required',
                'logo' => 'required',
            ],
            [
                'nama_bank.required' => 'Silahkan isi nama bank  😇',
                'nama_bank.min' => 'Nama bank terlalu pendek 😇',
                'nama_bank.max' => 'Nama bank terlalu panjang 😇',
                'nama_pemilik.required' => 'Silahkan isi nama pemilik 😇',
                'nama_pemilik.min' => 'Nama pemilik terlalu pendek 😇',
                'nama_pemilik.max' => 'Nama pemilik terlalu panjang 😇',
                'no_rekening.required' => 'Silahkan isi no_rekening bank 😇',
                'logo.required' => 'Silahkan isi logo bank 😇',
            ]
        );

        $image = $request->file('logo');
        $logoName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
        $image->move(public_path('assets/images/bank/'), $logoName);

        Bank::create([
            'nama_bank' => $request->nama_bank,
            'nama_pemilik' => $request->nama_pemilik,
            'no_rekening' => $request->no_rekening,
            'logo' => $logoName,
        ]);

        return redirect('/bank');
    }

    public function show(Bank $bank)
    {
        //
    }

    public function edit(Bank $bank)
    {
        return view('bank.edit', compact('bank'));
    }

    public function update(Request $request, Bank $bank)
    {
        if ($request->hasFile('logo')) {
            if (file_exists(public_path('assets/images/bank/' . $bank->logo))) {
                unlink(public_path('assets/images/bank/' . $bank->logo));
            }
            $image = $request->file('logo');
            $logoName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/bank/'), $logoName);

            Bank::where('id', $bank->id)
                ->update([
                    'nama' => $request->nama,
                    'logo' => $logoName
                ]);
        } else {
            Bank::where('id', $bank->id)
                ->update([
                    'nama' => $request->nama,
                ]);
        }

        return redirect('/bank');
    }

    public function destroy(Bank $bank)
    {
        //
    }
}
