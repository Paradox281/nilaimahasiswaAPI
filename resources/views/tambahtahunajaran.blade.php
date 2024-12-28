@extends('master')

@section('konten')
<h3>Form Input Tahun Ajaran</h3>
<form method="post" action="{{route('simpantahunajaran')}}">
  @csrf
  <div class="form-group">
    <label>Nama Taun Ajaran</label>
    <input type="text" name="nm_tahun_ajaran" class="form-control" placeholder="Nama Tahun Ajaran" required="">
    <span class="help-block">Contoh: 2010/2011</span>
  </div>
  <div class="form-group text-right">
    <a href="{{route('tampiltahunajaran')}}" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>
@endsection
