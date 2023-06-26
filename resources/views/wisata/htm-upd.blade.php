@extends('layout.template')           
      <!-- START FORM -->
@section('konten') 

        @if($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                     @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
         @endif

       <form action="{{ url('Wisata/'.$data->id) }}" method="post" enctype="multipart/form-data">
       @csrf
       @method('PUT')
           <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('Wisata') }}" class="btn btn-secondary"><< kembali</a>
               <div class="mb-3 row">
                   <label for="nim" class="col-sm-2 col-form-label">ID</label>
                   <div class="col-sm-10">
                        {{ $data->id }}
                   </div>
               </div>
               <div class="mb-3 row">
                <label for="htm" class="col-sm-2 col-form-label">HTM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='htm' value="{{ $data->htm}}" id="htm">
                </div>
            </div>
               <div class="mb-3 row">
                   <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='kategori' value="{{ $data->kategori}}" id="kategori">
                   </div>
               </div>
               <div class="mb-3 row">
                   <label for="pengelola" class="col-sm-2 col-form-label">Pengelola</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='pengelola' value="{{ $data->pengelola}}" id="pengelola">
                   </div>
               </div>
               <div class="mb-3 row">
                   <label for="jurusan" class="col-sm-2 col-form-label"></label>
                   <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
               </div>
       </div>
       </form>
       <!-- AKHIR FORM -->
@endsection