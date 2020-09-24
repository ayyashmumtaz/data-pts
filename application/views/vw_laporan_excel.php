 <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
 
                <th>No</th>
 
                <th>Nama Siswa</th>
 
                <th>Kelas</th>
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($buku as $buku) { ?>
 
           <tr>
 
                <td><?php echo $buku->kdmobil; ?></td>
                <td><?php echo $buku->jenis; ?></td>
                <td><?php echo $buku->tahun; ?></td>
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>