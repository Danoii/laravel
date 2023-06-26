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
                   <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                   <div class="col-sm-10">
                       <input type="file" class="form-control" name="foto" id="foto">
                   </div>
               <div class="mb-3 row">
                   <label for="status" class="col-sm-2 col-form-label">Status</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='status' id="status">
                   </div>
               </div>
               </div>
               <div class="mb-3 row">
                   <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='nama' id="nama">
                   </div>
               </div>
               <div class="mb-3 row">
                   <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='alamat' id="alamat">
                   </div>
               </div>
               <div class="mb-3 row">
                   <label for="htm" class="col-sm-2 col-form-label">Harga Masuk</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name='htm' id="htm">
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