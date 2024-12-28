@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<table border="0" width="100%">
  <tr>
    <td style="width: 50%">
      <h3>Tampil Data Siswa</h3>
    </td>
    <td style="text-align: right;">
      <a class="btn btn-success" href="{{route('tambahsantri')}}"><i class="fa fa-plus"></i> Tambah Data Siswa</a>
      <a class="btn btn-default" href="{{route('cetaksantri')}}" target="_blank"><i class="fa fa-print"></i> Cetak Data Siswa</a>
    </td>
  </tr>
</table>
<table class="table table-bordered table-hover">
  <tr>
    <th>No</th>
    <th>No. Induk Siswa</th>
    <th>Nama Siswa</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Alamat</th>
    <th>No. Hp</th>
    <th>Orang Tua/Wali</th>
    <th>Aksi</th>
  </tr>
  @foreach($santri as $s) 
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$s->nis}}</td>
    <td>{{$s->nm_santri}}</td>
    <td>{{$s->tmp_lahir}}</td>
    <td>{{$s->tgl_lahir}}</td>
    <td>{{$s->alamat}}</td>
    <td>{{$s->no_hp}}</td>
    <td>{{$s->nm_orang_tua}}</td>
    <td style="width: 88px;">
      <a href="/santri/ubah/{{$s->id_santri}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
      <a href="/santri/hapus/{{$s->id_santri}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
  @endforeach
</table>
@endsection
