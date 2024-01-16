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
                        <td>Judul Skripsi</td>
                        <td>:</td>
                        <td>{{$skripsi->judul}}</td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>:</td>
                        <td>{{$skripsi->penulis}}</td>
                    </tr>
                    <tr>
                        <td>Abstrak</td>
                        <td>:</td>
                        <td>{{$skripsi->abstrak}}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>{{$skripsi->keterangan}}</td>
                    </tr>
                    <tr>
                        <td>Rilis Tahun</td>
                        <td>:</td>
                        <td>{{$skripsi->rilis}}</td>
                    </tr>
                    <tr>
                        <td>Volume</td>
                        <td>:</td>
                        <td>{{$skripsi->volume}}</td>
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