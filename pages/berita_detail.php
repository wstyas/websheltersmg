<?php
   $id_berita = $_GET['id_berita'];
    $queryProduct = "SELECT * FROM berita  WHERE id_berita = " . $_GET['id_berita'] . " ORDER BY id_berita DESC LIMIT 1";
    $rsProduct = mysqli_query($konek, $queryProduct);
    $row = mysqli_fetch_assoc($rsProduct);
  //  $queryKomentar = "SELECT * FROM tb_komentar WHERE id_buku=$id_buku ORDER BY id_komentar DESC";
   // $rsKomentar = mysqli_query($konek, $queryKomentar);
?>
<!-- Breadcrumbs -->
    <div class="container">
      <ol class="breadcrumb">
        <li>
          <a href="index.php">Beranda</a>
        </li>
        <li>
          <a href="?p=berita&halaman=1">Berita</a>
        </li>
        <li class="active">
          <?php echo $row['judul_berita']; ?>
        </li>
      </ol> <!-- end breadcrumbs -->
    </div>

    <!-- Single Product -->
    <section class="section-wrap single-product">
      <div class="container relative">
        <div class="row">

          <div class="col-sm-6 col-xs-12 mb-60">

            <div class="flickity  mfp-hover" id="gallery-main">

              <div class="gallery-cell">
                <a href="admins/uploads/berita/<?php echo $row['foto']; ?>" class="lightbox-img">
                  <img src="admins/uploads/berita/<?php echo $row['foto']; ?>" alt="" />
                </a>
              </div>
              
            </div> <!-- end gallery main -->

          </div> <!-- end col img slider -->

          <div class="col-sm-6 col-xs-12 product-description-wrap">
            <h1 class="product-title"><?php echo $row['judul_berita']; ?></h1>
            <p class="product-title"><?php echo $row['tanggal']; ?></p>

            <div class="product_meta">
                <!-- tabs -->
                <div class="row">
                <div class="col-md-12">
                    <div class="tabs tabs-bb">
                    <ul class="nav nav-tabs">                                 
                        <li class="active">
                        <a href="#tab-description" data-toggle="tab"></a>
                        </li>                                                                
                    </ul> <!-- end tabs -->
                    
                    <!-- tab content -->
                    <div class="tab-content">
                        
                        <div class="tab-pane fade in active" id="tab-description">
                        <p align="justify">
                            <?php echo htmlspecialchars_decode(stripcslashes($row['isi_berita'])); ?>
                        </p>
                        </div>
                    
                        
                    </div> <!-- end tab content -->

                    </div>
                </div> <!-- end tabs -->
                </div> <!-- end row -->
            </div>

          </div> <!-- end col product description -->
        </div> <!-- end row -->


        
      </div> <!-- end container -->
    </section> <!-- end single product -->