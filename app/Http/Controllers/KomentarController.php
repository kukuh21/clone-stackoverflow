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

    public function destroy($id, Request $request)
    {
        $komentar = Komentar::find($id);
        // dd($komentar->id);
        $komentar->delete();

        return redirect('/pertanyaan/'.$request->pertanyaan_id);
    }

    public function destroyJawabanComment(Request $request, $id)
    {
        $komentar = Komentar::find($id);
        $komentar->delete();

        return redirect('/pertanyaan/'.$request->pertanyaan_id);
    }
}
