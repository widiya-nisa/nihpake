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
                                            <th>Product</th>
                                            <th>Gambar</th>
                                            <th>Default</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($gallery as $item): ?>
                                        <tr>
                                            <td><?php echo $item->id; ?></td>
                                            <td><?php echo $item->product_name; ?></td>
                                            <td><img src="<?php echo base_url($item->photo); ?>" alt="Product Image" class="img-thumbnail" width="100"></td>
                                            <td><?php echo ($item->is_default == 1) ? 'Yes' : 'No'; ?></td>
                                            <td>
                                            <a href="<?php echo base_url('productGalleries/edit/'.$item->id); ?>" class="btn btn-primary">Edit</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteGalleryModal<?= $item->id; ?>">
                                                Hapus 
                                            </button>
                                            <div class="modal fade" id="deleteGalleryModal<?= $item->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteGalleryModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteGalleryModalLabel">Konfirmasi Penghapusan Gallery</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus gallery ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('productGalleries/delete_gallery/' . $item->id); ?>" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        