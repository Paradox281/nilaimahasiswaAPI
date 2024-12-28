@extends('master')

@section('konten')
<h3>Form Input Kelas</h3>
<form method="post" action="{{route('simpankelas')}}">
  @csrf
  <div class="form-group">
    <label>Kode Kelas</label>
    <input type="text" name="kd_kelas" class="form-control" placeholder="Kode Kelas" required="">
  </div>
  <div class="form-group">
    <label>Nama Kelas</label>
    <input type="text" name="nm_kelas" class="form-control" placeholder="Nama Kelas" required="">
  </div>
  <div class="form-group text-right">
    <a href="{{route('tampilkelas')}}" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>
@endsection
