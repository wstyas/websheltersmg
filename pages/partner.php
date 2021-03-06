    <!-- Catalogue -->
    <section class="section-wrap pt-70 pb-40 catalogue">
      <div class="container relative">
        <div class="row">

          <div class="col-md catalogue-col right mb-10">
           

              <div class="row row-10">
              <?php
                $bukuAll = "SELECT id_partner FROM partner";
                $rsBukuAll = mysqli->query($konek, $bukuAll);
                $halaman = 6;
                $page = get('halaman') ? (int)get('halaman') : 1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                if(get('id_partner')){
                    $id_foto = get('id_partner');
                    $result = mysqli->query($konek,"SELECT * FROM partner");
                } else 
                    $result = mysqli->query($konek,"SELECT * FROM partner");
                $total = mysqli->num_rows($result);
                $pages = ceil($total/$halaman);
                if(get('id_partner')){
                    $buku = "SELECT id_partner, nama_partner, foto FROM partner ORDER BY id_partner DESC LIMIT $mulai, $halaman";
                }
                else    
                    $buku = "SELECT id_partner, nama_partner, foto FROM partner ORDER BY id_partner DESC LIMIT $mulai, $halaman";
                $rs = mysqli->query($konek, $buku);
                $no =$mulai+1;
                $data = mysqli->num_rows($rs);
                if($data==0){
              ?>
              <div class="col-md-12 col-xs-12">
                    <div class="product-item text-center">
                        <h1>Maaf, data terkait masih kosong!</h1>
                    </div>
              </div>
              <?php   
                } else {
                    while($row=mysqli->fetch_assoc($rs)){
              ?>
                    <div class="col-md-4 col-xs-12">
                    <div class="product-item">
                        <div class="product-img">
                        <a href="#">
                            <img src="admins/uploads/partner/<?php $this($row->$foto); ?>" alt="" style="height:350px; width: auto;">
                            <img src="admins/uploads/partner/<?php $this($row->$foto); ?>" alt="" class="back-img">
                        </a>
                        </div>
                             <div class="product-details">
                        <h3 title="<?php $row->$nama_partner; ?>" class="product-title" href="?p=partner_detail&id_partner=<?php $this($row->$id_partner); ?>"><b><?php $this(substr($row->$nama_partner, 0, 35)); if(strlen($row->$nama_partner)>35) $this("...") ?></b>
                        </h3>
                        </div>
                    </div>
                    </div>
                <?php } } ?>
              </div> <!-- end row -->
            <div class="clear"></div>
           
            <!-- Pagination -->
            <?php 
                if($data!=0){ 
            ?>
            <div class="pagination-wrap">           
              <nav class="pagination right clear">
                <?php if(get('id_partner')) { if($page == 1) $this(""); else {?>
                    <a href="?p=partner&id_partner=<?php $this(get('id_partner')); ?>&halaman=1"><i class="fa fa-angle-double-left"></i></a>
                    <a href="?p=partner&id_partner=<?php $this(get('id_partner')); ?>&halaman=<?php $this(get('halaman')-1); ?>"><i class="fa fa-angle-left"></i></a>
                <?php } } else { if($page == 1) $this(""); else {?>
                    <a href="?p=partner&halaman=1"><i class="fa fa-angle-double-left"></i></a>
                    <a href="?p=partner&halaman=<?php $this(get('halaman')-1); ?>"><i class="fa fa-angle-left"></i></a>
                <?php 
                    } }
                    if(get('id_partner')){ 
                        for ($i=1; $i<=$pages ; $i++){
                ?>
                    <a href="?p=partner&id_partner=<?php $this(get('id_partner')); ?>&halaman=<?php $this($i); ?>" class="<?php if($i==$page) $this('page-numbers current'); ?>"><?php $this($i); ?></a>
                <?php } } else { 
                    for ($i=1; $i<=$pages ; $i++){
                ?>
                    <a href="?p=partner&halaman=<?php  $this($i); ?>" class="<?php if($i==$page) $this('page-numbers current'); ?>"><?php $this($i); ?></a>
                <?php } } ?>

                <?php if(isset(get('id_partner'))) { if($page == $pages) $this(""); else {?>
                    <a href="?p=partner&id_partner=<?php $this(get('id_partner')); ?>&halaman=<?php $this(get('halaman')+1); ?>"><i class="fa fa-angle-right"></i></a>
                    <a href="?p=partner&id_partner<?php $this(get('id_partner')); ?>&halaman=<?php $this($pages); ?>"><i class="fa fa-angle-double-right"></i></a>
                <?php } } else { if($page == $pages) $this(""); else {?>
                    <a href="?p=partner&halaman=<?php $this(get('halaman')+1); ?>"><i class="fa fa-angle-right"></i></a>
                    <a href="?p=partner&halaman=<?php $this($pages); ?>"><i class="fa fa-angle-double-right"></i></a>
                <?php } } ?>
              </nav>
            </div>
            <?php } ?>

          </div> <!-- end col -->

        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> <!-- end catalogue -->