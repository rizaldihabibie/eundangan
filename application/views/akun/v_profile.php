<section id="page-breadcrumb">
    <div class="vertical-center sun">
        <div class="container">
            <div class="row">
                <div class="action">
                    <div class="col-sm-12">
                        <h1 class="title">Informasi Profil</h1>
                        <p>Halaman Informasi Profil Akun</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#action-->
<section id="portfolio-information" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 wow fadeInUp" data-wow-duration="800ms" data-wow-delay="200ms">
                <!-- <div class="portfolio-single">
                    <div class="portfolio-thumb">
                        <img src="<?php echo base_url() ?>uploads/profil/<?php echo $list->picture; ?>" class="img-responsive" alt="User Image" width="300" height="350">
                    </div>
                    <div class="portfolio-view">
                        <ul class="nav nav-pills">
                            <li> <a href="<?php echo base_url() ?>uploads/profil/<?php echo $list->picture; ?>" class="img-responsive" alt="" data-lightbox="example-set"><i class="fa fa-lg fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <div class="col-sm-6 wow fadeInDown" data-wow-duration="800ms" data-wow-delay="200ms">
                <div class="project-name overflow">
                    <h2 class="bold"><?php echo $this->session->userdata('SESS_AKUN_NAMA_USER');?> </h2><hr>
                    
                </div>
                <div class="col-md-12">
                    <?php if (!isset($list)): ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="fa fa-info-circle"></div> Tidak Ada Data<br>
                    </div>
                    <?php else: ?>
                    <?php if($this->session->flashdata('message')):?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="fa fa-check"></div> <?php echo $this->session->flashdata('message'); ?><br>
                    </div><br>
                    <?php endif;?>
                </div>
                <div class="col-md-12">
                    <center><h4><p><span style="color: #FA2600">Profil</span></p></h4></center>
                </div>
                <div class="col-md-12">
                    
                    <div class="form-group">
                        <div class="col-lg-4">
                            <p>Nama :</p>
                        </div>
                        <div class="col-lg-8">
                            <?php echo $list->nama; ?>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <p>Nomor Telepon :</p>
                        </div>
                        <div class="col-lg-8">
                            <?php echo $list->telepon; ?>
                        </div>
                    </div><br>
                </div>
                <div class="col-md-12">
                    <center><h4><p><span style="color: #FA2600">Akun</span></p></h4></center>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <p>Username :</p>
                        </div>
                        <div class="col-lg-8">
                            <?php echo $list->username; ?>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <p>Password :</p>
                        </div>
                        <div class="col-lg-8">
                            ******
                        </div>
                    </div><br>
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="live-preview">
                        <ul class="nav navbar-nav navbar-default">
                            <a href="<?php echo base_url() ?>akun/profile/update_akun/<?php echo $list->id_user ?>" class="btn btn-md btn-info"><i class="fa fa-gear"></i> Ubah Akun</a>&nbsp;&nbsp;
                            <a href="<?php echo base_url() ?>akun/profile/update_profile/<?php echo $list->id_user ?>" class="btn btn-md btn-info"><i class="fa fa-user"></i> Ubah Profil</a>&nbsp;&nbsp;
<!--                             <a href="<?php echo base_url() ?>guru/profile/update_foto/<?php echo $list->id_user ?>" class="btn btn-md btn-info" data-toggle="modalguru" data-target="#edit"><div class="fa fa-file-image-o"></div> Unggah Foto Profil</a>
 -->                        </ul>
                        
                    </div>
                </div>
                <!-- /.col -->
                <?php endif;?>
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