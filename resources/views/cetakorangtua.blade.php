<h3><center>Laporan Data Orang Tua</center></h3>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
  <tr>
    <th>No</th>
    <th>Nama Orang Tua</th>
    <th>Username</th>
    <th>Alamat</th>
    <th>No. Hp</th>
  </tr>
  @foreach($orangtua as $ortu) 
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$ortu->nm_orang_tua}}</td>
    <td>{{$ortu->username}}</td>
    <td>{{$ortu->alamat_orang_tua}}</td>
    <td>{{$ortu->no_hp_orang_tua}}</td>
  </tr>
  @endforeach
</table>