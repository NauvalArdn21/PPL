<?= $this->extend('V_template')?>
<?= $this->section('content')?>
<main role="main" class="container-fluid">
        <h1>Data Pegawai</h1>
        <a href="<?= base_url('/pegawai/create')?>">+ Tambah Data pegawai </a>
        <form  action="<?php echo base_url('/pegawai')?>" action="GET">
          <div class="mb-3">
            <label for="cari">Search</label>
            <input type="text"  name="cari">
            <button type="submit"  value="Cari">Submit</button>
          </div>
    </form>
    <table border="2">
    <tr>
        <td>NIM</td>
        <td>Nama</td>
        <td>Gender</td>
        <td>No Telepon</td>
        <td>Email</td>
        <td>Pendidikan</td>
    </tr>
    
    <?php
    foreach ($data as $row) {
    // var_dump($user);
    ?>
    <tr>
        <td><?= $row->NIM ?></td>
        <td><?= $row->Nama ?></td>
        <td><?= $row->Gender ?></td>
        <td><?= $row->no_telp ?></td>
        <td><?= $row->email ?></td>
        <td><?= $row->pendidikan ?></td>
      
    <?php   
    }
    ?>
    </table>
<?= $this->endSection('content')?>
   
   