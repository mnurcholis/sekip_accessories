<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Laporan</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
    <?php echo form_open_multipart('admin/laporans/cetak_laporan'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">Tanggal dari:</label>
                                    <input type="date" name="date_dari" value="<?php echo set_value('date_dari'); ?>" class="form-control" id="date_dari" required>
                                    <?php echo form_error('date_dari'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">Tanggal sampai:</label>
                                    <input type="date" name="date_sampai" value="<?php echo set_value('date_sampai'); ?>" class="form-control" id="date_sampai" required>
                                    <?php echo form_error('date_sampai'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="desc">Status:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Semua</option>
                                <option value="2">Dalam proses</option>
                                <option value="3">Dalam pengiriman</option>
                                <option value="4">Selesai</option>
                                <option value="5">Batalkan</option>
                            </select>
                            <?php echo form_error('status'); ?>
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Cetak Laporan" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>