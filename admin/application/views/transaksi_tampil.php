<div class="container">
    <h5 class="mt-5">Data Transaksi</h5>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi as $key => $value): ?>  
                    <tr>
                        <td><?php echo $key+1 ?></td>
                        <td><?php echo $value['tanggal_transaksi']; ?></td>
                        <td><?php echo $value['total_transaksi']; ?></td>
                        <td><?php echo $value['status_transaksi']; ?></td>
                        <td><a href="<?php echo base_url('transaksi/detail/'.$value['id_transaksi']); ?>" class="btn btn-info">Details</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
        </table>
    
</div>