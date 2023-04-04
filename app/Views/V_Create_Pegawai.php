<?= $this->extend('V_template')?>
<?= $this->section('content')?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php $validation = \Config\Services::validation();
helper('form'); ?>
	<a href="<?= base_url('/pegawai')?>">Kembali</a>
	<h3>TAMBAH DATA PEGAWAI</h3>
	<form method="post" action="<?= base_url('/pegawai/save')?>">
		<table>
			<tr>			
				<td>Nama</td>
				<td><input type="text" name="Nama" value="<?= set_value('Nama')?>" ></td>
				</tr>
				<tr>
					<td>

					</td>
				<td>
				<?php if($validation->getError('Nama')) {?>
                <?= $error = $validation->getError('Nama'); ?>
        		<?php }?>
				</td>
			</tr>
			<tr>
				<td>NIM</td>
				<td><input type="number" name="NIM" value="<?= set_value('email')?>"></td>
				</tr>
			<tr>
					<td>
					</td>
				<td>
				<?php if($validation->getError('NIM')) {?>
              	<?= $error = $validation->getError('NIM'); ?>
       			 <?php }?>
				</td>

	
				
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<input type="radio" name="Gender" value="Laki-laki"<?php if(set_value('Gender')=='laki-laki'){?> checked <?php } ?>>
					<label for="">Laki-Laki</label>
					<input type="radio" name="Gender" value="perempuan"<?php if(set_value('Gender')=='perempuan'){ ?> checked <?php } ?>>
					<label for="">Perempuan</label>
				</td> 
				</tr>
				<tr>
				<td></td>
				<td>
				<?php if($validation->getError('Gender')) {?>
            	  <?= $error = $validation->getError('Gender'); ?>
       			 <?php }?>
				</td>
				
			</tr>
            <tr>
				<td>no Telepon</td>
				<td><input type="number" name="no_telp" value="<?= set_value('no_telp')?>"></td>
				</tr>
				<tr>
					<td></td>
				<td>
				<?php if($validation->getError('no_telp')) {?>
	            <?= $error = $validation->getError('no_telp'); ?>
       			 <?php }?>
				</td>
				
			</tr>
            <tr>
				<td>email</td>
				<td><input type="text" name="email"value="<?= set_value('email')?>"></td>
				</tr>
				<tr>
				<td></td>
				<td>

				<?php if($validation->getError('email')) {?>
             	<?= $error = $validation->getError('email'); ?>
        		<?php }?>
				</td>
			</tr>
            <tr>
            <td> <label for="pendidikan">Pendidikan:</label></td>
            <td><select name="pendidikan" id="pendidikan">
                <option value="">--- Choose a pendidikan ---</option>
                <option value="SD" <?php if(set_value('pendidikan')=='SD'){?> selected <?php }?> >SD</option>
                <option value="SMP"<?php if(set_value('pendidikan')=='SMP'){?> selected <?php }?> >SMP</option>
                <option value="SMA"<?php if(set_value('pendidikan')=='SMA'){?> selected <?php }?> >SMA</option>
            </select>   
		</td>
		</tr>
		<tr>
		<td></td>
		<td>
		<?php if($validation->getError('pendidikan')) {?>
              <?= $error = $validation->getError('pendidikan'); ?>
        <?php }?>
			
		</td>
			
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>
<?= $this->endSection('content')?>