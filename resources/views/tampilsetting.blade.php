@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<!-- membagi dua kolom judul dan tombol Tambah -->
<table border="0" width="100%">
  <tr>
    <td style="width: 50%">
      <h3>Data Master Setting</h3>
    </td>
    <td style="text-align: right;">
      <button class="btn btn-success" data-toggle="modal" data-target="#show"><i class="fa fa-plus"></i> Tambah Settingan</button>
    </td>
  </tr>
</table>
<!-- informasi -->
<div class="alert alert-info" role="alert">
  <h4><i class="fa fa-info"></i> <u>Informasi</u></h4>
  <p>Tahun ajaran aktif saat ini pada sistem adalah <b style="text-transform: uppercase;">Tahun Ajaran {{$informasi->nm_tahun_ajaran}} {{$informasi->nm_semester}}</b></p>
</div>
<!-- table menampilkan seluruh data setting -->
<table class="table table-bordered table-hover">
  <tr>
    <th>No</th>
    <th>Tahun Ajaran</th>
    <th>Semester</th>
    <th>Status</th>
    <th>Aksi</th>
  </tr>
  @foreach($setting as $s) 
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$s->nm_tahun_ajaran}}</td>
    <td>{{$s->nm_semester}}</td>
    <td>
      @if($s->status==1)
        <span class="label label-success"><i class="fa fa-check"></i> Aktif</span>
      @else
        <span class="label label-default">Tidak Aktif</span>
      @endif
    </td>
    <td style="width: 88px;">
      <a href="/setting/ubah/{{$s->id_setting}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
    </td>
  </tr>
  @endforeach
</table>

<!-- Modal -->
<div class="modal fade" id="show" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Settingan</h4>
      </div>
      <form method="post" action="{{route('simpansetting')}}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Tahun Ajaran</label>
            <select name="id_tahun_ajaran" class="form-control" required>
              <option value="">- Pilih Tahun Ajaran -</option>
              @foreach($tahunajaran as $ta)
                <option value="{{$ta->id_tahun_ajaran}}">{{$ta->nm_tahun_ajaran}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Semester</label>
            <select name="id_semester" class="form-control" required>
              <option value="">- Pilih Semester -</option>
              @foreach($semester as $se)
                <option value="{{$se->id_semester}}">{{$se->nm_semester}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Status</label>
            <div>
              <input type="radio" value="1" name="status" checked> Aktif <br>
              <input type="radio" value="0" name="status"> TIdak Aktif
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
