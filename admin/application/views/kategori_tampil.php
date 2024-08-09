
<div class="container">
    <h5 class="mt-5">Data Kategori</h5>

    <table class="table table-bordered " id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>foto</th>
                <th>opsi</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($kategori as $k => $v): ?>



             <tr>
                <td><?php echo $k+1; ?></td>
                <td><?php echo $v['nama_kategori']; ?></td>
                <td><img src="<?php echo $this->config->item('url_kategori').$v['foto_kategori'] ?>" width="200"</td>
                <td>
                    <a href="<?php echo base_url("kategori/edit/".$v["id_kategori"])?> " class="btn btn-warning">Edit</a>
                     <a href="<?php echo base_url("kategori/hapus/".$v["id_kategori"]) ?>" class="btn btn-danger">Hapus</a>
                </td>
             </tr>      

             <?php endforeach?>
        </tbody>

    </table>
    <a href="<?php echo base_url('kategori/tambah') ?>"  class="btn btn-primary">Tambah Data</a>
   </div>

