<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="<?php echo get_theme_uri('js/plugins/nucleo/css/nucleo.css', 'argon'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo get_theme_uri('js/plugins/@fortawesome/fontawesome-free/css/all.min.css', 'argon'); ?>" type="text/css">

    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?php echo get_theme_uri('css/argon9f1e.css?v=1.1.0', 'argon'); ?>" type="text/css">

    <script src="<?php echo get_theme_uri('vendor/jquery/dist/jquery.min.js', 'argon'); ?>"></script>
    <script src="<?php echo get_theme_uri('vendor/bootstrap/dist/js/bootstrap.bundle.min.js', 'argon'); ?>"></script>
</head>

<body>
    <h1 class="text-center mt-3">Laporan Penjualan</h1>
    <div class="container">
        <table class="table align-items-center table-flush table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah Harga</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <th scope="col">
                            <?php echo anchor('admin/orders/view/' . $order->id, '#' . $order->order_number); ?>
                        </th>
                        <td><?php echo $order->customer; ?></td>
                        <td>
                            <?php echo get_formatted_date($order->order_date); ?>
                        </td>
                        <td>
                            Rp <?php echo format_rupiah($order->total_price); ?>
                        </td>
                        <td><?php echo get_order_status($order->order_status, $order->payment_method); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>