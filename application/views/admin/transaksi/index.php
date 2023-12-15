<div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                  <?php endif; ?>
                    <div class="col-md-12">
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
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $transaction->id; ?>">
                    Detail
                </button>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($transactions as $transaction): ?>
    <!-- Modal -->
    <div class="modal fade" id="detailModal<?php echo $transaction->id; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Transaction Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo $transaction->id; ?></td>
                            </tr>
                            <tr>
                                <th>UUID</th>
                                <td><?php echo $transaction->uuid; ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo $transaction->name; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $transaction->email; ?></td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td><?php echo $transaction->number; ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo $transaction->address; ?></td>
                            </tr>
                            <tr>
                                <th>Product</th>
                                <td><?php echo $transaction->product_name; ?></td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td><?php echo $transaction->transaction_total; ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php echo $transaction->transaction_status; ?></td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php if ($transaction->transaction_status != 'paid' && $transaction->transaction_status != 'canceled'): ?>
                <form action="<?= base_url('transactions/cancelTransaction/' . $transaction->id) ?>" method="post">
                    <button type="submit" class="btn btn-danger">Status Cancel</button>
                </form>

                <form action="<?= base_url('transactions/markAsPaid/' . $transaction->id) ?>" method="post">
                    <button type="submit" class="btn btn-success">Status Paid</button>
                </form>
                <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

                </div>
            </div><!-- .animated -->
        </div>


        <script>
   function cancelTransaction(button) {
        var transactionId = $(button).data('transaction-id');
        // Tambahkan logika untuk membatalkan transaksi dengan ID transactionId
        alert('Status transaksi ' + transactionId + ' telah dibatalkan.');
        // Sisipkan logika AJAX atau panggil fungsi di sini sesuai kebutuhan Anda
    }

    function markAsPaid(button) {
        var transactionId = $(button).data('transaction-id');
        // Tambahkan logika untuk menandai transaksi sebagai terbayar dengan ID transactionId
        alert('Status transaksi ' + transactionId + ' telah diubah menjadi terbayar.');
        // Sisipkan logika AJAX atau panggil fungsi di sini sesuai kebutuhan Anda
    }

    function updateTransactionStatus(transactionId, newStatus) {
        $.ajax({
            url: '<?php echo base_url('transactions/updateStatus'); ?>',
            type: 'POST',
            data: { id: transactionId, status: newStatus },
            success: function(response) {
                // Reload halaman atau lakukan tindakan lain
                location.reload();
            },
            error: function(error) {
                console.error('Error updating transaction status:', error);
            }
        });
    }
</script>
