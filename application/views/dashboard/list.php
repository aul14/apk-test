<?php
$NIK        = $this->session->userdata('NIK');
$id_group = $this->session->userdata('id_group');
?>
<div class="page-header">
  <h1>
    Dashboard
  </h1>
</div><!-- /.page-header -->
<div class="alert alert-block alert-success">
  <button type="button" class="close" data-dismiss="alert">
    <i class="ace-icon fa fa-times"></i>
  </button>
  <i class="ace-icon fa fa-check green"></i>
  Selamat Datang <?php echo $this->session->userdata('username'); ?> :)
  <strong class="green">
  </strong>
</div>


</div>
</div>
</div>