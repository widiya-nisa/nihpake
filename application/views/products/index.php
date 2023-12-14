<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                        <span>Products</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="products">
    <div class="container">
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-3 col-sm-12">
                    <div class="product-item">
                        <div class="pi-pic">
                        <?php
                            $defaultGallery = null;

                            // Cari galeri yang memiliki is_default = 1
                            foreach ($product->galleries as $gallery) {
                                if ($gallery->is_default == 1) {
                                    $defaultGallery = $gallery;
                                    break;
                                }
                            }

                            // Jika ditemukan galeri yang is_default, tampilkan gambarnya
                            if ($defaultGallery !== null) : ?>
                            <!-- Menampilkan gambar pertama dari productGalleries -->
                                <img src="<?= base_url($defaultGallery->photo) ?>" alt="" />
                                <?php endif; ?>
                            <ul>
                                <li class="quick-view"><a href="<?= base_url('product/detail/' . $product->id) ?>">+ See Detail</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name"> <?= $product->type ?></div>
                            <a href="#">
                                <h5><?= $product->name ?></h5>
                            </a>
                            <div class="product-price">
                                <?= 'Rp.' . $product->price ?>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
