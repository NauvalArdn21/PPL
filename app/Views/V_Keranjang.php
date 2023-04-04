<link href="your-project-dir/icon-font/lineicons.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container mb-5">
    <div class ="row mt-5">


<?php
      $total = 0;
      $no = 0;
      foreach ($dataCart as $dataCart):?>
            <div class ="col-3">
            <div class= "card mt-4" style="min-height:380px;width: 14rem;">
                        <img src="<?= base_url('gambar'). '/' . $dataCart['gambar'] ?> " class="card img-top" alt="...." >                    <div class="col-md-8 text-start ">
                        <div class="card-body">
                        <div class = "d-flex justify-content-between">
                        <H5>Rp. <?= $dataCart['stok']?></h5>
                        <H10><?= $dataCart['harga']?> pcs</H10>
                        <?php $total += $dataCart['harga']*$dataCart['stok'];?>
                      </div>
                      <form action="<?php echo base_url('/keranjang/delete'). '/'. $no ?>" method="post">
                      <input type="hidden" name="_method" value="delete">
                      <button type="submit" class="btn btn-danger btn-sm text-center">hapus</a>
              </form>
                            
                    </div>
                </div>
            </div>
        </div>
        <?php
          $no += 1; 
          endforeach; ?>
        <br>
        <div class="row">
            <p class="col-md-10 mt-4 text-end fw-bold">Total Harga : </p>
            <p class="col-md-2  mt-4 text-start px-0 fw-bold">Rp <?=$total?></p>
        </div>
      </div>
      <div class="footer">
      <a href="<?= base_url('/toko')?>" class="btn btn-danger mt-3 mb-2" >Batal</a>
      <a href="<?= base_url('/checkout') ?>" class="btn btn-info">Checkout</a>
        
      </div>
    </div>
  </div>
</div>

