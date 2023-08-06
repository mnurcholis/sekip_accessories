<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-5">
                    <h1>Keluhan Saya</h1>
                </div>
                <div class="col-sm-2">
                    <span class="btn btn-warning"><?php echo anchor('customer/keluhans/write', 'Tulis Keluhan Baru'); ?></span>
                </div>
                <div class="col-sm-5">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item active">Keluhan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-body<?php echo (count($keluhans) > 0) ? ' p-0' : ''; ?>">
                <?php if (count($keluhans) > 0) : ?>
                    <div class="table-responsive">
                        <table class="table table-striped m-0">
                            <tr class="bg-primary">
                                <th scope="col">No.</th>
                                <th scope="col">Order</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Keluhan</th>
                            </tr>
                            <?php foreach ($keluhans as $keluhan) : ?>
                                <tr>
                                    <td><?php echo $keluhan->id; ?></td>
                                    <td><?php echo anchor('customer/keluhans/view/' . $keluhan->id, '#' . $keluhan->order_number); ?></td>
                                    <td><?php echo get_formatted_date($keluhan->keluhan_date); ?></td>
                                    <td><?php echo $keluhan->catatan_keluhan; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="alert alert-info">
                                Belum ada Keluhan yang ditulis. Silahkan tulis baru.
                            </div>
                            <span class="btn btn-warning">
                                <?php echo anchor('customer/keluhans/write', 'Tulisan Keluhan baru'); ?>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($pagination) : ?>
                <div class="card-footer">
                    <?php echo $pagination; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>

</div>