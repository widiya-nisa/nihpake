    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <?php
                            $defaultGallery = null;

                            // Cari galeri yang memiliki is_default = 1
                            foreach ($products->galleries as $gallery) {
                                if ($gallery->is_default == 1) {
                                    $defaultGallery = $gallery;
                                    break;
                                }
                            }

                            // Jika ditemukan galeri yang is_default, tampilkan gambarnya
                            if ($defaultGallery !== null) : ?>
                                <img class="product-big-img" src="<?= base_url($defaultGallery->photo) ?>" alt="" />
                            <?php endif; ?>
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <?php foreach ($products->galleries as $gallery): ?>
                                    <div class="pt" data-imgbigurl="<?= base_url($gallery->photo) ?>">
                                        <img src="<?= base_url($gallery->photo) ?>" alt="" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span><?= $products->type ?></span>
                                <h3><?= $products->name ?></h3>
                            </div>
                            <div class="pd-desc">
                                <p><?= $products->description ?></p>
                                <h4>RP.<?= $products->price ?></h4>
                            </div>
                            <div class="quantity">
                                <a href="<?= base_url('checkout/index') ?>" class="primary-btn pd-cart">Beli Produk</a>
                            </div>
                        </div>
                    </div>
                    <!-- ... (lanjutan kode) ... -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
    <!-- Product Shop Section End -->

    