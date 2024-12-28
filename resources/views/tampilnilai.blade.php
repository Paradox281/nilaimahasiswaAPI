@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<h3>Data Kelas dan Mata Pelajaran</h3>
<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Kelas</th>
    <th>Mata Pelajaran</th>
    <th>Aksi</th>
  </tr>
  @foreach($kelaspengajar as $k)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$k->nm_kelas}}</td>
        <td>{{$k->nm_pelajaran}}</td>
        <td><a href="/nilai/lihat/{{$k->id_kelas}}/{{$k->id_pelajaran}}"><i class="fa fa-eye"></i> Lihat Nilai</a></td>
    </tr>
  @endforeach
</table>
@endsection
