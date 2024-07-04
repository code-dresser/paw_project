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
                        <button class="btn btn-primary">PŁAĆ!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end cart section -->
