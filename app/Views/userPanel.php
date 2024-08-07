
  <!-- User Panel Section -->
  <section class="user_panel_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Panel Użytkownika</h2>
        <br /> <br />
      </div>
      <div class="row">
        <!-- User Information -->
        <div class="col-md-4">
          <div class="form_container">
            <!-- INFORMACJE O USER WERSJA Z MOŻLIWOŚCIĄ EDYCJI -->
             <!-- NIE WIEM CZY DAJEMY TAKĄ OPCJĘ -->
            <h3>Informacje o użytkowniku</h3>
            <form method='post' action="<?= base_url("/userPanel");?>"> 
              <div>
                <input type="text" placeholder="Imię" name="first_name" value="<?= $user['firstName'] ?>" />
              </div>
              <div>
                <input type="text" placeholder="Nazwisko" name="last_name" value="<?= $user['lastName'] ?>" />
              </div>
              <div>
                <input type="email" placeholder="E-mail" name="email" value="<?= $user['email'] ?>" />
              </div>
              <div>
                <input type="text" placeholder="Telefon" name="phone" value="<?= $user['Phone'] ?>" />
              </div>
              <div class="btn-box">
                <button type="submit" class="btn-1">
                  Edytuj dane
                </button>
              </div>
            </form>

            <!-- INFORMACJE O USER WERSJA BEZ MOŻLIWOŚCIĄ EDYCJI -->
            <!-- <form> 
                <div>
                  <input type="text" placeholder="Imię" name="first_name" value="Jan" readonly />
                </div>
                <div>
                  <input type="text" placeholder="Nazwisko" name="last_name" value="Kowalski" readonly />
                </div>
                <div>
                  <input type="email" placeholder="E-mail" name="email" value="jan.kowalski@example.com" readonly />
                </div>
                <div>
                  <input type="text" placeholder="Telefon" name="phone" value="123-456-789" readonly />
                </div>
              </form> -->

          </div>
        </div>

        <!-- Historia zakupów -->
         <!-- STATUS WYKOMENTOWANY BO NIE WIEM CZY W BAZIE MAMY TAKIE COŚ -->
        <div class="col-md-8">
          <div class="purchase_history_container">
            <h3>Historia Zakupów</h3>
            <table class="table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <!-- <th>Status</th> -->
                </tr>
              </thead>
              <tbody>
                <?php foreach ($orderHistory as $order): ?>
                  <tr>
                  <td><?= esc($order['created_at']) ?></td>
                  <td><?= esc($order['name']) ?></td>
                  <td><?= esc($order['qty']) ?></td>
                  <td><?= esc($order['total']. ' $') ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
