<section class="login_register_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>HISTORIA ZAMÓWIEŃ</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
        <?php
            if(!empty(session()->getFlashData('fail'))){?>
                <div>
                    <?=
                        session()->getFlashData('fail')
                    ?>
                </div>
            <?php
            }

        ?>
            <div class="form_container form_center">
                <form  action="<?= base_url("/admin_history");?>" method="POST">
                <div>
                    <input type="text" placeholder="ID Zamówienia" id="id_zamowienia_admin_history" name="id_zamowienia_admin_history"/>
                </div>
                <div>
                    <input type="text" placeholder="ID Klienta" id="id_klienta_admin_history" name="id_klienta_admin_history"/>
                </div>
                <div class="btn-box">
                    <button type="submit" class="btn-2">
                        Wyszukaj
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($orderHistory)): ?>
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderHistory as $order): ?>
                        <tr>
                            <td><?= esc($order['orderID']) ?></td>
                            <td><?= esc($order['name']) ?></td>
                            <td><?= esc($order['qty']) ?></td>
                            <td><?= esc($order['total'] . ' $') ?></td>
                            <td><?= esc($order['created_at']) ?></td>
                            <td><?= esc($order['customersID']) ?></td>
                            <td><?= esc($order['customer']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
  </div>
</section>
