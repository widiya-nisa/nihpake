
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="<?= base_url('assets/vendor/img/hero-1.jpg') ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            </p>
                            <a href="<?= base_url('product/index') ?>" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="<?= base_url('assets/vendor/img/hero-2.jpg') ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            </p>
                            <a href="<?= base_url('product/index') ?>" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="product-slider owl-carousel">
                <?php foreach ($products as $product): ?>

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
                                <img src="<?= base_url($defaultGallery->photo) ?>" alt="" />
                            <?php endif; ?>
                                <ul>
                                    
                                    <li class="quick-view"><a href="product.html">+ See Detail</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?= $product->type ?></div>
                                <a href="#">
                                    <h5><?= $product->name ?></h5>
                                </a>
                                <div class="product-price">
                                Rp. <?= $product->price ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="<?= base_url('assets/vendor/img/insta-1.jpg') ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">NihPake_Store</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?= base_url('assets/vendor/img/insta-2.jpg') ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">NihPake_Store</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?= base_url('assets/vendor/img/insta-3.jpg') ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">NihPake_Store</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?= base_url('assets/vendor/img/insta-4.jpg') ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">NihPake_Store</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?= base_url('assets/vendor/img/insta-5.jpg') ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">NihPake_Store</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?= base_url('assets/vendor/img/insta-6.jpg') ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">NihPake_Store</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?= base_url('assets/vendor/img/logo-carousel/logo-1.png') ?>" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?= base_url('assets/vendor/img/logo-carousel/logo-2.png') ?>" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?= base_url('assets/vendor/img/logo-carousel/logo-3.png') ?>" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?= base_url('assets/vendor/img/logo-carousel/logo-4.png') ?>" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?= base_url('assets/vendor/img/logo-carousel/logo-5.png') ?>" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->