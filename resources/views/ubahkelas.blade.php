@extends('master')

@section('konten')
<h3>Ubah Data Kelas</h3>
  @foreach($kelas as $k)
    <form method="post" action="{{route('updatekelas')}}">
      @csrf
      <input type="hidden" name="id_kelas" value="{{$k->id_kelas}}">
      <div class="form-group">
        <label>Kode Kelas</label>
        <input type="text" name="kd_kelas" value="{{$k->kd_kelas}}" class="form-control" placeholder="Kode Kelas" required="">
      </div>
      <div class="form-group">
        <label>Nama Kelas</label>
        <input type="text" name="nm_kelas" value="{{$k->nm_kelas}}" class="form-control" placeholder="Nama Kelas" required="">
      </div>
      <div class="form-group text-right">
        <a href="{{route('tampilkelas')}}" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
      </div>
    </form>
  @endforeach
@endsection
