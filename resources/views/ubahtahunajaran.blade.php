@extends('master')

@section('konten')
<h3>Ubah Data Tahun Ajaran</h3>
  @foreach($tahunajaran as $t)
    <form method="post" action="{{route('updatetahunajaran')}}">
      @csrf
      <input type="hidden" name="id_tahun_ajaran" value="{{$t->id_tahun_ajaran}}">
      <div class="form-group">
        <label>Nama Tahun Ajaran</label>
        <input type="text" name="nm_tahun_ajaran" value="{{$t->nm_tahun_ajaran}}" class="form-control" placeholder="Nama Tahun Ajaran" required="">
      </div>
      <div class="form-group text-right">
        <a href="{{route('tampiltahunajaran')}}" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
      </div>
    </form>
  @endforeach
@endsection
