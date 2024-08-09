<div class="container">
    <h5 class="mt-5">Produk Jual <?php echo $this->session->userdata('nama_member');?></h5>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Berat</th>
                <th>Foto</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produk as $key => $value): ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value['nama_produk'] ?></td>
                <td><?php echo $value['harga_produk']?></td>
                <td><?php echo $value['berat_produk']?></td>
                <td><img src="<?php echo $this->config->item('url_produk').$value['foto_produk'] ?>" width="200"></td>
                <td>
                    <a href="<?php echo base_url("seller/produk/edit/".$value['id_produk']) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?php echo base_url('seller/produk/hapus/'.$value['id_produk']) ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="<?php echo base_url('seller/produk/tambah') ?> " class="btn btn-primary">Tambah</a>

</div>