@extends('master')

@section('konten')
<h3>Ubah Data Orang Tua</h3>
  @foreach($orang_tua as $ortu)
    <form method="post" action="{{route('updateorangtua')}}">
      @csrf
      <input type="hidden" name="id_orang_tua" value="{{$ortu->id_orang_tua}}">
      <input type="hidden" name="id_user" value="{{$ortu->id_user}}">
      <div class="form-group">
        <label>Nama Orang Tua</label>
        <input type="text" name="nm_orang_tua" value="{{$ortu->nm_orang_tua}}" class="form-control" placeholder="Nama Orang Tua" required="">
      </div>
      <div class="form-group">
        <label>Alamat Orang Tua</label>
        <textarea name="alamat_orang_tua" rows="3" class="form-control" placeholder="Alamat Orang Tua" required="">{{$ortu->alamat_orang_tua}}</textarea>
      </div>
      <div class="form-group">
        <label>No. Hp Orang Tua</label>
        <input type="text" name="no_hp_orang_tua" value="{{$ortu->no_hp_orang_tua}}" class="form-control" placeholder="No. Hp Orang Tua" required="">
      </div>
      <br>
      <h3>Ubah Akun Orang Tua</h3>
      <div class="form-group">
        <label>Role</label>
        <input style="width: 40%;" type="text" name="role" value="Orang Tua" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" value="{{$ortu->username}}" class="form-control" placeholder="Username" required="">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="help-block">*Kosongkan Jika Password tidak diubah.</span>
      </div>
      <div class="form-group text-right">
        <a href="{{route('tampilorangtua')}}" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
      </div>
    </form>
  @endforeach
@endsection
