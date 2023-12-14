<div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header"><strong>Edit Produk</strong></div>
        <div class="card-body card-block">
          <form action="<?= base_url('product/update/' . $product->id); ?>" method="post" >
          <?php echo validation_errors(); ?>
                <div class="form-group">
                    <label for="name" class=" form-control-label">Name</label><input type="text" name="name" value="<?= set_value('name', $product->name); ?>" class="form-control" required>
                <?= form_error('name', '<span class="text-danger">', '</span>'); ?>

                </div>
                <div class="form-group">
                    <label for="type" class=" form-control-label">Type</label><input type="text" name="type" value="<?= set_value('type', $product->type); ?>" class="form-control" required>
    <?= form_error('type', '<span class="text-danger">', '</span>'); ?>
                </div>
                <div class="form-group">
                    <label for="description" class=" form-control-label">description</label> <textarea name="description" class="form-control" required required><?= set_value('description', $product->description); ?></textarea>
    <?= form_error('description', '<span class="text-danger">', '</span>'); ?>
                </div>
                <div class="form-group">
                    <label for="price" class=" form-control-label">price</label><input type="text" name="price" value="<?= set_value('price', $product->price); ?>" class="form-control" required>
    <?= form_error('price', '<span class="text-danger">', '</span>'); ?>

                </div>
                <div class="form-group">
                    <label for="quantity" class=" form-control-label">Quantity</label><input type="text" name="quantity" value="<?= set_value('quantity', $product->quantity); ?>" class="form-control"  required>
    <?= form_error('quantity', '<span class="text-danger">', '</span>'); ?>
                </div>

            <button type="submit" class="btn btn-block btn-success m-b-30 m-t-30 d-block">Edit Produk</button>

          </form>
        </div>
    </div>
</div>
    </div>
</div>