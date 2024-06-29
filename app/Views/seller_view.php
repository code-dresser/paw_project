  <!-- product section -->
  <section class="product_section layout_padding">
    <div class="container">
        <div class="row">
            <!-- PRODUKTY Z BAZY HEREEE!!!!!!! -->
            <?php
            //Nie mam lepszego pomysłu jak to zrobić jak ktoś chce się bawić to proszę bardzo xd M.P
            for ($i=0;$i < 3;$i++) { // liczba kolumn
                for ($j = 0; $j < count($products) ;$j++) { //iteracja po liście produktów
                    if ($j % 3 == $i) { // przypasowanie produtków do kolumn?> 
                        <div class="col-sm-6 col-lg-4"> 
                        <div class="box">
                            <div class="img-box">
                            <!-- Trzeba wstawić obrazek z bazy -->
                            <img src="<?php echo ($products[$j]['productImage'] != NULL) ? img_data(WRITEPATH . $products[$j]['productImage']) : img_data(WRITEPATH . 'uploads/images/about-img.png'); ?>" alt="">
                            </div>
                            <div class="detail-box">
                            <!-- PRODUKTY Z BAZY HEREE!!!!!!!!!!!! -->
                            <a href="<?= base_url("/product/{$products[$j]['ID']}"); ?>" price='<?= $products[$j]['productPrice'] ?>'>
                                <?= $products[$j]['productTitle'] ?>
                            </a>
                            <div class="price_box">
                                <h6 class="price_heading">
                                <span>$<?= $products[$j]['productPrice'] ?></span> 
                                </h6>
                            </div>
                            </div>
                        </div>
                        </div>
            <?php } } }?>
            <!-- DODAWANIE PRODUKTU -->
            <div class="col-sm-6 col-lg-4">
                <div class="box">
                    <div class="img-box">
                        <a href="<?= base_url('/product'); ?>"><img src="images/sledz.png" alt=""></a>
                    </div>
                    <div class="detail-box">
                        <a href="<?= base_url('/product'); ?>">
                            DODAJ PODUKT
                        </a>
                        <div class="price_box">
                            <h6 class="price_heading">
                                <span> no we dodaj </span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- end product section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By Mateusz Kwijas :)
      </p>
    </div>
  </footer>
  <!-- footer section -->
</body>

</html>