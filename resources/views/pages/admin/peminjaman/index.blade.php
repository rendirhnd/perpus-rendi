@extends('layouts.admin') 
 
@section('content') 
 
<div class="content-header"> 
    <div class="container-fluid"> 
        <div class="row mb-2"> 
            <h3>Peminjaman</h3> 
        </div> 
    </div> 
</div> 
 
 
<div class="card card-primary"> 
    <div class="card-header"> 
        <h2 class="card-title">Data Peminjaman</h2> 
    </div> 
 
 
    @if ($message = Session::get('success')) 
    <div class="alert alert-success"> 
        <p>{{ $message }}</p> 
    </div> 
    @endif 
 
    <div class="card-body"> 
        <div style="margin-bottom: 20px"> 
            <a href="{{ route('peminjaman_create') }}" class="btn btn-primary btn-flat"> 
                <i class="fa fa-plus-circle"></i> Tambah Data 
            </a> 
        </div> 
        <div style="overflow: auto"> 
            <table class="table table-bordered table-condensed"> 
                <thead> 
                    <tr> 
                        <th style="text-align:center;">No</th> 
                        <th style="text-align:center;">Nama Buku</th> 
                        <th style="text-align:center;">Anggota</th> 
                        <th style="text-align:center;">Tanggal Pinjam</th> 
                        <th style="text-align:center;">Tanggal Kembali</th> 
                        <th style="text-align:center;">Denda</th> 
                        <th style="text-align:center;">Status Peminjaman</th> 
                        <th width="250px" style="text-align: center;">Action</th> 
 
                         
                    </tr> 
                </thead> 
                @foreach($peminjaman as $pinjam) 
                <tbody> 
                    <tr> 
                        <td style="text-align:center">{{ $loop->iteration }}</td> 
                        <td style="text-align:center">{{ $pinjam->id_buku }}</td> 
                        <td style="text-align:center">{{ $pinjam->id_anggota }}</td> 
                        <td style="text-align:center">{{ $pinjam->tanggal_pinjam }}</td> 
                        <td style="text-align:center">{{ $pinjam->tanggal_kembali }}</td> 
                        <td style="text-align:center">{{ $pinjam->denda }}</td> 
                        <td style="text-align:center">{{ $pinjam->id_status_peminjaman }}</td> 
                        <td style="text-align:center"> 
 
                            <a href="{{ route('peminjaman_show', $pinjam->id) }}" class="btn btn-info"> 
                                <i class="fas fa-fw fa-eye"></i> 
                            </a> 
 
                            <a href="{{ route('peminjaman_edit', $pinjam->id) }}" class="btn btn-warning"> 
                                <i class="fas fa-fw fa-pencil"></i> 
                            </a> 
 
                            <form action="{{ route('peminjaman_destroy', $pinjam->id) }}" method="post" class="d-inline"> 
                                @csrf 
                               <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');" class="btn btn-danger" ><i class="fas fa-fw  fa-trash"></i></button> 
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