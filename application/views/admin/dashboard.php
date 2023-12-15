<div class="content">
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<!-- Tampilkan notifikasi berhasil -->
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert"> 
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">Rp. <span class="count"><?php echo $totalTransactionAmount; ?></span></div>
                                            <div class="stat-heading">Penghasilan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$totalTransactionCount?></span></div>
                                            <div class="stat-heading">Transaksi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>produk</th>
            <th>Email</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach ($transactions as $index => $transaction): ?>
            <tr>
                <td><?php echo $transaction->id; ?></td>
                <td><?php echo $transaction->name; ?></td>
                <td><?php echo $transaction->product_name ?></td>
                <td><?php echo $transaction->email; ?></td>
                <td><?php echo $transaction->transaction_total; ?></td>
                <td><?php echo $transaction->transaction_status; ?></td>
                <td>
                <a type="button" href="<?=base_url('transactions/listTransactions') ?>" class="btn btn-info btn-sm">
                    Detail
    </a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
                <!-- /.orders -->
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>