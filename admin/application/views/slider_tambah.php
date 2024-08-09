<div class="container">
    <h5 class="mt-5">Tambah slider</h5>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3 " >
            <label>Caption slider</label>
            <textarea name="caption_slider" id="editorku" class="form-control"><?php echo set_value('caption_slider') ?></textarea>
            <span class="small text-danger">
                <?php echo form_error("caption_slider") ?>
            </span>
        </div>
        <div class="mb-3 " >
            <label>Foto slider</label>
            <input type="file" name="foto_slider" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        </form> 
</div>