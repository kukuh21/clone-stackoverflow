@extends('layouts.master')
@section('title')
<title>Details Pertanyaan</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Details Pertanyaan ID : {{$pertanyaan->id}} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/pertanyaan">List Pertanyaan</a></li>
                        <li class="breadcrumb-item active">Details Pertanyaan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content" id="dw">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-header with-border">
                        <h3 class="card-title"> {{$pertanyaan->judul}} </h3>
                        <p class="card-subtile text-muted">Dibuat Oleh {{$pertanyaan->user->name}} / Pada tanggal : {{$pertanyaan->created_at}}</p>
                    </div>
                    <div class="card-body">
                        <p class="text-black-50"> {{$pertanyaan->isi}} </p>
                        @if (Auth::id() == $pertanyaan->user_id)
                        <a href="#" class="card-link">Bantu Jawab</a>
                        <a href="/pertanyaan/{{$pertanyaan->id}}/edit" class="card-link">Edit pertanyaan</a>
                        <form action="/pertanyaan/{{$pertanyaan->id}}" style="display: inline;" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger">
                                <i class="fa fa-trash" aria-hidden="true">
                                    Hapus Pertanyaan
                                </i>
                            </button>
                        </form>
                        @else
                        @endif
                        <br>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
