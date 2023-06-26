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
               @if ('$data-foto')
                    <div class="mb-3">
                        <img style="max-width:150px;max-height:150px"
                        src="{{ url('foto'). '/' .$data->foto }}"/>
               @endif
               <div class="mb-3 row">
                   <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                   <div class="col-sm-10">
                       <input type="file" class="form-control" name="foto" id="foto">
                   </div>
               <div class="mb-3 row">
                   <label for="status" class="col-sm-2 col-form-label">Status</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='status' value="{{ $data->status}}" id="status">
                   </div>
               </div>
               <div class="mb-3 row">
                   <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='nama' value="{{ $data->nama}}" id="nama">
                   </div>
               </div>
               <div class="mb-3 row">
                   <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='alamat' value="{{ $data->alamat}}" id="alamat">
                   </div>
               </div>
               <div class="mb-3 row">
                   <label for="htm" class="col-sm-2 col-form-label">Harga Masuk</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='htm' value="{{ $data->htm}}" id="htm">
                   </div>
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