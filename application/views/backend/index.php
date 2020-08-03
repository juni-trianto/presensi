<!DOCTYPE html>
<html>

<?php include 'header.php'; ?>

<body>

  <?php include 'sidebar.php'; ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include 'topbar.php'; ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
          <!-- Card stats -->

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <?php include $folder . '/' . $page_name . '.php'; ?>
      </div>
      <footer class="footer pt-0">

      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?= base_url('assets/backend/') ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/backend/') ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/backend/') ?>assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url('assets/backend/') ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= base_url('assets/backend/') ?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?= base_url('assets/backend/') ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url('assets/backend/') ?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?= base_url('assets/backend/') ?>assets/js/argon.js?v=1.2.0"></script>

  <script src="<?= base_url('assets/notifi'); ?>/notify.js"></script>
  <script src="<?= base_url('assets/notifi'); ?>/notify.min.js"></script>
  <script src="<?= base_url('assets/notifi'); ?>/dataTables.min.js"></script>


  <script>
    $(".dropdown-trigger").dropdown();

    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>


  <?php if ($this->session->flashdata('message') != "") : ?>

    <script>
      $.notify("<?= $this->session->flashdata('message') ?>", "success");
    </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error') != "") : ?>

    <script>
      $.notify("<?= $this->session->flashdata('error') ?>", "error");
    </script>

  <?php endif; ?>
</body>

</html>