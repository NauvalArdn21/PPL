<?= $this->extend('V_template')?>
<?= $this->section('content')?>
<h4>Selamat Datang <?php echo $_SESSION['username']?></h4>
<?= $this->endSection('content')?>