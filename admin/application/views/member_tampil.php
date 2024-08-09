<div class="container">
    <h5 class="mt-5">Data Member</h5>
  
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Distrik</th>
                <th>Wa</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach ($member as $key => $value): ?>
            <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['nama_member']; ?></td>
                    <td><?php echo $value['email_member']; ?></td>
                    <td><?php echo $value['nama_distrik_member']; ?></td>
                    <td><?php echo $value['wa_member']; ?></td>
                    <td><a href="<?php echo base_url("member/detail/".$value['id_member']) ?>" class="btn btn-info">Detail</a></td>
                </tr>
                <?php endforeach ?> 
        </tbody>
    </table>

</div>