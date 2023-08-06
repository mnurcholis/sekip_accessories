<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Daftar dan Buat Akun | <?php echo get_store_name(); ?></title>

    <!-- Icons font CSS-->
    <link href="<?php echo get_theme_uri('custom/auth/register/vendor/mdi-font/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo get_theme_uri('custom/auth/register/vendor/font-awesome-4.7/css/font-awesome.min.css'); ?>" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo get_theme_uri('custom/auth/register/vendor/select2/select2.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo get_theme_uri('custom/auth/register/vendor/datepicker/daterangepicker.css'); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo get_theme_uri('custom/auth/register/css/main5.css'); ?>" rel="stylesheet" media="all">

    <style>
        .input--style-2:hover {
            border-bottom: 1px solid #FA4251;
            color: #4DAE3C
        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Daftar Akun</h2>
                    <h3>Akun Anda Sudah Terdaftar</h3>
                    <div class="p-t-30">
                        <a class="btn btn--radius btn--green" href="<?php echo base_url(); ?>">Back To Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

<script src="<?php echo get_theme_uri('plugins/jquery/jquery.min.js', 'adminlte'); ?>"></script>
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

</html>