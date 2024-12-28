@extends('master')

@section('konten')
<h3>Ubah Data Pengajar</h3>
  @foreach($pengajar as $p)
    <form method="post" action="{{route('updatepengajar')}}">
      @csrf
      <input type="hidden" name="id_pengajar" value="{{$p->id_pengajar}}">
      <input type="hidden" name="id_user" value="{{$p->id_user}}">
      <div class="form-group">
        <label>No. Induk Pengajar</label>
        <input type="text" name="nip" value="{{$p->nip}}" class="form-control" placeholder="No. Induk Pengajar" required="">
      </div>
      <div class="form-group">
        <label>Nama Pengajar</label>
        <input type="text" name="nm_pengajar" value="{{$p->nm_pengajar}}" class="form-control" placeholder="Nama Pengajar" required="">
      </div>
      <div class="form-group">
        <label>Pendidikan</label>
        <input type="text" name="pendidikan" value="{{$p->pendidikan}}" class="form-control" placeholder="Pendidikan" required="">
      </div>
      <div class="form-group">
        <label>Alamat Pengajar</label>
        <textarea name="alamat_pengajar" rows="3" class="form-control" placeholder="Alamat Pengajar" required="">{{$p->alamat_pengajar}}</textarea>
      </div>
      <div class="form-group">
        <label>No. Hp Pengajar</label>
        <input type="text" name="no_hp_pengajar" value="{{$p->no_hp_pengajar}}" class="form-control" placeholder="No. Hp Pengajar" required="">
      </div>
      <br>
      <h3>Ubah Akun Pengajar</h3>
      <div class="form-group">
        <label>Role</label>
        <input style="width: 40%;" type="text" name="role" value="Pengajar" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" value="{{$p->username}}" class="form-control" placeholder="Username" required="">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="help-block">*Kosongkan Jika Password tidak diubah.</span>
      </div>
      <div class="form-group text-right">
        <a href="{{route('tampilpengajar')}}" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
      </div>
    </form>
  @endforeach
@endsection
