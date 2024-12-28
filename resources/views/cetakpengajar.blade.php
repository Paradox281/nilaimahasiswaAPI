<h3><center>Laporan Data Pengajar</center></h3>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
  <tr>
    <th>No</th>
    <th>No. Induk Pengajar</th>
    <th>Username</th>
    <th>Nama Pengajar</th>
    <th>Pendidikan</th>
    <th>Alamat</th>
    <th>No. Hp</th>
  </tr>
  @foreach($pengajar as $p) 
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$p->nip}}</td>
    <td>{{$p->username}}</td>
    <td>{{$p->nm_pengajar}}</td>
    <td>{{$p->pendidikan}}</td>
    <td>{{$p->alamat_pengajar}}</td>
    <td>{{$p->no_hp_pengajar}}</td>
  </tr>
  @endforeach
</table>