<!-- cart section -->
<section class="cart_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Kosz</h2>
            <p>Czemu tylko tyle? Ja mam horom curke!</p>
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
                                <th>Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sum = 0;
                            if ($items != NULL) {
                                foreach ($items as $item) {
                                    $subtotal = $item['price'] * $item['qty'];
                                    echo "<tr>
                                            <td>{$item['name']}</td>
                                            <td>{$item['price']} $</td>
                                            <td>
                                                <form action='" . base_url("/cart/update/{$item['id']}") . "' method='post'>
                                                    <select name='qty' onchange='this.form.submit()'>";
                                    for ($i = 1; $i <= 20; $i++) {
                                        $selected = ($item['qty'] == $i) ? 'selected' : '';
                                        echo "<option value='{$i}' {$selected}>{$i}</option>";
                                    }
                                    
                                    echo "</select>
                                                </form>
                                            </td>
                                            <td>{$subtotal} $</td>
                                            <td>
                                                <form action='" . base_url("/cart/delete/{$item['id']}") . "' method='post'>
                                                    <button class='btn btn-danger'>Usuń (no tylko spróbuj...)</button>
                                                </form>
                                            </td>
                                        </tr>";
                                    
                                    $sum += $subtotal;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="total_container">
                        <h5 id="Total">Razem: <?= $sum ?> $</h5>
                    </div>
                    <?php if (session()->has("loggedInUser")) { ?>
                    <!-- cart delivery form -->
                    <div class="delivery_form_container">        
                        <?php if(!empty(session()->getFlashData('success'))){?>
                            <div> <?= session()->getFlashData('success') ?> </div>
                        <?php
                        }else if(!empty(session()->getFlashData('fail'))){?>
                            <div><?= session()->getFlashData('fail')?> </div>
                        <?php } ?>
                        <form action="<?= base_url('/order/submit') ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Imię i nazwisko</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= ($user != NULL) ? $user['firstName'] . " ". $user['lastName'] : "" ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= ($user != NULL) ? $user['email'] : "" ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Adres</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="city">Miasto</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="form-group">
                                <label for="postal_code">Kod pocztowy</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefon</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?= ($user != NULL) ? $user['Phone'] : "" ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="delivery_method">Forma dostawy</label>
                                <select class="form-control" id="delivery_method" name="delivery_method" required>
                                    <option value="courier">Kurier</option>
                                    <option value="pickup">Odbiór osobisty</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment_method">Forma płatności</label>
                                <select class="form-control" id="payment_method" name="payment_method" required>
                                    <option value="credit_card">Karta kredytowa</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="bank_transfer">Przelew bankowy</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Złóż zamówienie</button>
                        </form>
                        <?php }
                              else {
                                echo "<a href='" . base_url("/login") . "' style='margin:auto' class='btn btn-info'>Zaloguj się aby kontunuować zakupy</a>";
                              }?>
                    </div>
            <!-- end cart delivery form -->
            
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end cart section -->
