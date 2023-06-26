@extends('layouts.app')        
        <!-- START DATA -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Informasi Tempat Wisata') }}</div>

                <div class="card-body">
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('Wisata/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">Nomor</th>
                            <th class="col-md-1">Foto</th>
                            <th class="col-md-3">Status</th>
                            <th class="col-md-4">Nama</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-2">Kategori</th>
                            <th class="col-md-2">Pengelola</th>
                            <th class="col-md-2">Harga Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>
                                @if ($item->foto)
                                    <img style="max-width:200px;
                                    max-height:200px" src="{{ url('foto').'/'.
                                    $item->foto }}" />
                                @endif
                            </td>
                            <td>{{ $item->status}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>{{ $item->id_kategori}}</td>
                            <td>{{ $item->id_pengelola}}</td>
                            <td>{{ $item->id_htm}}</td>
                            <td>
                                <a href='{{ url('Wisata/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form class="d-inline" action="{{ url('Wisata/'.$item->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">
                                        Del</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
          </div>
                </div>
            </div>
        </div>
    </div>
</div>     
@endsection
          <!-- AKHIR DATA -->
