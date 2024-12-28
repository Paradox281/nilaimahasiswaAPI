@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<h3>Data Kelas</h3>
<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Kelas</th>
    <th>Aksi</th>
  </tr>
  @foreach($kelaspengajar as $k)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$k->nm_kelas}}</td>
        <td><a href="/santripengajar/lihat/{{$k->id_kelas}}"><i class="fa fa-eye"></i> Lihat Siswa</a></td>
    </tr>
  @endforeach
</table>
@endsection
