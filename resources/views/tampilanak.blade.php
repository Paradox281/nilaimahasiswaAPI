@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<h3>Data Anak</h3>
<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama Anak</th>
    <th>Aksi</th>
  </tr>
  @foreach($anak as $a)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$a->nis}}</td>
        <td>{{$a->nm_santri}}</td>
        <td><a href="/anak/nilai/{{$a->id_santri}}"><i class="fa fa-eye"></i> Lihat Nilai</a></td>
    </tr>
  @endforeach
</table>
@endsection
