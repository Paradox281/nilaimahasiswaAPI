@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<table border="0" width="100%">
  <tr>
    <td style="width: 50%">
      <h3>Data Master Pelajaran</h3>
    </td>
    <td style="text-align: right;">
      <a class="btn btn-success" href="{{route('tambahpelajaran')}}"><i class="fa fa-plus"></i> Tambah Data Pelajaran</a>
    </td>
  </tr>
</table>
<table class="table table-bordered table-hover">
  <tr>
    <th>No</th>
    <th>Kode Mata Pelajaran</th>
    <th>Nama Mata Pelajaran</th>
    <th>Aksi</th>
  </tr>
  @foreach($pelajaran as $p) 
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$p->kd_pelajaran}}</td>
    <td>{{$p->nm_pelajaran}}</td>
    <td style="width: 88px;">
      <a href="/pelajaran/ubah/{{$p->id_pelajaran}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
      <a href="/pelajaran/hapus/{{$p->id_pelajaran}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
  @endforeach
</table>
@endsection
