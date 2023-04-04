<?= $this->extend('V_template')?>
<?= $this->section('content')?>

     
        <form  action="<?php echo base_url('/mahasiswa')?>" action="GET">
            <label for="cari">Search</label>
            <input type="text"  name="cari" width="200px">
            <button type="submit"  value="Cari"  class="btn btn-success">Submit</button>
    </form>
    <h1 >Tabel Data Mahasiswa</h1>
    <a  href="<?= base_url('/mahasiswa/create')?>" class="btn btn-outline-dark mt-3 mb-2" >+ Tambah Data Mahasiswa</a>

    <table class="table table-striped">
  <thead class="table-primary">
  <tr>
        <td>NIM</td>
        <td>Nama</td>
        <td>Umur</td>
        <td>Action</td>
    </tr>
  </thead >
  <tbody >
  <?php
    foreach ($data as $row) {
    // var_dump($user);
    ?>
    <tr>
        <td><?= $row->NIM ?></td>
        <td><?= $row->Nama ?></td>
        <td><?= $row->Umur ?></td>
        <td><a href="<?= base_url('/mahasiswa/detail').'/'.$row->NIM?>" class="btn btn-success">detail </a>
        <a href="<?= base_url('/mahasiswa/edit').'/'.$row->NIM?>" class="btn btn-info">edit </a></td>
    <?php   
    }
    ?>
  </tbody>
</table>

<?= $pager->links('mahasiswa', 'bootstrap_template') ?>
  
<?= $this->endSection('content')?>
   
   