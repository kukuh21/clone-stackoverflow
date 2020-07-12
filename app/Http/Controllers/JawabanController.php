<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\User;
use App\Jawaban;
use Illuminate\Support\Facades\Auth;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $pertanyaan = Pertanyaan::where('id', $id)->first();

        //dd($pertanyaan);
        return view('jawaban.create', compact('pertanyaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pertanyaan_id)
    {
        $Jawaban = new Jawaban;
        $Jawaban->isi = $request->isi;
        $Jawaban->pertanyaan_id = $pertanyaan_id;
        $Jawaban->user_id = Auth::id();
        $Jawaban->save();
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
    public function edit(Request $request, $id)
    {
        $jawaban = Jawaban::find($id)->first();
        $pertanyaan = Pertanyaan::find($jawaban->pertanyaan_id)->first();
        // dd($pertanyaan);
        return view('jawaban.edit', compact('jawaban', 'pertanyaan'));
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
        $jawaban = Jawaban::find($id);
        $jawaban->isi = $request->isi;
        $jawaban->save();
        return redirect('/pertanyaan/'.$request->pertanyaan_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $jawaban = Jawaban::find($id);
        $jawaban->delete();
        return redirect('/pertanyaan/'.$request->pertanyaan_id);
    }
}
