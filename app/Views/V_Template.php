
<html>
  <HEAD>
  <link href="your-project-dir/icon-font/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </HEAD>
  <Body>
  <table class="table table-striped">
  <tr>
  <td colspan="7" align="center">
     <h1>Header </h1>
  </td>
  </tr>
  <tr>
    <td> <a class="btn btn-outline-dark"href="<?=base_url('/home')?>">Home</a></td>
    <td> <a class="btn btn-outline-dark"href="<?=base_url('/info')?>">Info</a></td>
    <td> <a class="btn btn-outline-dark"href="<?=base_url('/mahasiswa')?>">Mahasiswa</a></td>
    <td> <a class="btn btn-outline-dark"href="<?=base_url('/pegawai')?>">Pegawai</a></td>
    <td> <a class="btn btn-outline-dark"href="<?=base_url('/toko')?>">Toko</a></td>
    <td ><a class="btn btn-outline-dark"href="<?=base_url('/logout')?>">Log Out</a></td>
    
  </tr>
  <tr>
    <td colspan = "7"><?=$this->renderSection('content')?></td>
  </tr>
  <tr>
  <td colspan="7" align="center">
     <h1>footer </h1>
  </td>
  
  </tr>
</table>
  </Body>

</html>