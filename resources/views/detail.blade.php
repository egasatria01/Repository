@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Detail Skripsi</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td>{{$skripsi->judul}}</td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>:</td>
                        <td>{{$skripsi->penulis}}</td>
                    </tr>
                    <tr>
                        <td>Dosen Pembimbing</td>
                        <td>:</td>
                        <td>{{$skripsi->dospem}}</td>
                    </tr>
                    <tr>
                        <td>Abstrak</td>
                        <td>:</td>
                        <td>{{$skripsi->abstrak}}</td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>:</td>
                        <td>{{$skripsi->prodi}}</td>
                    </tr>
                    <tr>
                        <td>Rilis Tahun</td>
                        <td>:</td>
                        <td>{{$skripsi->rilis}}</td>
                    </tr>
                    <tr>
                        <td>Halaman</td>
                        <td>:</td>
                        <td>{{$skripsi->halaman}}</td>
                    </tr>
                    <tr>
                        <td>File PDF</td>
                        <td>:</td>
                        <td>{{$skripsi->file}}</td>
                    </tr>
                </table>
                <a href="{{ route('pdf.show', ['id' => $skripsi->id]) }}"  target="_blank">
                    <button class="btn btn-info m-3">
                        Lihat Skripsi
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@stop