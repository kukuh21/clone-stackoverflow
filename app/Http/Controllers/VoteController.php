<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function upvote(Request $request)
    {
        dd($request);
        $pertanyaanId = $request['id'];
        redirect('pertanyaan/'.$pertanyaanId);
    }
    public function downvote($pertanyaanId)
    {
        redirect('pertanyaan/'.$pertanyaanId);
    }
}
