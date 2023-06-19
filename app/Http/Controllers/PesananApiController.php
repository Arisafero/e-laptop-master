<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananApiController extends Controller
{
    public function store(Request $request)
    { 
        // return 'hello';
        $request->validate([
            'bank_id'=> 'required',
            'nama'=> 'required',
            'alamat'=> 'required',
            'nomor_telepon'=> 'required',
            'catatan'=> 'required',
            'pengiriman_id'=> 'required',
            'total_ongkir'=> 'required',
            'total_tagihan'=> 'required',
        ]);
        $pesanan = Pesanan::create($request->all());

        return response()->json([
            'status'=> true,
            'mesage'=> 'pesanan berhasil masuk',
            'data'=> $pesanan,
        ]);
    }
}
