<?php

namespace App\Http\Controllers;

use App\Models\BannerDua;
use App\Models\BannerSatu;
use Illuminate\Http\Request;
use function PHPUnit\Framework\fileExists;


class BannerController extends Controller
{
    public function index($angka, Request $request)
    {
        $q =  $request->q;
        if ($angka == 'satu') {
            if (isset($q)) {
                $banner = BannerSatu::where('status', 'like', '%' . $q . '%')->paginate(10);
            } else {
                $banner = BannerSatu::paginate(10);
            }
        } else if ($angka == 'dua') {
            if (isset($q)) {
                $banner = BannerDua::where('status', 'like', '%' . $q . '%')->paginate(10);
            } else {
                $banner = BannerDua::paginate(10);
            }
        } else {
            return redirect()->back();
        }
        return view('banner.index', compact('banner', 'angka', 'q'));
    }

    public function create($angka)
    {
        if ($angka == 'satu' || $angka == 'dua') {
            return view('banner.create', compact('angka'));
        } else {
            return redirect()->back();
        }
    }

    public function store($angka, Request $request)
    {
        $request->validate(
            [
                'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ],

            [
                'gambar.required' => 'silahkan pilih gambar',
                'gambar.mimes' => 'type gambar jpg,png,jpeg, gif, svg'
            ]
        );

        if ($angka == 'satu') {

            $image = $request->file('gambar');
            $gambarName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/banner/satu/'), $gambarName);

            BannerSatu::create([
                'gambar' => $gambarName,
                'status' => $request->has('status') ? $request->status : 'unhide'
            ]);

            return redirect('/banner/satu')->with('success','Banner ' .$angka. ' berhasil ditambahkan!');
        } else if ($angka == 'dua') {

            $image = $request->file('gambar');
            $gambarName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/banner/dua/'), $gambarName);

            BannerDua::create([
                'gambar' => $gambarName,
                'status' => $request->has('status') ? $request->status : 'unhide'
            ]);
            return redirect('/banner/dua')->with('success','Banner ' .$angka. ' berhasil ditambahkan!');
        } else {
            return redirect()->back();
        }
    }

    public function show(BannerSatu $bannerSatu)
    {
        //
    }

    public function edit($id, $angka)
    {
        // return $angka;
        if ($angka == 'satu') {
            $banner = BannerSatu::where('id', $id)->first();
        } else if ($angka == 'dua') {
            $banner = BannerDua::where('id', $id)->first();
        } else {
            return redirect()->back();
        }
        return view('banner.edit', compact('banner', 'angka'));
    }

    public function update(Request $request, $id, $angka)
    {
        $request->validate(
            [
                'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ],

            [
                'gambar.required' => 'silahkan pilih gambar',
                'gambar.mimes' => 'type gambar jpg,png,jpeg,gif,svg'
            ]
        );

        if ($request->hasFile('gambar')) {
            // return 'ada gambar';
            if ($angka == 'satu') {

                // delete gambar lama
                $banner = BannerSatu::where('id', $id)->first();
                if (fileExists(public_path('assets/images/banner/satu/' . $banner->gambar))) {
                    unlink(public_path('assets/images/banner/satu/' . $banner->gambar));
                }

                //upload gambar baru
                $image = $request->file('gambar');
                $gambarName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
                $image->move(public_path('assets/images/banner/satu/'), $gambarName);

                BannerSatu::where('id', $id)->update([
                    'gambar' => $gambarName,
                    'status' => $request->has('status') ? $request->status : 'unhide'
                ]);

                return redirect('/banner/satu')->with('success','Banner ' .$angka. ' berhasil diubah!');
            } elseif ($angka == 'dua') {
                // return $id;
                $banner = BannerDua::where('id', $id)->first();
                // return $banner;
                if (fileExists(public_path('assets/images/banner/dua/' . $banner->gambar))) {
                    unlink(public_path('assets/images/banner/dua/' . $banner->gambar));
                }

                $image = $request->file('gambar');
                $gambarName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
                $image->move(public_path('assets/images/banner/dua/'), $gambarName);

                BannerDua::where('id', $id)->update([
                    'gambar' => $gambarName,
                    'status' => $request->has('status') ? $request->status : 'unhide'
                ]);

                return redirect('/banner/dua')->with('success','Banner ' .$angka. ' berhasil diubah!');
            } else {
                return redirect()->back();
            }
        }


        return redirect('/banner');
    }

    public function destroy($id, $angka)
    {

        // return 'hapus berakhir';

        if ($angka == 'satu') {
            // return $id;
            $banner = BannerSatu::where('id', $id)->first();
            // return $banner;

            if (fileExists(public_path('assets/images/banner/satu/' . $banner->gambar))) {
                unlink(public_path('assets/images/banner/satu/' . $banner->gambar));
            }

            BannerSatu::destroy($id);

        } else if ($angka == 'dua') {
            $banner = BannerDua::where('id', $id)->first();

            if (fileExists(public_path('assets/images/banner/dua/' . $banner->gambar)))
            {
                unlink(public_path('assets/images/banner/dua/' . $banner->gambar));
            }
            BannerDua::destroy($id);
        }
        return redirect('/banner/' . $angka)->with('success','Banner ' .$angka. ' berhasil dihapus!');
    }
}
