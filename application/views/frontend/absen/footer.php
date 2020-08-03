</div>
</div>
<script src="<?= base_url('assets/notifi'); ?>/notify.js"></script>
<script src="<?= base_url('assets/notifi'); ?>/notify.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/notifi'); ?>/jquery.idle.js"></script>


<script>
    $(document).idle({
        onIdle: function() {
            window.location = "<?= base_url('login_user/logout'); ?>";
            // window.alert("sometext");
        },
        idle: 300000
    });
</script>

<!-- akhir data koding JS untuk Kemera dan menyimpan data -->
<script>
    var otomatis = setInterval(
        function() {
            $('#display').load('https://devel.pemalangkab.go.id/kejaksaan/display/front/get_display').fadeIn("slow");
        }, 1000);
</script>
</body>

</html>