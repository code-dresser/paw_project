<?php
?>
  <!-- cart section -->
  <section class="cart_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Kosz
        </h2>
        <p>
          Czemu tylko tyle? Ja mam horom curke!
        </p>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="cart_container">
            <table class="table">
              <thead>
                <tr>
                  <th>Produkt</th>
                  <th>Cena</th>
                  <th>Ilość</th>
                  <th>Razem</th>
                  <th>Akcje (nagle ci się odmieniło?!)</th>
                </tr>
              </thead>
              <!-- PRODUKT W KOSZYKU HERE!!!!!!!!!!! -->
              <tbody>
                <?php
                 $sum = 0;
                 foreach ($items as $name => $amount) {
                    $sum += $prices[$name] * $amount; ?>
                <tr>
                  <td>
                    <div class="product_info">
                      <div class="product_detail">
                        <h6><?= $name ?></h6>
                      </div>
                    </div>
                  </td>
                  <td>$<?= $prices[$name] ?></td>
                  <td>
                    <input type="number" value="<?= $amount ?>" min="1">
                  </td>
                  <td>$<?= $prices[$name] * $amount ?></td>
                  <td>
                    <button class="btn btn-danger">Usuń (no tylko spróbuj...)</button>
                  </td>
                </tr>
                <?php 
                  } ?>
                <!-- Możesz dodać więcej produktów tutaj -->
              </tbody>
            </table>
            <div class="total_container">
              <h5>Razem: $<?= $sum ?></h5>
              <button class="btn btn-primary">PŁAĆ!</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end cart section -->

 <!-- info section -->

 <section class="info_section ">
  <div class="info_container ">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="info_contact ">
            <div class="row">
              <div class="col-md-3">
                <a href="https://www.google.pl/maps/place/Belweder,+Wyzwolenia+4c,+43-460+Wisła/@49.6321125,18.9030681,17z/data=!3m1!4b1!4m6!3m5!1s0x4714180f2123972b:0x901510a68a4c0bed!8m2!3d49.6321091!4d18.9056484!16s%2Fg%2F12vrd7s29?entry=ttu" class="link-box">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span>
                    Location
                  </span>
                </a>
              </div>
              <div class="col-md-5">
                <a href="https://www.rp.pl/polityka/art39560041-grzegorz-braun-zgasil-swiece-chanukowe-michal-kobosko-konfederacja-powinna-go-wyrzucic" class="link-box">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span>
                    +48 789-339-114
                  </span>
                </a>
              </div>
              <div class="col-md-4">
                <a href="https://wiadomosci.wp.pl/biden-prawie-spadl-ze-schodow-wszystko-nagraly-kamery-6899909285239680a" class="link-box">
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
            <form action="https://youtu.be/aiHW6BSm_p0?si=Ho-p2WQUbrAilzrY">
              <input type="email" placeholder="no i masz spam" />
              <button>
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
</html>
