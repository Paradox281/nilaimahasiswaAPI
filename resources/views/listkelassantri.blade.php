@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="{{route('tampilkelas')}}">Master Kelas</a></li>
  <li role="presentation" class="active"><a href="{{route('tampilkelassantri')}}">Kelas Siswa</a></li>
  <li role="presentation"><a href="{{route('tampilkelaspengajar')}}">Kelas Pengajar</a></li>
</ul>
<table border="0" width="100%">
  <tr>
    <td style="width: 50%">
      <h3><a href="{{route('tampilkelassantri')}}">Kelas Siswa</a> / Daftar Siswa <b>{{$nmkelas->nm_kelas}}</b></h3>
    </td>
    <td style="text-align: right;">
      <button class="btn btn-success" data-toggle="modal" data-target="#show"><i class="fa fa-plus"></i> Tambahkan Siswa</button>
    </td>
  </tr>
</table>
<table class="table table-bordered table-hover">
  <tr>
    <th>No</th>
    <th>Nama Siswa</th>
    <th>Aksi</th>
  </tr>
  @foreach($nmsantri as $s)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$s->nm_santri}}</td>
      <td>
        <a href="/kelassantri/hapus/{{$s->id_kelas}}/{{$s->id_kelas_santri}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
  @endforeach
</table>

<!-- Modal -->
<div class="modal fade" id="show" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Siswa {{$nmkelas->nm_kelas}}</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
      </div>
    </div>
  </div>
</div>
@endsection
