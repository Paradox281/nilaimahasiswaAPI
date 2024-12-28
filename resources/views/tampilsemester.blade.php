@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<h3>Data Master Semester</h3>
<table class="table table-bordered table-hover">
  <tr>
    <th>No</th>
    <th>Kode Semester</th>
    <th>Nama Semester</th>
  </tr>
  @foreach($semester as $s) 
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$s->kd_semester}}</td>
    <td>{{$s->nm_semester}}</td>
  </tr>
  @endforeach
</table>
@endsection
