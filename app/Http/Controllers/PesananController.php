<?php

namespace App\Http\Controllers;


use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{   
    public function index(Request $request)
    {
    $q = $request->q;

    if(isset ($q))
    {
        $pesanan = Pesanan::join('bank','pesanan.bank_id', 'bank.id')
                    ->join('pengiriman','pesanan.pengiriman_id', 'pengiriman.id')
                    ->where('nama', 'like', '&'. '$q'. '&')
                    ->orwhere('alamat', 'like', '&'. '$q'. '&')
                    ->orwhere('nomor_telepon', 'like', '&'. '$q'. '&')
                    ->orwhere('metode_pengiriman', 'like', '&'. '$q'. '&')
                    ->orwhere('metode_bayar', 'like', '&'. '$q'. '&')
                    ->paginate(5);
    }else{
        $pesanan = Pesanan::paginate(5);
    }
    return view ('pesanan.index', compact('pesanan'));
    }
}
