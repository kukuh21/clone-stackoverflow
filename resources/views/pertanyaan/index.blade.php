@extends('layouts.master')
@section('title')
    <title>List Pertanyaan</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Pertanyaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">List Pertanyaan</li>
                        <li class="breadcrumb-item"><a href="/pertanyaan/create">Buat Pertanyaan</a></li>
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
                        <p class="card-subtitle text-muted">Dibuat Oleh : {{$pertanyaan->user->name}}</p>                             
                        <p class="card-text">{{$pertanyaan->isi}}</p>
                        <a href="/jawaban/create/{{$pertanyaan->id}}" class="card-link">Bantu Jawab</a>
                        <a href="/pertanyaan/{{$pertanyaan->id}}" class="card-link">Details Pertanyaan</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection
