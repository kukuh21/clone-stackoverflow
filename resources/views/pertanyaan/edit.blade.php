@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Pertanyaan ID : {{$pertanyaan->id}} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/pertanyaan">List Pertanyaan</a></li>
                        <li class="breadcrumb-item"><a href="/pertanyaan/{{$pertanyaan->id}}">Details Pertanyaan</a></li>
                        <li class="breadcrumb-item active">Edit Pertanyaan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content" id="dw">
        <div class="container-fluid">
        <form action="/pertanyaan/{{$pertanyaan->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="judul">Judul Pertanyaan</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Tulis Judul pertanyaan"
                    value=" {{$pertanyaan->judul}} ">
                    <small id="emailHelp" class="form-text text-muted">Pastikan judul belum perna ditanyakan</small>
                </div>
                <div class="form-group">
                    <label for="isi">Isi Pertanyaan</label>
                    <textarea name="isi" id="isi" class="form-control" placeholder="Tulis isi detail pertanyaan disini !" rows="8">{{$pertanyaan->isi}}</textarea>
                </div>                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
</div>

@endsection
