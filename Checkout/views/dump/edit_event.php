<!DOCTYPE html>
<html lang="en">

<head>
  
  <?php $this->load->view("keuangan/_partials/head.php")?>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <?php $this->load->view("keuangan/_partials/navbar.php")?>
      
    </header>
    <!--header end-->
    
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php $this->load->view("keuangan/_partials/sidebar.php")?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>USER VISITS</h3>
            </div>
             <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Pemasukan</h4>
              <div class="card-body">



<!--                 <form action="<?php //base_url('event/add') ?>" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="nama">Name</label>
                <input class="form-control <?php //echo form_error('nama') ? 'is-invalid':'' ?>"
                 type="text" name="nama" placeholder="Masukan Nama" />
                <div class="invalid-feedback">
                  <?php //echo form_error('nama') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input class="form-control <?php //echo form_error('keterangan') ? 'is-invalid':'' ?>"
                 type="text" name="keterangan" min="0" placeholder="Keterangan" />
                <div class="invalid-feedback">
                  <?php //echo form_error('keterangan') ?>
                </div>
              </div>

              <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>  
 -->


<form action="" method="POST" enctype="multipart/form-data" >

            <div class="form-group">
                <input class="form-control <?php echo form_error('id') ? 'is-invalid':'' ?>"
                 type="hidden" name="id"  />
                <div class="invalid-feedback">
                  <?php echo form_error('id') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">Id Member</label>
                <input class="form-control <?php echo form_error('id_member') ? 'is-invalid':'' ?>"
                 type="text" name="id_member" placeholder="id_member" value="<?php echo $event_keluar->id_member ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('id_member') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">Keterangan</label>
                <input class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
                 type="text" name="keterangan" placeholder="keterangan" value="<?php echo $event_keluar->keterangan ?>"/>
                <div class="invalid-feedback">
                  <?php echo form_error('keterangan') ?>
                </div>
              </div>

             <div class="form-group">
                <label for="ttl">Nominal</label>
                <input class="form-control <?php echo form_error('nominal') ? 'is-invalid':'' ?>"
                 type="text" name="nominal" min="0" placeholder="nominal" value="<?php echo $event_keluar->nominal ?>"/>
                <div class="invalid-feedback">
                  <?php echo form_error('nominal') ?>
                </div>
              </div> 

              <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>



             
            </div>
          </div>
          <!-- /col-md-12 -->
        </div>
            <!-- /form-panel -->
          </div>
            <!--custom chart end-->
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <div class="col-md-4 col-sm-4 mb">
                
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT

              *********************************************************************************************************************************************************** -->

         
        <!-- /row -->
        <?php $this->load->view("keuangan/_partials/rightsidebar.php")?>
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
        <?php $this->load->view("keuangan/_partials/footer.php")?>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <?php $this->load->view("keuangan/_partials/modal.php") ?>
      <?php $this->load->view("keuangan/_partials/js.php")?>

      <script>
function deleteConfirm(url){
  $('#btn-delete').attr('href', url);
  $('#deleteModal').modal();
}
</script>
</body>


</html>
