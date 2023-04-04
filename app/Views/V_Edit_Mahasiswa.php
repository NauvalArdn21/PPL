<?= $this->extend('V_template')?>
<?= $this->section('content')?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<a href="<?= base_url('/mahasiswa')?>">Kembali</a>
	<h3>EDIT DATA MAHASISWA</h3>
	<form method="post" action="<?= base_url('/mahasiswa/update')?>">
		<table>
			<tr>			
				<td>Nama</td>
				<td><input type="text" name="Nama" value="<?= $data->Nama ?>" ></td>
			</tr>
			<tr>
				<td>NIM</td>
                <td><input type="number" value="<?= $data->NIM ?>" disabled></td>
                <td><input type="hidden" name="NIM" value="<?= $data->NIM ?>" ></td>
			</tr>
			<tr>
				<td>Umur</td>
				<td><input type="number" name="Umur" value="<?= $data->Umur ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>
<?= $this->endSection('content')?>