<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="hero-wrap hero-bread" style="background-image: url('<?php echo get_theme_uri('images/bgok2.jpg'); ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <form action="<?php echo site_url('shop/checkout/order'); ?>" method="POST">

            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <h3 class="mb-4 billing-heading">Alamat Pengiriman</h3>

                    <div class="form-group">
                        <label for="name" class="form-control-label">Pengiriman untuk (nama):</label>
                        <input type="text" name="name" value="<?php echo $customer->name; ?>" class="form-control" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="hp" class="form-control-label">No. HP:</label>
                        <input type="text" name="phone_number" value="<?php echo $customer->phone_number; ?>" class="form-control" id="hp" required>
                        <input type="hidden" name="city_ro" value="<?php echo $customer->city_ro; ?>" class="form-control" id="city_ro" required>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-control-label">Alamat:</label>
                        <textarea name="address" class="form-control" id="address" required readonly><?php echo $customer->address; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="note" class="form-control-label">Catatan Alamat:</label>
                        <textarea name="note" class="form-control" id="note"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="kurier" class="form-control-label">Pilih Ekspedisi:</label>
                        <select class="form-control kurir" name="courier" id="courier" required>
                            <option value="0">-- pilih Ekspedisi --</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="coba" class="form-control-label">Pilih :</label>
                        <div id="coba">
                            <ul class="list-group" id="ongkir"></ul>
                        </div>
                        <div id="loading">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Rincian Belanja</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>Rp <?php echo format_rupiah($subtotal); ?></span>
                                    <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>" class="form-control" id="subtotal" required>
                                </p>
                                <p class="d-flex">
                                    <span>Ongkos kirim</span>
                                    <!-- <span id="text_biaya_ongkir">0</span> -->
                                    <input type="text" name="biaya_ongkir" value="" class="form-control" id="biaya_ongkir" required readonly>
                                </p>
                                <p class="d-flex">
                                    <span>Kupon</span>
                                    <span><?php echo $discount; ?></span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span id="text_total">Rp <?php echo format_rupiah($total); ?></span>
                                    <input type="hidden" name="total" value="<?php echo $total; ?>" class="form-control" id="total" required>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Metode Pembayaran</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="payment" class="mr-2" value="1" required> Transfer bank</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group text-right" style="margin-top: 10px;">
                                <input type="submit" class="btn btn-info py-2 px-2" value="Buat Pesanan">
                            </div>
                        </div>


                    </div>
                </div> <!-- .col-md-8 -->
            </div>

        </form>
    </div>
</section> <!-- .section -->