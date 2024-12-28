@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<table border="0" width="100%">
  <tr>
    <td style="width: 50%">
      <h3>Tampil Data Pengajar</h3>
    </td>
    <td style="text-align: right;">
      <a class="btn btn-success" href="{{route('tambahpengajar')}}"><i class="fa fa-plus"></i> Tambah Data Pengajar</a>
      <a class="btn btn-default" href="{{route('cetakpengajar')}}" target="_blank"><i class="fa fa-print"></i> Cetak Data Pengajar</a>
    </td>
  </tr>
</table>
<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>No. Induk Pengajar</th>
    <th>Username</th>
    <th>Nama Pengajar</th>
    <th>Pendidikan</th>
    <th>Alamat</th>
    <th>No. Hp</th>
    <th>Aksi</th>
  </tr>
  @foreach($pengajar as $p)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$p->nip}}</td>
      <td>{{$p->username}}</td>
      <td>{{$p->nm_pengajar}}</td>
      <td>{{$p->pendidikan}}</td>
      <td>{{$p->alamat_pengajar}}</td>
      <td>{{$p->no_hp_pengajar}}</td>
      <td style="width: 88px;">
      <a href="/pengajar/ubah/{{$p->id_pengajar}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
      <a href="/pengajar/hapus/{{$p->id_pengajar}}/{{$p->id_user}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
  @endforeach
</table>
@endsection
