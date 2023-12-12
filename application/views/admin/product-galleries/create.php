


<div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header"><strong>Tambah Barang</strong></div>
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
          <form action="<?= base_url('productGalleries/store') ?>" method="post" enctype="multipart/form-data">



           
          <div class="row form-group">

          <!-- Tampilkan notifikasi Flashdata jika ada -->

                    <div class="col col-md-3"><label for="select" class=" form-control-label">Pilih Produk</label></div>
                    <div class="col-md-12 col-md-9">
                        <select name="products_id" id="select" class="form-control">
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                        <?php endforeach; ?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image" name="image">
                </div>
                <div class="form-group">
                <label for="is_default">jadikan Gambar Default :</label>
                 <input type="checkbox" id="is_default" name="is_default">
                </div>
                

            <button type="submit" class="btn btn-block btn-success m-b-30 m-t-30 d-block">Tambah Barang</button>

          </form>
        </div>
    </div>
</div>
    </div>
</div>
