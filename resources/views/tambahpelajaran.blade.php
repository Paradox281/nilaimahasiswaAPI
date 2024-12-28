@extends('master')

@section('konten')
<h3>Form Input Pelajaran</h3>
<form method="post" action="{{route('simpanpelajaran')}}">
  @csrf
  <div class="form-group">
    <label>Kode Mata Pelajaran</label>
    <input type="text" name="kd_pelajaran" class="form-control" placeholder="Kode Mata Pelajaran" required="">
  </div>
  <div class="form-group">
    <label>Nama Mata Pelajaran</label>
    <input type="text" name="nm_pelajaran" class="form-control" placeholder="Nama Mata Pelajaran" required="">
  </div>
  <div class="form-group text-right">
    <a href="{{route('tampilpelajaran')}}" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>
@endsection
