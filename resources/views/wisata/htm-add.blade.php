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

       <form action='{{ url('Wisata') }}' method='post' enctype="multipart/form-data">
       @csrf
           <div class="my-3 p-3 bg-body rounded shadow-sm">
           <a href='{{ url('Wisata') }}' class="btn btn-secondary"><< kembali</a>
               <div class="mb-3 row">
                   <label for="nim" class="col-sm-2 col-form-label">ID</label>
                   <div class="col-sm-10">
                       <input type="number" class="form-control" name='id' id="id">
                   </div>
               </div>
               <div class="mb-3 row">
                <label for="htm" class="col-sm-2 col-form-label">HTM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="htm" id="htm">
                </div>
               <div class="mb-3 row">
                   <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name="kategori" id="kategori">
                   </div>
               <div class="mb-3 row">
                   <label for="pengelola" class="col-sm-2 col-form-label">Pengelola</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='pengelola' id="pengelola">
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