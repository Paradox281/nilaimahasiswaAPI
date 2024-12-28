@extends('master')

@section('konten')
  <h4>Selamat Datang <b style="text-transform: uppercase;"> Bapak/IBUK {{Auth::user()->username}}</b> di Aplikasi Nilai Siswa, Anda Login sebagai <b style="text-transform: uppercase;">{{Auth::user()->role}}</b>. Silahkan pilih menu di bawah ini untuk menggunakan Aplikasi.</h4>
  <div class="alert alert-info" role="alert">
    <h4><i class="fa fa-info"></i> <u>Informasi</u></h4>
    <p>Tahun ajaran aktif saat ini pada sistem adalah <b style="text-transform: uppercase;">Tahun Ajaran {{$informasi->nm_tahun_ajaran}} {{$informasi->nm_semester}}</b></p>
  </div>
  @if(Auth::user()->role=="Administrator")
    <table border="1" width="100%" style="text-align: center;">
      <tr>
        <td width="25%">
          <br>
          <a href="{{route('tampilorangtua')}}">
            <img src="img/ortu.png" width="60px">
            <p>Orang Tua</p>
          </a>
        </td>
        <td width="25%">
          <br>
          <a href="{{route('tampilsantri')}}">
            <img src="img/santri.png" width="60px">
            <p>Siswa</p>
          </a>
        </td>
        <td width="25%">
          <br>
          <a href="{{route('tampilpengajar')}}">
            <img src="img/guru.png" width="60px">
            <p>Pengajar</p>
          </a>
        </td>
        <td width="25%">
          <br>
          <a href="{{route('tampilpelajaran')}}">
            <img src="img/pelajaran.png" width="60px">
            <p>Mata Pelajaran</p>
          </a>
        </td>
      </tr>
      <tr>
        <td>
          <br>
          <a href="{{route('tampilkelas')}}">
            <img src="img/kelas.png" width="60px">
            <p>Kelas</p>
          </a>
        </td>
        <td>
          <br>
          <a href="{{route('tampilsemester')}}">
            <img src="img/semester.png" width="60px">
            <p>Semester</p>
          </a>
        </td>
        <td>
          <br>
          <a href="{{route('tampiltahunajaran')}}">
            <img src="img/tahun.png" width="60px">
            <p>Tahun Ajaran</p>
          </a>
        </td>
        <td>
          <br>
          <a href="{{route('tampilsetting')}}">
            <img src="img/setting.png" width="60px">
            <p>Setting</p>
          </a>
        </td>
      </tr>
    </table>
  @elseif(Auth::user()->role=="Pengajar")
    <table border="1" width="100%" style="text-align: center;">
      <tr>
        <td width="50%">
          <br>
          <a href="{{route('tampilsantripengajar')}}">
            <img src="img/santrianda.png" width="70px">
            <p>List Siswa</p>
          </a>
        </td>
        <td width="50%">
          <br>
          <a href="{{route('tampilnilai')}}">
            <img src="img/nilai.png" width="65px">
            <p>Nilai Siswa</p>
          </a>
        </td>
      </tr>
    </table>
  @elseif(Auth::user()->role=="Orang Tua")
    <table border="1" width="100%" style="text-align: center;">
      <tr>
        <td>
          <br>
          <a href="{{route('tampilanak')}}">
            <img src="img/anak.png" width="75px">
            <p>List Anak</p>
          </a>
        </td>
      </tr>
    </table>
  @endif
  <h4 class="text-right"><b>Waktu Server: {{date('d/m/Y | H:i:s')}}</b></h4>
@endsection
