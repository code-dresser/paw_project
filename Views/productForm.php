<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          <?= isset($product) ? "EDYTUJ" : "DODAJ" ?> PRODUKT
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="detail-box">
              <?=  form_open_multipart('/saveProduct')?>
                <input type='hidden' name='id' value='<?=isset($product) ? $product['ID'] : "NULL"  ?>' >
                <div class="form-group">
                  <label for="productName">Nazwa Produktu:</label>
                  <input type="text" id="productName" name="productName" class="form-control" value='<?= isset($product) ? $product['productTitle'] : '' ?>' required >
                </div>
                <div class="form-group">
                  <label for="productDescription">Opis Produktu:</label>
                  <textarea id="productDescription" name="productDescription" class="form-control" rows="3" value='<?= isset($product) ? $product['productDescription'] : '' ?>' ></textarea>
                </div>
                <div class="form-group">
                  <label for="productPrice">Cena:</label>
                  <input type="number" id="productPrice" name="productPrice" class="form-control" placeholder="1.0" step="0.01" min="0" value='<?= isset($product) ? $product['productPrice'] : '' ?>' required>
                </div>
                <div class="form-group">
                  <label for="productImage">Zdjęcie Produktu:</label>
                  <input type="file" id="productImage" name="productImage" class="form-control-file" value='<?= isset($product) ? $product['productImage'] : '' ?>' >
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary"><?= isset($product) ? "Zapisz" : "Dodaj" ?> Produkt</button>
                </div>
              </form>
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
