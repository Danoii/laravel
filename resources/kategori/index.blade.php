@extends('layouts.app')        
        <!-- START DATA -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Kategori Tempat Wisata') }}</div>

                <div class="card-body">
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('kategori/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">Nomor</th>
                            <th class="col-md-2">Kategori</th>
                            <th class="col-md-2">Pengelola</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->id_kategori}}</td>
                            <td>{{ $item->id_pengelola}}</td>
                            <td>
                                <a href='{{ url('Kategori/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form class="d-inline" action="{{ url('Kategori/'.$item->id) }}"
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
