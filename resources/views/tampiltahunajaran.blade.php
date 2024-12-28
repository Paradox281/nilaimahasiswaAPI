@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<table border="0" width="100%">
  <tr>
    <td style="width: 50%">
      <h3>Data Master Tahun Ajaran</h3>
    </td>
    <td style="text-align: right;">
      <a class="btn btn-success" href="{{route('tambahtahunajaran')}}"><i class="fa fa-plus"></i> Tambah Tahun Ajaran</a>
    </td>
  </tr>
</table>
<table class="table table-bordered table-hover">
  <tr>
    <th>No</th>
    <th>Nama Tahun Ajaran</th>
    <th>Aksi</th>
  </tr>
  @foreach($tahunajaran as $t) 
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$t->nm_tahun_ajaran}}</td>
    <td style="width: 88px;">
      <a href="/tahunajaran/ubah/{{$t->id_tahun_ajaran}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
    </td>
  </tr>
  @endforeach
</table>
@endsection
