<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<footer class="main-footer">
    <strong>Copyright &copy; 2022 <?php echo anchor(base_url(), get_store_name()); ?>.</strong>
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>

<script src="<?php echo get_theme_uri('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', 'adminlte'); ?>"></script>
<script src="<?php echo get_theme_uri('js/adminlte.js', 'adminlte'); ?>"></script>

<!-- Elapsed in {elapsed_time} times  -->
<script>
    $('#provinsi').change(function() {
        var provinsi = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('regions/provinsi?provinsi='); ?>" + provinsi,
            success: function(res) {
                // console.log(res);
                $("#kabupaten").empty();
                $("#kabupaten").append('<option value="">Pilih Kabupaten</option>');
                $("#kecamatan").empty();
                $("#kecamatan").append('<option value="">Pilih Kecamatan</option>');
                $("#kelurahan").empty();
                $("#kelurahan").append('<option value="">Pilih Kelurahan</option>');
                $.each(res, function(key, value) {
                    $("#kabupaten").append('<option value="' + value.district + '">' + value.district +
                        '</option>');
                });
            }
        });
    });
    $('#kabupaten').change(function() {
        var kabupaten = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('regions/kabupaten?kabupaten='); ?>" + kabupaten,
            success: function(res) {
                // console.log(res);
                $("#kecamatan").empty();
                $("#kecamatan").append('<option value="">Pilih Kecamatan</option>');
                $("#kelurahan").empty();
                $("#kelurahan").append('<option value="">Pilih Kelurahan</option>');
                $.each(res, function(key, value) {
                    $("#kecamatan").append('<option value="' + value.subdistrict + '">' + value.subdistrict +
                        '</option>');
                });
            }
        });
    });
    $('#kecamatan').change(function() {
        var kecamatan = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('regions/kecamatan?kecamatan='); ?>" + kecamatan,
            success: function(res) {
                // console.log(res);
                $("#kelurahan").empty();
                $("#kelurahan").append('<option value="">Pilih Kelurahan</option>');
                $.each(res, function(key, value) {
                    $("#kelurahan").append('<option value="' + value.area + '">' + value.area +
                        '</option>');
                });
            }
        });
    });
</script>
</body>

</html>