@extends('layouts.master')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content" id="dw">
            <div class="container-fluid">
                <div class="row">

                  <div class="card col-md-12">
                    <div class="card-header with-border">
                        <h3 class="card-title">Selamat Datang, {{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">

                    </div>
                  </div>

                </div>
            </div>
        </section>
    </div>
@endsection

