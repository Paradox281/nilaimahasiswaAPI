@extends('master')

@section('konten')
<h3>Form Input Pengajar</h3>
<form method="post" action="{{route('simpanpengajar')}}">
  @csrf
  <div class="form-group">
    <label>No. Induk Pengajar</label>
    <input type="text" name="nip" class="form-control" placeholder="No. Induk Pengajar" required="">
  </div>
  <div class="form-group">
    <label>Nama Pengajar</label>
    <input type="text" name="nm_pengajar" class="form-control" placeholder="Nama Orang Tua" required="">
  </div>
  <div class="form-group">
    <label>Pendidikan</label>
    <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan" required="">
  </div>
  <div class="form-group">
    <label>Alamat Pengajar</label>
    <textarea name="alamat_pengajar" rows="3" class="form-control" placeholder="Alamat Pengajar" required=""></textarea>
  </div>
  <div class="form-group">
    <label>No. Hp Pengajar</label>
    <input type="text" name="no_hp_pengajar" class="form-control" placeholder="No. Hp Pengajar" required="">
  </div>
  <br>
  <h3>Register Akun Pengajar</h3>
  <div class="form-group">
    <label>Role</label>
    <input style="width: 40%;" type="text" name="role" value="Pengajar" class="form-control" readonly>
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="Username" required="">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" required="">
  </div>
  <div class="form-group text-right">
    <a href="{{route('tampilpengajar')}}" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>
@endsection
