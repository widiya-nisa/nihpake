

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th class="p-name text-center">Product Name</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                                            <td class="-pic first-row">
                                                <img src="<?= base_url($defaultGallery->photo) ?>" height="150px" />
                                        <?php endif; ?>

                                            </td>
                                            <td class="-title first-row text-center">
                                                <h5><?php echo $products->name; ?></h5>
                                            </td>
                                            <td class="p-price first-row">Rp.<?php echo $products->price; ?></td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h4 class="mb-4">
                                Informasi Pembeli:
                            </h4>
                            <div class="user-checkout">
                            <form action="<?= base_url('transactions/createTransaction') ?>" method="post">
                                <div class="form-group">
                                    <label for="name">Nama lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="number">No. HP</label>
                                    <input type="text" class="form-control" id="number" name="number" placeholder="Masukan No. HP" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat Lengkap</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                                </div>
                                <input type="hidden" name="transaction_total" value="<?= $products->price; ?>">
                                <input type="hidden" name="product_id" value="<?= $products->id; ?>"> <!-- Sesuaikan dengan cara Anda menghitung total transaksi -->
                                 <!-- Sesuaikan dengan cara Anda menghitung total transaksi -->
                                <button type="submit" class="btn btn-block proceed-btn">I Already Paid</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal mt-3">Total Biaya <span>Rp.<?php echo $products->price; ?></span></li>
                                    <li class="subtotal mt-3">Bank Transfer <span>Mandiri</span></li>
                                    <li class="subtotal mt-3">No. Rekening <span>2208 1996 1403</span></li>
                                    <li class="subtotal mt-3">Nama Penerima <span>Widiya</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->