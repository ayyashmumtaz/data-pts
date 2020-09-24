<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<?php
				if(isset($_SESSION['hapus_sukses']) || isset($_SESSION['update_sukses'])) :
					$notif = '';

					isset($_SESSION['hapus_sukses']) ? $notif .= $_SESSION['hapus_sukses'] : '';
					isset($_SESSION['update_sukses']) ? $notif .= $_SESSION['update_sukses'] : '';
			?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  	<strong>Sukses!</strong> <?php echo $notif; ?>
					</div>
			<?php
				endif;
			?>

			<div class="panel panel-primary">
				<div class="panel-heading">Data Siswa PTS</div>
				<div class="panel-body">
					<div class="col-md-12" style="padding-bottom: 15px;">
						<a href="<?php echo base_url('home/formtambah'); ?>">
							<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
							</a>							<a class="btn btn-success" href="<?php echo base_url('home/export_excel'); ?>">Export Excel</a> 

							<form action="<?php echo base_url('home/cari'); ?>" method="post">
							<button style="float: right;" class="btn btn-warning" href="">Cari</button><input style=" float: right; width: 20%" class="form-control" type="date" placeholder="Search" name="date" aria-label="Search" required="">
						</form>
					</div>
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										
										<th>No</th>
										<th>Tanggal Pengisian</th>
										<th>Nama Siswa</th>
										<th>Kelas</th>
										<th>Aksi</th>
									</tr>
								</thead>
								
								<tbody>
									<?php
										
										foreach($database as $db) : ?>
											<tr>
											
												<td><?php echo $db->kdmobil; ?></td>
												<td><?= $db->tgl_daftar;?></td>
												<td><?php echo $db->jenis; ?></td>
												<td><?php echo $db->tahun; ?></td>
											
												<td>
													<a href="<?php echo base_url('home/formedit/'.$db->kdmobil); ?>"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button></a>
													<a href="<?php echo base_url('home/hapusdata/'.$db->kdmobil); ?>" onclick="return confirm('Anda yakin hapus ?')"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Hapus</button></a>
												</td>
											</tr>
									<?php
									
										endforeach;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	/*print_r($database);

	echo "<br> <br>";

	foreach ($database as $key => $value)
	{
		echo $key;
		echo $value->kdmobil;
	}

	echo "<br> <br>";

	$lol = 	[
			[
				'nama' => 'ardi',
				'kelas' => '2'
			],
			[
				'nama' => 'nesia',
				'kelas' => '3'
			]
			];

	print_r($lol);

	echo $lol['0']['nama'];

	echo "<br> <br>";

	foreach ($lol as $key => $value) 
	{
		echo $value['nama'];
	}

	echo "<br> <br>";

	$lol = 	['nama' => 'ardi', 'kelas' => '2'];

	foreach ($lol as $key => $value) 
	{
		echo $key;
		echo $value;
	} */
?> 
