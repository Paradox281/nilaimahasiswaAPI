@extends('master')

@section('konten')
<h4><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> Kembali ke Home</a></h4>
<h3><a href="{{route('tampilnilai')}}">Data Kelas</a> / Nilai <b>{{$kelas->nm_kelas}}</b> Pelajaran <b>{{$pelajaran->nm_pelajaran}}</b></h3>
<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Nama Siswa</th>
    <th>Nilai</th>
    <th>Aksi</th>
  </tr>
  @foreach($nilaisantri as $s)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$s['nm_santri']}}</td>
      @if($s['nilai']==null)
        <td style="color: red">Belum Entri</td>
        <td>
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#input{{$s['id_santri']}}"><i class="fa fa-plus"></i> Input Nilai</button>
        </td>
        <!-- Modal Input-->
        <div class="modal fade" id="input{{$s['id_santri']}}" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="post" action="{{route('simpannilai')}}">
                @csrf
                <input type="hidden" name="id_santri" value="{{$s['id_santri']}}">
                <input type="hidden" name="id_kelas" value="{{$kelas->id_kelas}}">
                <input type="hidden" name="id_pelajaran" value="{{$pelajaran->id_pelajaran}}">
                <input type="hidden" name="id_setting" value="{{$setting->id_setting}}">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Input Nilai</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" value="{{$s['nm_santri']}}" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" value="{{$kelas->nm_kelas}}" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" value="{{$pelajaran->nm_pelajaran}}" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Semester</label>
                    <input type="text" value="{{$setting->nm_semester}}" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" value="{{$setting->nm_tahun_ajaran}}" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Nilai</label>
                    <input type="text" name="nilai" class="form-control" required>
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
      @else
        <td>{{$s['nilai']['nilai']}}</td>
        <td>
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$s['id_santri']}}"><i class="fa fa-edit"></i> Ubah Nilai</button>
        </td>
        <!-- Modal Edit -->
        <div class="modal fade" id="edit{{$s['id_santri']}}" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="post" action="{{route('updatenilai')}}">
                @csrf
                <input type="hidden" name="id_santri" value="{{$s['id_santri']}}">
                <input type="hidden" name="id_kelas" value="{{$kelas->id_kelas}}">
                <input type="hidden" name="id_pelajaran" value="{{$pelajaran->id_pelajaran}}">
                <input type="hidden" name="id_setting" value="{{$setting->id_setting}}">
                <input type="hidden" name="id_nilai" value="{{$s['nilai']['id_nilai']}}">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Ubah Nilai</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" value="{{$s['nm_santri']}}" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" value="{{$kelas->nm_kelas}}" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" value="{{$pelajaran->nm_pelajaran}}" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Semester</label>
                    <input type="text" value="{{$setting->nm_semester}}" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" value="{{$setting->nm_tahun_ajaran}}" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Nilai</label>
                    <input type="text" name="nilai" value="{{$s['nilai']['nilai']}}" class="form-control" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ubah Nilai</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      @endif
    </tr>
  @endforeach
</table>
@endsection
