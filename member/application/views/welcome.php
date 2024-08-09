
 <div id="carouselExampleCaptions" class="carousel slide">

 
  <div class="carousel-inner">
  <?php foreach ($slider as $key => $value):
 ?>
    <div class="carousel-item <?php echo $key==0 ? "active" : "" ?>">
      <img src="<?php echo $this->config->item('url_slider').$value['foto_slider'] ?>" class="d-block w-100" >
      <div class="carousel-caption d-none d-md-block">
       <?php echo $value["caption_slider"] ?>
      </div>
    </div>
    <?php endforeach ?>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<section class="bg-white py-5">
  <div class="container">
    <h5 class="text-center mb-5">Kategori Produk</h5>
    <div class="row">
      <?php foreach ($kategori as $key => $value):
      ?>
      <div class="col-md-4 text-center">
        <a href="<?php echo base_url("kategori/detail/".$value["id_kategori"]) ?>" class="text-decoration-none">
        <img src="<?php echo $this->config->item("url_kategori").$value['foto_kategori']; ?>" class="w-50 rounded-circle">
        <h5 class="mt-3"><?php echo $value['nama_kategori'] ?></h5>
        </a>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</section>


<section class="bg-light py-5">
  <div class="container">
    <h5 class="text-center mb-5">Produk Terbaru</h5>
    <div class="row">
      <?php foreach ($produk as $key => $value): ?>
        <div class="col-md-3">
            <a href="<?php echo base_url("produk/detail/".$value["id_produk"]) ?>" class="text-decoration-none">
            <div class="card mb-3 border-0 shadow">
            <img src="<?php echo $this->config->item('url_produk').$value['foto_produk']; ?>">
            <div class="card-body text-center">
              <h6><?php echo $value['nama_produk']?></h6>
              <span>Rp. <?php echo number_format($value['harga_produk']) ?></span>
            </div>
          </div>
            </a>
        </div>
          <?php endforeach ?>
    </div>
  </div>
</section>

<section class="bg-white py-5">
  <div class="container">
    <h5 class="text-center mb-5">Artikel Terbaru</h5>
    <div class="row">
      <?php foreach ($artikel as $key => $value):
      ?>
      <div class="col-md-3">

        <img src="<?php echo $this->config->item("url_artikel").$value['foto_artikel']; ?>" class="w-100">
        <h6 class="mt-3"><?php echo $value['judul_artikel'] ?></h6>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</section>



  