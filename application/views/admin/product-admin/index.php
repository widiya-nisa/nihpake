<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
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
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($products as $product): ?>
                                        <tr>
                                            <td><?php echo $product->id; ?></td>
                                            <td><?php echo $product->name; ?></td>
                                            <td><?php echo $product->description; ?></td>
                                        
                                            <td><?php echo $product->type; ?></td>
                                            <td><?php echo $product->price; ?></td>
                                            <td><?php echo $product->quantity; ?></td>

                                            <td>
                                            <a href="<?php echo site_url('product/edit/'.$product->id); ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?php echo site_url('product/delete/'.$product->id); ?>" class="btn btn-danger">Hapus</a>
                                            </td>

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