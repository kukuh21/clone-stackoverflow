@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambahkan Jawaban</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/pertanyaan">List Pertanyaan</a></li>
                        <li class="breadcrumb-item active">Buat Pertanyaan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content" id="dw">
        <div class="container-fluid">
            <form action="/jawaban" method="POST">
                @csrf

                @foreach ($pertanyaan as $pertanyaan)
                    <div class="card">
                        <div class="card-body">                        
                            <h3 >{{$pertanyaan->judul}}</h3>                                                                        
                            <p class="card-subtitle text-muted">Dibuat Oleh : {{$pertanyaan->user->name}}</p>                             
                            <p class="card-text">{{$pertanyaan->isi}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="isi">Jawab</label>
                        <textarea name="isi" id="isi" class="form-control" placeholder="Tulis Jawaban !" rows="8" required="required"></textarea>
                    </div>        
                    <input hidden name="pertanyaan_id" value="{{$pertanyaan->id}} ">
                    <input hidden name="judul" value="{{$pertanyaan->judul}} ">     
                    <input hidden name="user_id" value="{{$pertanyaan->id}} ">        
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                @endforeach

                
            </form>
        </div>
    </section>
</div>

@endsection
