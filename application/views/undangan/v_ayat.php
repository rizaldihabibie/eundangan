<section id="page-breadcrumb">
  <div class="vertical-center sun">
    <div class="container">
      <div class="row">
        <div class="action">
          <div class="col-sm-8">
            <h1 class="title">Data Mempelai</h1>
            <p>Halaman Kelola Data Mempelai</p>
          </div>
           
        </div>
      </div>
    </div>
  </div>
</section>
<!--/#action-->
<section class="content">
  <div class="container">
    <div class="row">
      <br><br>
      <div >
        
        
      </div>
      <div class="col-sm-3 wow fadeInRight" data-wow-duration="700ms" data-wow-delay="300ms">
        <br>
        <div class="sidebar blog-sidebar" >
          <div class="sidebar-item categories">
            <h3>Menu</h3>
            <ul class="nav navbar-stacked">
              <li><a href="<?php echo base_url() ?>undangan/link">Link undangan</a></li>
              <li><a href="<?php echo base_url() ?>undangan/data_mempelai">Data Mempelai</a></li>
              <li><a href="<?php echo base_url() ?>undangan/acara">Acara</a></li>
              <li class="active"><a href="<?php echo base_url() ?>undangan/ayat">Kata kata ayat</a></li>
              <li><a href="#">Love Stories</a></li>
              <li><a href="#">Album foto</a></li>
              <li><a href="#">Slide show</a></li>
              <li><a href="#">Lagu</a></li>
              <li><a href="#">Video</a></li>
              <li><a href="#">Tema</a></li>
              <li><a href="#">Preview Undangan</a></li>
              <li><a href="#">Publish dan sebarkan</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-1"></div>
      <div class="col-sm-8 wow fadeInLeft" data-wow-duration="900ms" data-wow-delay="100ms">
          <div class="project-name overflow">
            <center><h3 class="bold"><span style="color: #FA2600">Data Acara Pernikahan</span></h3></center><hr>
            
          </div>
          <form method="post" action="<?php echo base_url(); ?>undangan/ayat/saveAyat">
            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                </div>
                
                <div class="box-body">
                  
                  <?php if($this->session->flashdata('success')): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('success'); ?>
                  </div>
                  <?php endif; ?>
                  <br>
                  <?php if($this->session->flashdata('isi_ayat')): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('isi_ayat'); ?>
                  </div>
                  <?php endif; ?>
                  <br>
                  <?php if($this->session->flashdata('nama_ayat')): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('nama_ayat'); ?>
                  </div>
                  <?php endif; ?>
                  <br>
                  
                  <h4>UNDANGAN</h4><hr>
                  <div class="form-group">
                    <div class="col-lg-3">
                      <p>Nama Ayat :</p>
                    </div>
                    <div class="col-lg-9">
                        
                      <input type="text" name="nama_ayat" id="nama_ayat" class="form-control" required>
                      
                    </div><br>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-3">
                      <p>Isi Ayat :</p>
                    </div>
                    <div class="col-lg-9">
                      
                      <textarea class="form-control" rows="3" name="isi_ayat" required></textarea>
                      
                    </div><br>    
                    <br>              
                </div>
                <!-- /.box-body --><br>
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><div class="fa fa-save"> Simpan</div></button>
                  </div>
                </div>
                <div class="col-lg-2"></div>
              </div>
            </div>
          </form>
      </div>
      
      <br>
      
    </div>
    <br>
  </div>
</section>
