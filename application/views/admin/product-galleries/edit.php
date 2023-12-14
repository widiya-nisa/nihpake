


<div class="container">
    <div class="row">
    <div class="col-lg-12">
    <?php echo validation_errors(); ?>

    <div class="card">
        <div class="card-header"><strong>Edit gallery</strong></div>
        <div class="card-body card-block">

        <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
             <!-- Tampilkan notifikasi Flashdata gagal jika ada -->
             <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
          <form action="<?= base_url('productGalleries/update/' . $gallery->id) ?>" method="post" enctype="multipart/form-data">


                <div class="form-group">
                            <label for="image">Pilih Gambar Baru:</label>
                            <input type="file" class="form-control form-control-user" id="image" name="image">
                        </div>
                <div class="form-group">
                            <label for="is_default">Jadikan Gambar Default:</label>
                            <input type="checkbox" id="is_default" name="is_default" <?php echo ($gallery->is_default == 1) ? 'checked' : ''; ?>>
                        </div>

                       
                

            <button type="submit" class="btn btn-block btn-success m-b-30 m-t-30 d-block">Edit Gallery</button>

          </form>
        </div>
    </div>
</div>
    </div>
</div>
