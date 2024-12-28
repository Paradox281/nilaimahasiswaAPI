@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<table border="0" width="100%">
    <tr>
        <td>
            <h3><a href="{{route('tampilsantripengajar')}}">Data Kelas</a> / Siswa <b>{{$kelas->nm_kelas}}</b> Tahun Ajaran <b>{{$setting->nm_tahun_ajaran}}</b></h3>
        </td>
        <td style="text-align: right;">
            <a class="btn btn-default" href="#" target="_blank"><i class="fa fa-print"></i> Cetak Data Siswa</a>
        </td>
    </tr>
</table>
<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama Siswa</th>
    <th>Status Siswa</th>
  </tr>
  @foreach($santri as $s)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$s['nis']}}</td>
      <td>{{$s['nm_santri']}}</td>
      <td style="color: green"><i class="fa fa-check"></i> Aktif</td>
    </tr>
  @endforeach
</table>
@endsection
