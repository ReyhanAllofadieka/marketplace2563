
  <div class="container mt-5">
    <h5>Ubah Akun Anda</h5>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="post">
                <div class="mb-3">
                    
            <label>Email Anda</label>
            <Input type="text" name="email_member" class="form-control" value="<?php echo set_value("email_member",$this->session->userdata("email_member")) ?>"></Input>
                <span class="text-danger small">
                    <?php echo form_error("email_member") ?>
                </span>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="text" name="password_member" class="form-control">
                    <p class="text-muted">Kosongkan jika password tidak diubah</p>
                </div>
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_member" class="form-control" value="<?php echo set_value("nama_member", $this->session->userdata('nama_member') )?>">
                    <span class="text-danger small">
                    <?php echo form_error("nama_member") ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat_member" class="form-control" value="<?php echo set_value("alamat_member", $this->session->userdata('alamat_member') )?>">
                    <span class="text-danger small">
                    <?php echo form_error("alamat_member") ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label>WA</label>
                    <input type="text" name="wa_member" class="form-control" value="<?php echo set_value("wa_member", $this->session->userdata('wa_member') )?>">
                    <span class="text-danger small">
                    <?php echo form_error("wa_member") ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label>kota/kabupaten</label>
                    <select class="firm-control form-select" name="kode_distrik_member">
                        <option value="">Pilih</option>
                        <?php foreach ($distrik as $key => $value): ?>
                            <option value="<?php echo $value["city_id"] ?>" 
                            <?php echo $value['city_id']==set_value('city_id',$this->session->userdata('kode_distrik_member')) ? "selected" : "" ?> >
                                <?php echo $value['type'] ?>
                                <?php echo $value['city_name'] ?>
                                <?php echo $value['province'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-muted"><?php echo form_error('city_id') ?></span>
                </div>
                <button class="btn btn-primary">Ubah Akun</button>
            </form>
        </div>
    </div>
  </div>