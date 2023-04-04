<?= $this->extend('V_template')?>
<?= $this->section('content')?>

<div class ="container mb-5">
    <h2 class="text-center mt-4">Toko Online Screamous</h2>
    <a  href="<?= base_url('/keranjang/list')?>" class="btn btn-outline-dark mt-3 mb-2" >keranjang</a>
    <div class ="row">
        <?php foreach ($toko as $tk)  : ?>
        <div class ="col-3">
            <div class= "card mt-4" style="min-height:380px;width: 14rem;">
            <img src="<?= base_url('gambar'). '/' . $tk->gambar ?> " class="card img-top" alt="...." >
            <div class="card-body">
                <h5 class ="card-text"><?= $tk->nama?></h5>
                <div class = "d-flex justify-content-between">
                    <H5>Rp. <?= $tk->harga?></h5>
                    
                    <H10><?= $tk->stok?> pcs</H10>
                    
                </div>
                <form method="post" action="<?php echo base_url('/keranjang') ?>">
                  <input type="hidden" name="kode" value="<?= $tk->kode ?>">
                  <button type="submit" class="btn btn-outline-dark btn-sm text-center">Add</a>
                </form>
            </div>
        </div>

    </div>
    <?php endforeach; ?>
</div>
</div>

<style>
    .card {
        border-radius:20px;
        box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
     
    }
    
</style>
<?= $this->endSection('content')?>
