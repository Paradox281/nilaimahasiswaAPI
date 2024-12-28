@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4><br>
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="{{route('tampilkelas')}}">Master Kelas</a></li>
  <li role="presentation"><a href="{{route('tampilkelassantri')}}">Kelas Siswa</a></li>
  <li role="presentation"><a href="{{route('tampilkelaspengajar')}}">Kelas Pengajar</a></li>
</ul>
<table border="0" width="100%">
  <tr>
    <td style="width: 50%">
      <h3>Data Master Kelas</h3>
    </td>
    <td style="text-align: right;">
      <a class="btn btn-success" href="{{route('tambahkelas')}}"><i class="fa fa-plus"></i> Tambah Data Kelas</a>
    </td>
  </tr>
</table>
<table class="table table-bordered table-hover">
  <tr>
    <th>No</th>
    <th>Kode Kelas</th>
    <th>Nama Kelas</th>
    <th>Aksi</th>
  </tr>
  @foreach($kelas as $k) 
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$k->kd_kelas}}</td>
    <td>{{$k->nm_kelas}}</td>
    <td style="width: 88px;">
      <a href="/kelas/ubah/{{$k->id_kelas}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
      <a href="/kelas/hapus/{{$k->id_kelas}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
  @endforeach
</table>
@endsection
