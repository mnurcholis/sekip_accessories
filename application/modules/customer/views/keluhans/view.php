<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Keluhan Order #<?php echo $keluhan->order_number; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
            <li class="breadcrumb-item"><?php echo anchor('customer/keluhans', 'Keluhan'); ?></li>
            <li class="breadcrumb-item active">Order #<?php echo $keluhan->order_number; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-body p-0">
            <table class="table table-hover table-striped">
              <tr>
                <td>Judul</td>
                <td><b><?php echo $keluhan->catatan_keluhan; ?></b></td>
              </tr>
              <tr>
                <td>Order</td>
                <td><b>#<?php echo $keluhan->order_number; ?></b></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td><b><?php echo get_formatted_date($keluhan->keluhan_date); ?></b></td>
              </tr>
              <tr>
                <td>Bukti Bayar</td>
                <td>
                  <img alt="Pembayaran order #<?php echo $keluhan->order_number; ?>" class="img img-fluid" src="<?php echo base_url('assets/uploads/keluhans/' . $keluhan->bukti_bayar); ?>">
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="text-center">
          <a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">
            <i class="fa fa-trash"></i> Hapus
          </a>
        </div>
      </div>
    </div>
  </section>

</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletelModalLabel">Hapus Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="deleteText">Anda yakin ingin menghapus keluhan?</p>
      </div>
      <div class="modal-footer">
        <?php echo anchor('customer/keluhans/delete/' . $keluhan->id, 'Hapus', array('class' => 'btn btn-danger')); ?>
      </div>
    </div>
  </div>
</div>