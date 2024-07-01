
  <!-- product section -->
  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          KUPUJ
        </h2>
        <p>
          wybierz swoje ulubione produkty, dodaj do koszyka, zapłać i daj zarobić. Nie gwarantujemy że otrzymasz
          zamówienie, ale obiecujemy że wydanych tu pieniędzy już więcej nie zobaczysz. EZ.
        </p>
      </div>
      <div class="row">
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
              <a href="" price='<?= $products[$j]['productPrice'] ?>'>
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
      </div>
    </div>
  </section>

  <!-- end product section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <!-- <img src="images/slider-img.png" alt=""> -->
            <a href="https://youtu.be/dQw4w9WgXcQ?si=O5pryuKiHzs4Qh8S"><img src="<?php echo base_url(); ?>images/slider-img.png" alt=""></a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                O nas
              </h2>
            </div>
            <p>
              A co ty byś chciał wiedzieć?! </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- info section -->

  <section class="info_section ">
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="info_contact ">
              <div class="row">
                <div class="col-md-3">
                  <a href="https://www.google.pl/maps/place/Belweder,+Wyzwolenia+4c,+43-460+Wisła/@49.6321125,18.9030681,17z/data=!3m1!4b1!4m6!3m5!1s0x4714180f2123972b:0x901510a68a4c0bed!8m2!3d49.6321091!4d18.9056484!16s%2Fg%2F12vrd7s29?entry=ttu"
                    class="link-box">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                      Location
                    </span>
                  </a>
                </div>
                <div class="col-md-5">
                  <a href="https://www.rp.pl/polityka/art39560041-grzegorz-braun-zgasil-swiece-chanukowe-michal-kobosko-konfederacja-powinna-go-wyrzucic"
                    class="link-box">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                      +48 789-339-114
                    </span>
                  </a>
                </div>
                <div class="col-md-4">
                  <a href="https://wiadomosci.wp.pl/biden-prawie-spadl-ze-schodow-wszystko-nagraly-kamery-6899909285239680a"
                    class="link-box">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                      Labnom5507@gmail.com
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5  col-lg-3 mx-auto">
            <div class="info_form ">
              <form id="info_form" onsubmit="handleFormSubmit(event)">
                <input type="email" id="email_input" placeholder="no i masz spam." />
                <button type="submit">
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="info_logo">
          <a class="navbar-brand" href="index.html">
            <span>
              BOCIAN®
            </span>
          </a>
        </div>
        <div class="social-box">
          <a href="https://x.com/PolscyEkolodzy">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="https://www.instagram.com/xmvrtysx/">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
          <a href="https://youtu.be/NbFJPpbH51s?si=CcQ261Vmdjg7Q3rH">
            <i class="fa fa-youtube" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By Mateusz Kwijas :)
      </p>
    </div>
  </footer>
  <!-- footer section -->



  <script>
    // Ustala liczbę artykułów w koszyku
    function getItemCount(cartMap) {
      let sum = 0;
      cartMap.forEach((v) => {sum += v});
      return sum;
    }

   // Funkcja do aktualizacji licznika artykułów w koszyku
      function updateCartCount(keyName) {
      if (cart.has(keyName)) {
        cart.set(keyName,cart.get(keyName) + 1);
      }else {
        cart.set(keyName,1);
      }
      cartItemCount = getItemCount(cart);
      sessionStorage.setItem('itemsCount',cartItemCount);
      sessionStorage.setItem('cart',JSON.stringify(Object.fromEntries(cart)));
      document.getElementById('cart').value = JSON.stringify(Object.fromEntries(cart));
      document.getElementById('cart-count').textContent = cartItemCount;
    }
    // event listener do przycisków dodawania produktów do koszyka
    document.querySelectorAll('.detail-box a').forEach(productLink => {
      productLink.addEventListener('click', function (event) {
        event.preventDefault(); // Zatrzymanie domyślnego działania linku
        let keyName =  (event.target || event.srcElement).innerHTML.trim();
        updateCartCount(keyName); // Aktualizacja licznika artykułów w koszyku
      });
    });

  </script>

</body>

</html>