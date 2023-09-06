@extends('layouts.admin') 
 
@section('content') 
 
<div class="content-header"> 
    <div class="container-fluid"> 
        <div class="row mb-2"> 
            <h3>Buku</h3> 
        </div> 
    </div> 
</div> 
 
 
<div class="card card-primary"> 
    <div class="card-header"> 
        <h2 class="card-title">Data Buku</h2> 
    </div> 
 
 
    @if ($message = Session::get('success')) 
    <div class="alert alert-success"> 
        <p>{{ $message }}</p> 
    </div> 
    @endif 
 
    <div class="card-body"> 
        <div style="margin-bottom: 20px"> 
            <a href="{{ route('buku_create') }}" class="btn btn-primary btn-flat"> 
                <i class="fa fa-plus-circle"></i> Tambah Data 
            </a> 
        </div> 
        <div style="overflow: auto"> 
            <table class="table table-bordered table-condensed"> 
                <thead> 
                    <tr> 
                        <th style="text-align:center;">No</th> 
                        <th style="text-align:center;">Nama</th> 
                        <th style="text-align:center;">Tahun Terbit</th> 
                        <th style="text-align:center;">Penulis</th> 
                        <th style="text-align:center;">Penerbit</th> 
                        <th style="text-align:center;">Kategori</th> 
                        <th width="200px" style="text-align: center;">Sinopsis</th> 
                        <th style="text-align:center;">Sampul</th> 
                        <th width="250px" style="text-align: center;">Action</th> 
                    </tr> 
                </thead> 
                @foreach($buku as $buku) 
                <tbody> 
                    <tr> 
                        <td style="text-align:center">{{ $loop->iteration }}</td> 
                        <td style="text-align:center">{{ $buku->nama }}</td> 
                        <td style="text-align:center">{{ $buku->tahun_terbit }}</td> 
                        <td style="text-align:center" style="text-align:center">{{ $buku->id_penulis }}</td> 
                        <td style="text-align:center">{{ $buku->id_penerbit }}</td> 
                        <td style="text-align:center">{{ @$buku->kategori->nama }}</td> 
                        <td style="text-align:center">{{ $buku->sinopsis }}</td> 
                        <td style="text-align:center"><img src="{{ asset('storage/'.$buku->sampul) }}" style="width: 150px;"></td> 
                        <td style="text-align:center"> 
 
                            <a href="{{ route('buku_show', $buku->id) }}" class="btn btn-info"> 
                                <i class="fas fa-fw fa-eye"></i> 
                            </a> 
 
                            <a href="{{ route('buku_edit', $buku->id) }}" class="btn btn-warning"> 
                                <i class="fas fa-fw fa-pencil"></i> 
                            </a> 
 
                            <form action="{{ route('buku_destroy', $buku->id) }}" method="post" class="d-inline"> 
                                @csrf 
                                <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');" class="btn btn-danger">Delete</button> 
                            </form> 
                        </td> 
                    </tr> 
                </tbody> 
                @endforeach 
            </table> 
        </div> 
    </div> 
</div> 
@endsection