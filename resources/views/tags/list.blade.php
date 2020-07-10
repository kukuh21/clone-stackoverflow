@extends('layouts.master')
@section('title')
    <title>Tag : {{$tag->tag_name}} </title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tag : {{$tag->tag_name}} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/pertanyaan">List Pertanyaan</a></li>
                        <li class="breadcrumb-item active">Tags</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content" id="dw">
        <div class="container-fluid">
            @foreach ($list as $pertanyaan)
            <div class="row-sm">
                <div class="card">
                    <div class="card-body">                        
                        <h5 class="card-title mb-2">{{$pertanyaan->judul}}</h5>                                                                        
                        <p class="card-subtitle text-muted">Dibuat Oleh : {{$pertanyaan->user->name}} / Pada tanggal : {{$pertanyaan->created_at}}</p>                             
                        <p class="card-text">{{$pertanyaan->isi}}</p>
                        @foreach ($pertanyaan->tags as $tag)
                        <a href="/tag/{{$tag->id}}" class="btn btn-success btn-sm">{{$tag->tag_name}}</a>
                        @endforeach
                        <br>
                        <div class="mt-2">
                            <a href="/jawaban/create/{{$pertanyaan->id}}" class="card-link">Bantu Jawab</a>
                            <a href="/pertanyaan/{{$pertanyaan->id}}" class="card-link">Details Pertanyaan</a>
                        </div>                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection
