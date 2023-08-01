<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Kelola Supplier Produk</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Supplier</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" data-target="#addModal" data-toggle="modal" class="btn btn-sm btn-neutral">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Supplier Produk</h3>
                </div>

                <div class="packageContainer">
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="packageList" style="width: 100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header bg-transparent">
                            <h3 class="card-heading text-center mt-2">Tambah Supplier</h3>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" action="#" method="POST" id="addSuppliersForm">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                        </div>
                                        <input name="nama_supplier" class="form-control" placeholder="Nama " type="text" minlength="4" maxlength="255" required>
                                    </div>
                                    <div class="text-danger err nama_supplier-error"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                        </div>
                                        <input name="alamat_supplier" class="form-control" placeholder="Alamat Supplier " type="text" minlength="4" maxlength="255" required>
                                    </div>
                                    <div class="text-danger err alamat_supplier-error"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                        </div>
                                        <select name="products_id" class="form-control">
                                            <option>Pilih Produk</option>
                                            <?php if (count($products) > 0) : ?>
                                                <?php foreach ($products as $items) : ?>
                                                    <option value="<?php echo $items->id; ?>" <?php echo set_select('products_id', $items->id); ?>>› <?php echo $items->name; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="text-danger err stok_barang-error"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                        </div>
                                        <input name="stok_barang" class="form-control" placeholder="Stok Barang" type="number" minlength="1" maxlength="255" required>
                                    </div>
                                    <div class="text-danger err stok_barang-error"></div>
                                </div>

                                <div class="text-left">
                                    <button type="button" class="btn btn-secondary my-4" data-dismiss="modal">Batal</button>
                                </div>
                                <div class="float-right" style="margin-top: -90px">
                                    <button type="submit" class="btn btn-primary my-4 addPackageBtn">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Hapus Supplier</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="#" id="deleteSupplier" method="POST">

                    <input type="hidden" name="id" value="" class="deleteID">

                    <div class="modal-body">
                        <p>Yakin ingin menghapus? Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-delete">Hapus</button>
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header bg-transparent">
                            <h3 class="card-heading text-center mt-2">Edit Supplier</h3>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" action="#" method="POST" id="editSupplierForm">

                                <input type="hidden" name="id" value="" class="edit-id">

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                        </div>
                                        <input name="nama_supplier" class="form-control edit-nama_supplier" placeholder="Nama Supplier" type="text" minlength="4" maxlength="100" required>
                                    </div>
                                    <div class="text-danger err name-error"></div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                        </div>
                                        <input name="alamat_supplier" class="form-control edit-alamat" placeholder="Alamat Supplier " type="text" minlength="4" maxlength="255" required>
                                    </div>
                                    <div class="text-danger err alamat_supplier-error"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                        </div>
                                        <select name="products_id" class="form-control edit-products">
                                            <option>Pilih Produk</option>
                                            <?php if (count($products) > 0) : ?>
                                                <?php foreach ($products as $items) : ?>
                                                    <option value="<?php echo $items->id; ?>"> <?php echo $items->name; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="text-danger err stok_barang-error"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                        </div>
                                        <input name="stok_barang" class="form-control edit-stok" placeholder="Stok Barang" type="number" minlength="1" maxlength="255" required>
                                    </div>
                                    <div class="text-danger err stok_barang-error"></div>
                                </div>

                                <div class="text-left">
                                    <button type="button" class="btn btn-secondary my-4" data-dismiss="modal">Batal</button>
                                </div>
                                <div class="float-right" style="margin-top: -90px">
                                    <button type="submit" class="btn btn-primary my-4 editPackageBtn">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href="<?php echo get_theme_uri('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'argon'); ?>" rel="stylesheet">

    <script src="<?php echo get_theme_uri('vendor/datatables.net/js/jquery.dataTables.min.js', 'argon'); ?>"></script>
    <script src="<?php echo get_theme_uri('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'argon'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables.lang.js'); ?>"></script>
    <script>
        function formatRupiah(number) {
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });

            return formatter.format(number);
        }

        $(document).ready(function() {
            $(document).on('click', '.btnDelete', function() {
                var id = $(this).data('id');

                $('.deleteID').val(id);
                $('#deleteModal').modal('show');
            });

            $(document).on('click', '.btnEdit', function() {
                var id = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url: '<?php echo site_url('admin/suppliers/supplier_api?action=view_data'); ?>',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        // console.log(res);
                        if (res.data) {
                            var d = res.data;

                            $('.edit-id').val(d.id_supplier);
                            $('.edit-nama_supplier').val(d.nama_supplier);
                            $('.edit-alamat').val(d.alamat_supplier);
                            $('.edit-products').val(d.products_id);
                            $('.edit-stok').val(d.stok_barang);

                            $('#editModal').modal('show');
                        }
                    }
                });
            });

            $('#editSupplierForm').submit(function(e) {
                e.preventDefault();

                var btn = $('.editPackageBtn');
                var id = $('.edit-id').val();
                var data = $(this).serialize();
                btn.html('<i class="fa fa-spin fa-spinner"></i> Menyimpan...').attr('disabled', true);

                $.ajax({
                    method: 'POST',
                    url: '<?php echo site_url('admin/suppliers/supplier_api?action=edit_supplier'); ?>',
                    data: data,
                    success: function(res) {
                        // console.log(res);
                        if (res.code == 201) {
                            btn.html('<i class="fa fa-check"></i> Berhasil').removeAttr('disabled');

                            setTimeout(() => {
                                $('#editModal').modal('hide');
                                table.ajax.reload();
                                btn.html('Simpan');
                            }, 1500);
                        }
                    }
                })
            });

            $('#deleteSupplier').submit(function(e) {
                e.preventDefault();

                var id = $('.deleteID').val();
                var btn = $('.btn-delete');

                btn.html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

                $.ajax({
                    method: 'POST',
                    url: '<?php echo site_url('admin/suppliers/supplier_api?action=delete_supplier'); ?>',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        if (res.code == 204) {
                            btn.html('<i class="fa fa-check"></i> Terhapus!');

                            setTimeout(() => {
                                $('#deleteModal').modal('hide');
                                table.ajax.reload();
                                btn.html('Hapus');
                            }, 1500);
                        }
                    }
                })
            });

            var table = $('#packageList').DataTable({
                "ajax": "<?php echo site_url('admin/suppliers/supplier_api?action=list'); ?>",
                "columns": [{
                        "data": "id_supplier"
                    },
                    {
                        "data": "nama_supplier"
                    },
                    {
                        "data": "alamat_supplier"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "stok_barang"
                    },
                    {
                        "mRender": function(data, type, row) {
                            return formatRupiah(row.price);
                        }
                    },
                    {
                        "mRender": function(data, type, row) {
                            return '<div class="text-right"><a href="#" data-id="' + row.id_supplier + '" class="btn btn-warning btn-sm btnEdit"><i class="fa fa-edit"></i></a><a href="#" data-id="' + row.id_supplier + '" class="btn btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i></a></div>';
                        }
                    }
                ],
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Menampilkan _MENU_ data",
                    "info": "Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",
                    "infoEmpty": "Tidak ada data yang ditampilkan",
                    "infoFiltered": "(dari total _MAX_ data)",
                    "zeroRecords": "Tidak ada hasil pencarian ditemukan",
                    "paginate": {
                        "first": "&laquo;",
                        "last": "&raquo;",
                        "next": "&rsaquo;",
                        "previous": "&lsaquo;"
                    },
                }
            });


            $('#addSuppliersForm').submit(function(e) {
                e.preventDefault();

                var data = $(this).serialize();
                var btn = $('.addPackageBtn');

                btn.html('<i class="fa fa-spin fa-spinner"></i> Menambah...');
                $('.err').empty();

                $.ajax({
                    method: 'POST',
                    url: '<?php echo site_url('admin/suppliers/supplier_api?action=add_supplier'); ?>',
                    data: data,
                    context: this,
                    success: function(res) {
                        if (res.data) {
                            btn.html('<i class="fa fa-check"></i> Berhasil!');

                            setTimeout(function() {
                                $('#addSuppliersForm .form-control').val(null);
                                btn.html('Tambah');
                            }, 2000);
                            setTimeout(() => {
                                $('#addModal').modal('hide');
                            }, 2222);

                            table.ajax.reload();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        btn.html('Tambah');

                        var errors = xhr.responseJSON.errors;

                        $.each(errors, function(keys, val) {
                            $.each(val, function(key, val) {
                                $('.' + keys + '-error').text(val);
                            });
                        });
                    }
                })
            })
        });
    </script>