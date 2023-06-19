<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $q = $request->q;
        if (isset($q)) {
            $merek = Merek::where('nama', 'like', '%' . $q . '%')
                ->paginate(5);
        } else {
            $merek = Merek::paginate(5);
        }
        // return $merek;
        return view('merek.index', compact('merek', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $image = $request->file('logo');
        $logoName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
        $image->move(public_path('assets/images/merek/'), $logoName);

        Merek::create([
            'nama' => $request->nama,
            'logo' => $logoName,
        ]);

        return redirect('/merek');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(Merek $merek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merek  $merek Select * from merek where id=$merek
     * @return \Illuminate\Http\Response
     */
    public function edit(Merek $merek)
    {
        // return $merek;
        return view('merek.edit', compact('merek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merek $merek)
    {
        // return $request;

        if ($request->hasFile('logo')) {
            if (file_exists(public_path('assets/images/merek/' . $merek->logo))) {
                unlink(public_path('assets/images/merek/' . $merek->logo));
            }
            $image = $request->file('logo');
            $logoName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/merek/'), $logoName);

            Merek::where('id', $merek->id)
                ->update([
                    'nama' => $request->nama,
                    'logo' => $logoName
                ]);
        } else {
            Merek::where('id', $merek->id)
                ->update([
                    'nama' => $request->nama,
                ]);
        }

        return redirect('/merek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merek $merek)
    {
        // return $merek;
        Merek::destroy($merek->id);
        if (file_exists(public_path('assets/images/merek/' . $merek->logo))) {
            unlink(public_path('assets/images/merek/' . $merek->logo));
        }
        return redirect('/merek');
    }
}
