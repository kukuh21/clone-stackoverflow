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
                    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                    <textarea name="isi" id="isi" class="form-control my-editor" placeholder="Tulis isi detail pertanyaan disini !" rows="8">{{$pertanyaan->isi}}</textarea>
                </div>                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
</div>

@endsection
@section('js')
<script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        forced_root_block : '',
        force_br_newlines : true,
        force_p_newlines : false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
   
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
   
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }        
    };   
    tinymce.init(editor_config);
  </script>
@endsection