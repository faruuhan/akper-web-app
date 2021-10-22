<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from shreyu.coderthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jan 2020 11:34:13 GMT -->
<head>
  <meta charset="utf-8" />
  <title>AKPER | <?= $title_tab; ?> </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <!-- App favicon -->
  <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico"> -->

  <!-- plugins -->
  <link href="<?php echo base_url(); ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

  
  <!-- plugin table css -->
  <link href="<?php echo base_url(); ?>assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

  <!-- App js -->
  <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
  
  

</head>

<body>
  <!-- Begin page -->
  <div id="wrapper">
    <?php $this->load->view('menu'); ?>
  
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
      <?php $this->load->view($page); ?>
      
      <!-- Footer Start -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                2019 &copy; Shreyu. All Rights Reserved. Crafted with <i class='uil uil-heart text-danger font-size-12'></i> by <a href="https://coderthemes.com/" target="_blank">Coderthemes</a>
            </div>
          </div>
        </div>
      </footer>
      <!-- end Footer -->
    </div>
  </div>
  <!-- END wrapper -->


  <!-- Vendor js -->
  <script src="<?php echo base_url(); ?>assets/js/vendor.min.js"></script>

  
  <!-- datatable js -->
  <script src="<?php echo base_url(); ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/datatables/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/libs/datatables/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/datatables/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/datatables/buttons.html5.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/datatables/buttons.flash.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/datatables/buttons.print.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/libs/datatables/dataTables.keyTable.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/datatables/dataTables.select.min.js"></script>

  <!-- Datatables init -->
  <script src="<?php echo base_url(); ?>assets/js/pages/datatables.init.js"></script>
  
  <!-- Plugins js -->
  <script src="<?php echo base_url(); ?>assets/libs/select2/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/multiselect/jquery.multi-select.js"></script>

  <!-- Init js-->
  <script src="<?php echo base_url(); ?>assets/js/pages/form-advanced.init.js"></script>

  <!-- App js -->
  <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>

  <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    });
  </script>
</body>

<!-- Mirrored from shreyu.coderthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jan 2020 11:34:30 GMT -->
</html>