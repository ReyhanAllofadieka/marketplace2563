<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h5>Detail Member</h5>
            <table class="table table-bordered">
                <tr>
                    <td>email_member</td>
                    <td><?php echo $member['email_member'] ?></td>
                </tr>
                <tr>
                    <td>nama_member</td>
                    <td><?php echo $member['nama_member'] ?></td>
                </tr>
                <tr>
                    <td>alamat_member</td>
                    <td><?php echo $member['alamat_member'] ?></td>
                </tr>
                <tr>
                    <td>wa_member</td>
                    <td><?php echo $member['wa_member'] ?></td>
                </tr>
                <tr>
                    <td>kode_distrik_member</td>
                    <td><?php echo $member['kode_distrik_member'] ?></td>
                </tr>
                <tr>
                    <td>nama_distrik_member</td>
                    <td><?php echo $member['nama_distrik_member'] ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-8">
            <h5>Transaksi Jual</h5>
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
                <?php foreach ($jual as $key => $value): ?>  
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
            <h5>Transaksi Beli</h5>
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
                <?php foreach ($beli as $key => $value): ?>  
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
    </div>
</div>