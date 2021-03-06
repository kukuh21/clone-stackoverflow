<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\User;
use App\Jawaban;
use App\Komentar;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    public function index()
    {
        $list = Pertanyaan::orderBy('created_at', 'desc')->get();
        return view('pertanyaan.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert ke pertanyaan
        $pertanyaan = new Pertanyaan;
        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi = $request->isi;
        $pertanyaan->user_id = Auth::id();
        $pertanyaan->save();

        //insert tag
        $tagArr = explode(',', $request->tags);
        $tags = [];
        foreach ($tagArr as $strTag) {
            $tagArrAssoc['tag_name'] = $strTag;
            $tags[] = $tagArrAssoc;
        }
        foreach ($tags as $tagCheck) {
            $insertTag = Tag::firstOrCreate($tagCheck);
            $pertanyaan->tags()->attach($insertTag->id);
        }
        // dd($insertTag);
        return redirect('pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = Pertanyaan::all();
        $pertanyaan = $list->find($id);
        $komentar = Komentar::all();
        $jawaban  = $pertanyaan->jawaban()->orderBy('created_at', 'desc')->get();
        // dd($jawaban);
        return view('pertanyaan.show', compact('pertanyaan', 'jawaban', 'komentar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = Pertanyaan::all();
        $pertanyaan = $list->find($id);
        return view('pertanyaan.edit', compact('pertanyaan'));
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
        $pertanyaan = Pertanyaan::find($id);

        $pertanyaan->judul = $request['judul'];
        $pertanyaan->isi = $request['isi'];

        $pertanyaan->save();
        return redirect('pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->tags()->detach();
        $jawaban = Jawaban::where('pertanyaan_id', $id)->delete();
        $pertanyaan->delete();
        return redirect('pertanyaan');
    }
}
