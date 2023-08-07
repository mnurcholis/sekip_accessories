<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">keluhan Order #<?php echo $keluhan->order_number; ?></h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><?php echo anchor('admin/keluhans', 'Keluhan'); ?></li>
                            <li class="breadcrumb-item active" aria-current="page">#<?php echo $keluhan->order_number; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-8">
            <div class="card-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Keluhan Pembayaran #<?php echo $keluhan->order_number; ?></h3>
                        <?php if ($flash) : ?>
                            <span class="float-right text-success font-weight-bold" style="margin-top: -30px;"><?php echo $flash; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="card-body p-0">
                        <table class="table align-items-center table-flush table-hover">
                            <tr>
                                <td>Catatan Keluhan</td>
                                <td><b><?php echo $keluhan->catatan_keluhan; ?></b></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <?php
                        if (!is_null($keluhan->balasan_keluhan)) {
                            echo "
                            <tr>
                                <td>Balasan Keluhan</td>
                                <td> : <b>" . $keluhan->balasan_keluhan . "</b></td>
                            </tr>
                            ";
                        } else {
                        ?>
                            <form action="<?php echo site_url('admin/keluhans/verify'); ?>" method="POST">
                                <input type="hidden" name="redir" value="1">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?php echo $keluhan->id; ?>">
                                    <div class="col-md-9">
                                        <input type="text" id="balasan_keluhan" name="balasan_keluhan" placeholder="Balasan Keluhan" class="form-control">
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <input type="submit" class="btn btn-primary" value="OK">
                                    </div>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                    </div>

                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="mb-0">Bukti Pembayaran</h3>
                </div>
                <div class="card-body p-0">
                    <img alt="Keluhan Order #<?php echo $keluhan->order_number; ?>" class="img img-fluid" src="<?php echo base_url('assets/uploads/keluhans/' . $keluhan->bukti_bayar); ?>">
                </div>
            </div>
        </div>
    </div>