<div class="content">
            <div class="animated fadeIn">
                <div class="row">

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
            <th>UUID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Address</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?php echo $transaction->id; ?></td>
                <td><?php echo $transaction->uuid; ?></td>
                <td><?php echo $transaction->name; ?></td>
                <td><?php echo $transaction->email; ?></td>
                <td><?php echo $transaction->number; ?></td>
                <td><?php echo $transaction->address; ?></td>
                <td><?php echo $transaction->transaction_total; ?></td>
                <td><?php echo $transaction->transaction_status; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>