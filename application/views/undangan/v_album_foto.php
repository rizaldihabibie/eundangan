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
              <li><a href="<?php echo base_url() ?>undangan/ayat">Kata kata ayat</a></li>
              <li><a href="#">Love Stories</a></li>
              <li class="active"><a href="<?php echo base_url() ?>undangan/foto">Album foto</a></li>
              <li><a href="<?php echo base_url() ?>undangan/album_foto">Slide show</a></li>
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
          <!-- <form method="post" action="<?php echo base_url(); ?>undangan/foto/do_upload"> -->
          <?php echo form_open_multipart('undangan/foto/do_upload');?>
            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                </div>
                
                <div class="box-body">
                  <?php if($this->session->flashdata('success')): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('success'); ?>
                  </div>
                  <?php endif; ?>
                  <br>
                  <?php if($this->session->flashdata('error')): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('error'); ?>
                  </div>
                  <?php endif; ?>
                  <br>
                  
                  <h4>UNDANGAN</h4><hr>
                  <div class="form-group">
                    <div class="col-lg-3">
                      <p>Foto :</p>
                    </div>
                    <div class="col-lg-6">
                      <input type="file" name="foto1" class="form-control" required>
                    </div><br>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                      <input type="file" name="foto2" class="form-control" required>
                    </div><br>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                      <input type="file" name="foto3" class="form-control" required>
                    </div><br>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                      <input type="file" name="foto4" class="form-control" required>
                    </div><br>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                      <input type="file" name="foto5" class="form-control" required>
                    </div><br>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                      <input type="file" name="foto6" class="form-control" required>
                    </div><br>
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
