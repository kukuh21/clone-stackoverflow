<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\PertanyaanTag;
use App\Pertanyaan;

class TagController extends Controller
{
    public function show($tag_id)
    {
        $tag = Tag::find($tag_id);
        $list = $tag->pertanyaan;
        // dd($list);
        return view('tags.list', compact('list', 'tag'));
    }
}
