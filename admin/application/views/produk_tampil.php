
<div class="container">
    <h5 class="mt-5">Data Produk</h5>

    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>opsi</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($produk as $key => $value): ?>
             <tr>
                <td><?php $key+1 ?></td>
                <td><?php echo $value['nama_produk']; ?></td>
                <td><?php echo $value['harga_produk']; ?></td>
                <td>
                    <img src="<?php echo $this->config->item('url_produk').$value['foto_produk'] ?>" width="200" >
                </td>
                <td><a href="" class="btn btn-info">Detail</a></td>
             </tr>      
                <?php endforeach ?>
        </tbody>

    </table>
    
   </div>

