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
                        <p class="card-subtile text-muted">Dibuat Oleh {{$pertanyaan->user->name}} / Pada tanggal :
                            {{$pertanyaan->created_at}}</p>
                    </div>
                    <div class="card-body">
                        <p class="text-black-50"> {{$pertanyaan->isi}} </p>
                        <a href="/jawaban/create/{{$pertanyaan->id}}" class="card-link">Bantu Jawab</a>
                        @if (Auth::id() == $pertanyaan->user_id)
                        <a href="/pertanyaan/{{$pertanyaan->id}}/edit" class="card-link">Edit pertanyaan</a>
                        <form action="/pertanyaan/{{$pertanyaan->id}}" style="display: inline;" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger">
                                <i class="fa fa-trash" aria-hidden="true">
                                    Hapus Pertanyaan
                                </i>
                            </button>
                            <br>
                            {{-- <a href=" {{action('VoteController@upvote')}} " class="fa fa-arrow-up mr-4
                            like">UPVOTE</a> --}}
                            {{-- <a href=" {{action('VoteController@downvote')}} " class="fa fa-arrow-down
                            like">DOWNVOTE</a> --}}
                        </form>
                        @else
                        @endif
                        <div class="dropdown">
                            <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Komentar
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <form action="/komentar/{{$pertanyaan->id}}" class="form-inline" method="POST">
                                    @csrf
                                    <div class="form-group m-2">
                                        <label for="komentar">{{Auth::user()->name}}</label>
                                        <input type="hidden" name="pertanyaan_id" value="{{$pertanyaan->id}}">
                                        <input type="text" class="form-control ml-2 mr-2" name="komentar" id="komentar"
                                            placeholder="Tulis Komentar.." required>
                                        <button type="submit" class="btn btn-primary">Tambah Komentar</button>
                                    </div>
                                </form>
                                <hr>
                                @foreach ($komentar as $komen)
                                @if ($komen->pertanyaan_id == $pertanyaan->id)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-bold">
                                            {{$komen->user->name}} :
                                        </div>
                                        {{$komen->isi}}
                                        @if ($komen->user_id == Auth::id())
                                        <div class="float-right">
                                            <form action="/komentar/{{$komen->id}}" style="display: inline;"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger">
                                                    <i class="fa fa-trash" aria-hidden="true">
                                                        Hapus Komentar
                                                    </i>
                                                </button>
                                                <input type="hidden" name="pertanyaan_id" value="{{$pertanyaan->id}}">
                                            </form>
                                        </div>
                                        @else

                                        @endif
                                    </div>
                                </div>
                                @else
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Jawaban</h3>
            <hr>
        </div>
        @foreach ($jawaban as $jawaban)
        <div class="row">
            <div class="card col-md-12">
                @if ($jawaban->check == 1)
                <div class="card-header with-border bg-success">
                    <p class="card-subtile text-muted text-black-50 text-bold">Dibuat Oleh {{$jawaban->user->name}} /
                        Pada tanggal : {{$pertanyaan->created_at}} Ditandai Benar</p>
                </div>
                @else
                <div class="card-header with-border bg-gray">
                    <p class="card-subtile text-muted text-black-50 text-bold">Dibuat Oleh {{$jawaban->user->name}} /
                        Pada tanggal : {{$pertanyaan->created_at}}</p>
                </div>
                @endif
                <div class="card-body">
                    <p class="text-black-50"> {{$jawaban->isi}} </p>
                    @if (Auth::id() == $jawaban->user_id)
                    <a href="/jawaban/{{$jawaban->id}}/edit" class="card-link">Edit Jawaban</a>
                    <form action="/jawaban/{{$jawaban->id}}" style="display: inline;" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger">
                            <i class="fa fa-trash" aria-hidden="true">
                                Hapus Jawaban
                            </i>
                        </button>
                        <input type="hidden" name="pertanyaan_id" value="{{$pertanyaan->id}}">
                    </form>
                    @else
                    @endif
                    @if (Auth::id() == $pertanyaan->user_id)
                    <a href="/jawaban/{{$jawaban->id}}/verify" class="card-link">Tandai Jawaban Benar</a>
                    @endif
                    <div class="dropdown">
                        <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Komentar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <form action="/komentar/jawaban/{{$jawaban->id}}" class="form-inline" method="POST">
                                @csrf
                                <div class="form-group m-2">
                                    <label for="komentar">{{Auth::user()->name}}</label>
                                    <input type="hidden" name="jawaban_id" value="{{$jawaban->id}}">
                                    <input type="hidden" name="pertanyaan_id" value="{{$pertanyaan->id}}">
                                    <input type="text" class="form-control ml-2 mr-2" name="komentar" id="komentar"
                                        placeholder="Tulis Komentar.." required>
                                    <button type="submit" class="btn btn-primary">Tambah Komentar</button>
                                </div>
                            </form>
                            <hr>
                            @foreach ($komentar as $komen)
                            @if ($komen->jawaban_id == $jawaban->id)
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-bold">
                                        {{$komen->user->name}} :
                                    </div>
                                    {{$komen->isi}}
                                    @if ($komen->user_id == Auth::id())
                                    <div class="float-right">
                                        <form action="/komentar/jawaban/{{$komen->id}}" style="display: inline;"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger">
                                                <i class="fa fa-trash" aria-hidden="true">
                                                    Hapus Komentar
                                                </i>
                                            </button>
                                            <input type="hidden" name="pertanyaan_id" value="{{$pertanyaan->id}}">
                                        </form>
                                    </div>
                                    @else

                                    @endif
                                </div>
                            </div>
                            @else
                            @endif
                            @endforeach
                        </div>
                    </div>
                    {{-- <a href=" {{action('VoteController@upvote')}} " class="fa fa-arrow-up mr-4 like">UPVOTE</a>
                    --}}
                    {{-- <a href=" {{action('VoteController@downvote')}} " class="fa fa-arrow-down like">DOWNVOTE</a>
                    --}}
                    <br>
                </div>
            </div>
        </div>
        @endforeach
    </section>
</div>
@endsection
@section('js')
@endsection
