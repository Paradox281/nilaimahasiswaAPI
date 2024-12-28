@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="{{route('tampilkelas')}}">Master Kelas</a></li>
  <li role="presentation" class="active"><a href="{{route('tampilkelassantri')}}">Kelas Siswa</a></li>
  <li role="presentation"><a href="{{route('tampilkelaspengajar')}}">Kelas Pengajar</a></li>
</ul>
<h3>Kelas Siswa</h3>
<br>
<div class="row">
  @foreach($kelas as $k)
    <div class="col-md-2">
      <div class="thumbnail">
        <br>
        <img src="/img/kelassantri.png" width="75%">
        <div class="caption">
          <h3>{{$k->nm_kelas}}</h3>
          <p><a href="list/{{$k->id_kelas}}" class="btn btn-info" role="button"><i class="fa fa-eye"></i> Lihat Siswa</a></p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection
