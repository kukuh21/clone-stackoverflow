<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Komentar;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->pertanyaan_id);
        $komentar = new Komentar;
        $komentar->isi = $request->komentar;
        $komentar->user_id = Auth::id();
        $komentar->pertanyaan_id = $request->pertanyaan_id;

        $komentar->save();
        return redirect('/pertanyaan/'.$request->pertanyaan_id);
    }

    public function storeJawabanComment(Request $request)
    {
        // dd($request->pertanyaan_id);
        $komentar = new Komentar;
        $komentar->isi = $request->komentar;
        $komentar->user_id = Auth::id();
        $komentar->jawaban_id = $request->jawaban_id;

        $komentar->save();
        return redirect('/pertanyaan/'.$request->pertanyaan_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
