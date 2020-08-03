<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?= base_url('assets/frontend/assets/'); ?>js/materialize.js"></script>
<script src="<?= base_url('assets/frontend/assets/'); ?>js/init.js"></script>

<script type="text/javascript" src="<?= base_url('assets/notifi'); ?>/jquery.idle.js"></script>

<script>
    $(document).idle({
        onIdle: function() {
            window.location = "<?= base_url('login_user/logout'); ?>";
            // window.alert("sometext");
        },
        idle: 1200000
    });
</script>



<script src="<?= base_url('assets/notifi'); ?>/notify.js"></script>
<script src="<?= base_url('assets/notifi'); ?>/notify.min.js"></script>

<script>
    $(".dropdown-trigger").dropdown();

    $(document).ready(function() {
        $('.materialboxed').materialbox();
    });
</script>


<?php if ($this->session->flashdata('message') != "") : ?>

    <script type="text/javascript">
        $.notify("<?= $this->session->flashdata('message') ?>", "success");
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error') != "") : ?>

    <script type="text/javascript">
        $.notify("<?= $this->session->flashdata('error') ?>", "error");
    </script>

<?php endif; ?>



</body>

</html>