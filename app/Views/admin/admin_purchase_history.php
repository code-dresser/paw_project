<section class="login_register_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>HISTORIA ZAMÓWIEŃ</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form_container form_center">
                <form action="seller_history.php" method="POST">
                <div>
                    <input type="text" placeholder="id_zamowienia" id="id_zamowienia_admin_history" name="id_zamowienia_admin_history"/>
                </div>
                <div>
                    <input type="text" placeholder="id_klienta" id="id_klienta_admin_history" name="id_klienta_admin_history"/>
                </div>
                <div>
                    <input type="data" placeholder="data_zamowienia" id="data_zamowienia_admin_history" name="data_zamowienia_admin_history"/>
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
</section>