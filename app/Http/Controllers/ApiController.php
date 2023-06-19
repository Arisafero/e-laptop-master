<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Produk;
use App\Models\Bank;
use App\Models\Pengiriman;
use App\Models\BannerSatu;
use App\Models\BannerDua;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function merek()
    {
        $merek = Merek::all();
        return response()->json([
            'status' => 'true',
            'message' => 'ini adalah data merek',
            'data' => $merek,
        ]);
    }
    public function produk(Request $request)
    {
        $produk = $request->q;
        $paginate = $request->limit;
        $rekomendasi = $request->rekomendasi;

        if ($rekomendasi == 'recommended') {
            $data = Produk::with('merek')->where('rekomendasi', 'ya')->get();
            return response()->json([
                'status' => 'true',
                'message' => 'ini adalah data produk rekomendasi',
                'data' => $data
            ]);
        }

        if ($paginate) {
            $data = Produk::with('merek')->paginate($paginate);
            return response()->json([
                'status' => 'true',
                'message' => 'ini adalah data produk',
                'data' => $data
            ]);
        }

        if ($produk) {
            $data = Produk::where('id', $produk)->with('merek')->first();
            return response()->json([
                'status' => 'true',
                'message' => 'ini adalah data produk',
                'data' => $data
            ]);
        }

        $data = Produk::all();
        return response()->json([
            'status' => 'true',
            'message' => 'ini adalah data produk',
            'data' => $data
        ]);
    }
    public function bank(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $bank = Bank::where('id', $id)->first();
            return response()->json([
                'status' => 'true',
                'message' => 'ini adalah data bank',
                'data' => $bank,
            ]);
        }

        $bank = Bank::all();
        return response()->json([
            'status' => 'true',
            'message' => 'ini adalah data bank',
            'data' => $bank,
        ]);
    }
    public function pengiriman(Request $request)
    
    {
        $id = $request->id;
        if($id){
        $pengiriman = Pengiriman::where('id', $id)->first();
        return response()->json([
            'status' => 'true',
            'message' => 'ini adalah data pengiriman',
            'data' => $pengiriman,
        ]);
    }
        $pengiriman = Pengiriman::all();
        return response()->json([
            'status' => 'true',
            'message' => 'ini adalah data pengiriman',
            'data' => $pengiriman,
        ]);
    }
    public function bannerSatu()
    {
        $bannerSatu = BannerSatu::all();
        return response()->json([
            'status' => 'true',
            'message' => 'ini adalah data bannerSatu',
            'data' => $bannerSatu,
        ]);
    }
    public function bannerDua()
    {
        $bannerDua = BannerDua::all();
        return response()->json([
            'status' => 'true',
            'message' => 'ini adalah data bannerDua',
            'data' => $bannerDua,
        ]);
    }
}
