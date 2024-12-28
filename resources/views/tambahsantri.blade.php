@extends('master')

@section('konten')
<h3>Form Input Siswa</h3>
<form method="post" action="{{route('simpansantri')}}">
  @csrf
  <div class="form-group">
    <label>Orang Tua/Wali</label>
    <select class="form-control" name="id_orang_tua" required>
      <option value="">- Pilih Orang Tua -</option>
      @foreach ($orangtua as $ortu)
        <option value="{{$ortu->id_orang_tua}}">{{$ortu->nm_orang_tua}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>No. Induk Siswa</label>
    <input type="text" name="nis" class="form-control" placeholder="No. Induk Siswa" required="">
  </div>
  <div class="form-group">
    <label>Nama Siswa</label>
    <input type="text" name="nm_santri" class="form-control" placeholder="Nama Siswa" required="">
  </div>
  <div class="form-group">
    <label>Tempat Lahir</label>
    <input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir" required="">
  </div>
  <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required="">
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat" required=""></textarea>
  </div>
  <div class="form-group">
    <label>No. Hp</label>
    <input type="text" name="no_hp" class="form-control" placeholder="No. Hp" required="">
  </div>
  <div class="form-group text-right">
    <a href="{{route('tampilsantri')}}" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>
@endsection
