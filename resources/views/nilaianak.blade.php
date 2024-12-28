@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<h3><a href="{{route('tampilanak')}}">Data Anak</a> / Nilai <b>{{$anak->nm_santri}}</b></h3>
<table class="table table-bordered">
    <tr>
        <td><b>Mata Pelajaran</b></td>
        <td><b>Nilai</b></td>
    </tr>
    @foreach($nilaianak['datanilai'] as $n)
    <tr>
        <td>{{$n->nm_pelajaran}}</td>
        <td>{{$n->nilai}}</td>
    </tr>
    @endforeach
    <tr>
        <td><b>Jumlah</b></td>
        <td><b>{{$nilaianak['jumlahnilai']}}</b></td>
    </tr>
    <tr>
        <td><b>Rata-Rata</b></td>
        <td><b>{{$nilaianak['ratanilai']}}</b></td>
    </tr>
</table>
@endsection
