<?= $this->extend('V_template')?>
<?= $this->section('content')?>
<table>
<tr>	

		<td>NIM :<?= $row->NIM ?></td>
        </tr>
        <tr>
        <td>Nama :<?= $row->Nama ?></td>
        </tr>
	    <tr>
        <td>Umur :<?= $row->Umur ?></td>
        </tr>
       
			
</table>


<?= $this->endSection()?>
