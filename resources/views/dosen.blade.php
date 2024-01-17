@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Kelola Dosen</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">{{__('Pengelolaan Dosen')}}</div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <div class="tombol">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data Dosen
                    </button>
                </div>
                <div class="tombol">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#import">
                        Import Data Dosen
                    </button>
                </div>
            </div>
            <table id="table-data" class="table table-stripped text-center">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Tanggal Lahir</th>
                        <th>Kontak</th>
                        <th>Prodi</th>
                        <th>Jabatan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($dosen as $dosens)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ Str::limit($dosens->nip,15)}}</td>
                        <td>{{$dosens->nama}}</td>
                        <td>{{ Str::limit($dosens->alamat,20)}}</td>
                        <td>{{ Str::limit($dosens->email,15)}}</td>
                        <td>{{$dosens->tanggalLahir}}</td>
                        <td>{{ Str::limit($dosens->kontak,12)}}</td>
                        <td>{{$dosens->programStudi}}</td>
                        <td>{{$dosens->jabatan}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" id="btn-edit-dosen" class="btn btn-success" data-toggle="modal" data-target="#edit" data-id="{{ $dosens->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" onclick="deleteConfirmation('{{$dosens->id}}' , '{{$dosens->nama}}' )">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form method="post" action="{{ route('tambah.dosen')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="d-flex">
                            <div class="form-group col-md-6">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" name="nip" id="nip" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="d-flex">
                                <div class="form-group col-md-6">
                                    <label for="tanggalLahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggalLahir" id="tanggalLahir" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="programStudi">Program Studi</label>
                                    <input type="text" class="form-control" name="programStudi" id="programStudi" required>
                                </div>
                            </div>
                        <div class="d-flex">
                            <div class="form-group col-md-6">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kontak">Kontak</label>
                                <input type="text" class="form-control" name="kontak" id="kontak" required>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('ubah.dosen')}}" enctype="multipart/form-data">
                    @csrf
                    @method ('PATCH')
                    <div class="modal-body">
                        <div class="d-flex">
                            <div class="form-group col-md-6">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" name="nip" id="edit-nip" required>
                            </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="id" id="edit-id" required hidden>
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" id="edit-name" required>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="edit-alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="edit-email" required>
                        </div>
                        <div class="d-flex">
                            <div class="form-group col-md-6">
                                <label for="tanggalLahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggalLahir" id="edit-tanggalLahir" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kontak">Kontak</label>
                                <input type="text" class="form-control" name="kontak" id="edit-kontak" required>
                            </div>
                        </div>
                            <div class="form-group col-md-6">
                                <label for="programStudi">Program Studi</label>
                                <input type="text" class="form-control" name="programStudi" id="edit-programStudi" required>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-group col-md-6">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="edit-jabatan" required>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="importLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importLabel">Import Data Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('dosen.import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group col-md-12">
                            <label for="file">File</label>
                            <input type="file"class="form-control p-1" name="file" id="edit-file" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@section('js')

<script>
        $(function(){
            $(document).on('click','#btn-edit-dosen', function(){
                let id = $(this).data('id');
                $('#image-area').empty();

                $.ajax({
                    type: "get",
                    url: "{{url('/admin/ajaxadmin/dataDosen')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                        $('#edit-name').val(res.nama);
                        $('#edit-email').val(res.email);
                        $('#edit-kontak').val(res.kontak);
                        $('#edit-alamat').val(res.alamat);
                        $('#edit-id').val(res.id);
                        $('#edit-nip').val(res.nip);
                        $('#edit-jabatan').val(res.jabatan);
                        $('#edit-tanggalLahir').val(res.tanggalLahir);
                        $('#edit-programStudi').val(res.programStudi);
                    },
                });
            });
        });

        function deleteConfirmation(id,nama) {
            swal.fire({
                title: "Hapus?",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus data dengan Nama " +nama+"?!",
                showCancelButton: !0,
                confirmButtonText: "Ya, lakukan!",
                cancelButtonText: "Tidak, batalkan!",

            }).then (function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'GET',
                        url: "{{url('/admin/dosen/hapus')}}/"+id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal.fire("Done!", results.message, "success");
                                setTimeout(function(){
                                    location.reload();
                                },1000);
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
</script>
@stop