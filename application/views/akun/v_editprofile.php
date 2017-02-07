<section id="page-breadcrumb">
  <div class="vertical-center sun">
    <div class="container">
      <div class="row">
        <div class="action">
          <div class="col-sm-12">
            <h1 class="title">Ubah Profil</h1>
            <p>Halaman Ubah Profil</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/#action-->
<section id="company-information" class="choose">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 wow fadeInLeft" data-wow-duration="700ms" data-wow-delay="300ms">
        <br><br><br>
        <div class="sidebar blog-sidebar" >
          
          <div class="sidebar-item categories">
            <h3>Profil Menu</h3>
            <ul class="nav navbar-stacked">
              <li><a href="<?php echo base_url() ?>akun/profile/detail/<?php echo $list->id_user ?>">Detail Profil</a></li>
              <li><a href="<?php echo base_url() ?>akun/profile/update_akun/<?php echo $list->id_user ?>">Ubah Akun</a></li>
              <li class="active"><a href="<?php echo base_url() ?>akun/profile/update_akun/<?php echo $list->id_user ?>">Ubah Profil</a></li>
<!--               <li><a href="<?php echo base_url() ?>akun/profile/update_foto/<?php echo $list->id_user ?>" data-toggle="modalakun" data-target="#edit">Ubah Foto Profil</a></li>
 -->              
            </div>
          </div>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-8 wow fadeInUp" data-wow-duration="900ms" data-wow-delay="100ms">
          
          
          <div class="project-name overflow">
            <center><h2 class="bold"><span style="color: #FA2600">Ubah Informasi Profil Anda</span></h2></center><hr>
            
          </div>
          <form method="post" action="<?php echo base_url(); ?>akun/profile/edit_profile/<?php echo $list->id_user; ?>">
            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                </div>
                
                <div class="box-body">
                  
                  <?php if($this->session->flashdata('telepon_konfirm')): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('telepon_konfirm'); ?>
                  </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('telepon')): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('telepon'); ?>
                  </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('message')): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info"></div>&nbsp;<?php echo $this->session->flashdata('message'); ?>
                  </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('warning')): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('warning'); ?>
                  </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('username')): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('username'); ?>
                  </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('username_konfirm')): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('username_konfirm'); ?>
                  </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('password')): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('password'); ?>
                  </div>
                  <?php endif; ?>
                  <br>
                  
                  
                  <div class="form-group">
                    <div class="col-lg-3">
                      <p>Nama :</p>
                    </div>
                    <div class="col-lg-9">
                      
                      <input type="text" name="nama" class="form-control" value="<?php echo $list->nama; ?>" required>
                      
                    </div><br>
                  </div><br>
                  
                  
                  <div class="form-group">
                    <div class="col-lg-3">
                      <p>Nomor Telepon :</p>
                    </div>
                    <div class="col-lg-9">
                      
                      <input type="number" name="telepon" class="form-control" value="<?php echo $list->telepon; ?>"required>
                    </div><br>
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
        
        
      </div>
    </div><br><br>
    <div class="modal fade" id="edit" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-controls-modal="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          
        </div>
      </div>
    </div>
  </section>
  <!--/#portfolio-information-->