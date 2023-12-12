<div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header"><strong>Tambah Gambar</strong></div>
        <div class="card-body card-block">
          <form action="<?= base_url('product/add_product') ?>" method="post" >
          <?php echo validation_errors(); ?>
                <div class="form-group">
                    <label for="name" class=" form-control-label">Name</label><input type="text" id="name" placeholder="Enter your product name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type" class=" form-control-label">Type</label><input type="text" id="type" placeholder="Enter your product type" name="type" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description" class=" form-control-label">description</label><textarea id="description" placeholder="Enter description name" class="form-control" name="description"> </textarea>
                </div>
                <div class="form-group">
                    <label for="price" class=" form-control-label">price</label><input type="text" id="price" placeholder="Enter your price" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label for="quantity" class=" form-control-label">Quantity</label><input type="text" id="quantity" placeholder="Quantity" name="quantity" class="form-control">
                </div>

            <button type="submit" class="btn btn-block btn-success m-b-30 m-t-30 d-block">Tambah Barang</button>

          </form>
        </div>
    </div>
</div>
    </div>
</div>