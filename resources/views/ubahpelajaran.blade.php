@extends('master')

@section('konten')
<h3>Ubah Data Pelajaran</h3>
  @foreach($pelajaran as $p)
    <form method="post" action="{{route('updatepelajaran')}}">
      @csrf
      <input type="hidden" name="id_pelajaran" value="{{$p->id_pelajaran}}">
      <div class="form-group">
        <label>Kode Mata Pelajaran</label>
        <input type="text" name="kd_pelajaran" value="{{$p->kd_pelajaran}}" class="form-control" placeholder="Kode Mata Pelajaran" required="">
      </div>
      <div class="form-group">
        <label>Nama Mata Pelajaran</label>
        <input type="text" name="nm_pelajaran" value="{{$p->nm_pelajaran}}" class="form-control" placeholder="Nama Mata Pelajaran" required="">
      </div>
      <div class="form-group text-right">
        <a href="{{route('tampilpelajaran')}}" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
      </div>
    </form>
  @endforeach
@endsection
