<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tulis Keluhan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('customer/keluhans', 'Review'); ?></li>
                        <li class="breadcrumb-item active">Tulis Keluhan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <?php echo form_open_multipart('customer/keluhans/write_me'); ?>
            <div class="card-body">
                <div class="form-group">
                    <label for="catatan_keluhan" class="form-control-label">Catatan keluhan</label>
                    <textarea name="catatan_keluhan" class="form-control" id="catatan_keluhan" required><?php echo set_value('catatan_keluhan'); ?></textarea>
                    <?php echo form_error('catatan_keluhan'); ?>
                </div>

                <div class="form-group">
                    <label for="bukti_bayar" class="form-control-label">Bukti Pembayaran</label>
                    <input type="file" name="bukti_bayar" value="<?php echo set_value('bukti_bayar'); ?>" class="form-control" id="bukti_bayar" required>
                    <?php echo form_error('bukti_bayar'); ?>
                </div>

                <div class="form-group">
                    <label for="orders" class="form-control-label">Order:</label>
                    <select name="order_id" class="form-control" id="orders">
                        <?php if (count($orders) > 0) : ?>
                            <?php foreach ($orders as $order) : ?>
                                <option value="<?php echo $order->id; ?>" <?php echo set_select('order_id', $order->id); ?>)>#<?php echo $order->order_number; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <input type="submit" value="Tulis Keluhan" class="btn btn-primary">
            </div>
            </form>
        </div>
    </section>

</div>