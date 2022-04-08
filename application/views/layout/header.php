<div class="navbar-container" id="navbar-container">
  <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
    <span class="sr-only">Toggle sidebar</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <div class="navbar-header pull-left">
    <a href="<?php echo base_url('dashboard') ?>" class="navbar-brand">
      <small><img src="<?php echo base_url(); ?>assets/ico/icon3.png">Testing Aplikasi</small></a>
  </div>
  <?php
  //Data User
  $id_login       = $this->session->userdata('id');
  if ($id_login == 1) {
    $NIK = 'Admin';
  } else {
    $NIK            = $this->session->userdata('NIK');
  }
  $id_group       = $this->session->userdata('id_group');
  $url_sub        = 'sim';
  $akses_edit     = $this->role_model->view_submodule($id_group, $url_sub);

  ?>
  <div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav">


      <li class="light-blue">
        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
          <?php
          $baseurl = base_url();
          ?>

          <?= '<img src="' . $baseurl . '/assets/upload/foto/thumbs/foto.jpg" class="nav-user-photo">'; ?>


          <span class="user-info"><small>Selamat Datang</small><?php echo $this->session->userdata('username'); ?></span>
          <i class="ace-icon fa fa-caret-down"></i></a>
        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
          <li><a href="<?php echo base_url(); ?>ubah_password"><i class="ace-icon fa fa-cog"></i>Ubah Password</a></li>


          <li class="divider"></li>
          <li>
            <a href="<?php echo base_url('login/logout'); ?>">
              <i class="ace-icon fa fa-power-off"></i>Logout
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div><!-- /.navbar-container -->
</div>