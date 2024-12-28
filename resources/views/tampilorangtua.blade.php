@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<table border="0" width="100%">
  <tr>
    <td style="width: 50%">
      <h3>Tampil Data Orang Tua/Wali</h3>
    </td>
    <td style="text-align: right;">
      <a class="btn btn-success" href="{{route('tambahorangtua')}}"><i class="fa fa-plus"></i> Tambah Data Orang Tua</a>
      <a class="btn btn-default" href="{{route('cetakorangtua')}}" target="_blank"><i class="fa fa-print"></i> Cetak Data Orang Tua</a>
    </td>
  </tr>
</table>
<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Nama Orang Tua/Wali</th>
    <th>Username</th>
    <th>Alamat</th>
    <th>No. Hp</th>
    <th>Aksi</th>
  </tr>
  @foreach($orang_tua as $ortu)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$ortu->nm_orang_tua}}</td>
      <td>{{$ortu->username}}</td>
      <td>{{$ortu->alamat_orang_tua}}</td>
      <td>{{$ortu->no_hp_orang_tua}}</td>
      <td style="width: 88px;">
      <a href="/orangtua/ubah/{{$ortu->id_orang_tua}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
      <a href="/orangtua/hapus/{{$ortu->id_orang_tua}}/{{$ortu->id_user}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
  @endforeach
</table>
@endsection
