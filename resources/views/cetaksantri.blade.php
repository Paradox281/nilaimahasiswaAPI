<h3><center>Laporan Data Siswa</center></h3>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
  <tr>
    <th>No</th>
    <th>No. Induk Siswa</th>
    <th>Nama Siswa</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Alamat</th>
    <th>No. Hp</th>
    <th>Orang Tua/Wali</th>
  </tr>
  @foreach($santri as $s) 
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$s->nis}}</td>
    <td>{{$s->nm_santri}}</td>
    <td>{{$s->tmp_lahir}}</td>
    <td>{{$s->tgl_lahir}}</td>
    <td>{{$s->alamat}}</td>
    <td>{{$s->no_hp}}</td>
    <td>{{$s->nm_orang_tua}}</td>
  </tr>
  @endforeach
</table>