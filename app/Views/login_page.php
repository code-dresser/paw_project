
  <!-- Login/Register Section -->
<section class="login_register_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Zaloguj, zarejestruj w/e</h2>
      <p>Zniszcz swoje uzębienie dając nam zarobić!</p>
      <?php
      if(!empty(session()->getFlashData('success_L'))){?>
          <div>
              <?=
                  session()->getFlashData('success_L')
              ?>
          </div>
  <?php
      }else if(!empty(session()->getFlashData('fail_L'))){?>
          <div>
              <?=
                  session()->getFlashData('fail_L')
              ?>
          </div>
      <?php
      }

  ?>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form_container">
          <h3>Zaloguj się</h3>
          <form action="<?= base_url("auth/loginUser") ?>" method='post'>
            <?= csrf_field() ;?>
            <div>
              <span><?= isset($validation) ? display_form_errors($validation,'email') : "" ?></span>
              <input name="email" value="<?= set_value('email') ;?>"  placeholder="email" type='email'>
            </div>
            <div>
              <span><?= isset($validation) ? display_form_errors($validation,'password') : "" ?></span>
              <input name="password" value="<?= set_value('password') ;?>" placeholder="password" type='text'>
            </div>
            <div class="btn-box">
              <button type="submit" class="btn-1">
                Zaloguj się
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form_container">
          <h3>Zarejestruj się</h3>
          <?php
          if(!empty(session()->getFlashData('success'))){?>
              <div>
                  <?=
                      session()->getFlashData('success')
                  ?>
              </div>
      <?php
          }else if(!empty(session()->getFlashData('fail'))){?>
              <div>
                  <?=
                      session()->getFlashData('fail')
                  ?>
              </div>
          <?php
          }

      ?>
          <form action="<?= base_url("auth/registerUser") ?>" method='post'>
            <?= csrf_field() ;?>
            <div>
              <span><?= isset($validation) ? display_form_errors($validation,'firstName') : "" ?></span>
              <input name="firstName" value="<?= set_value('firstName') ;?>"  placeholder="First Name" type='text'>
            </div>
            <div>
              <span><?= isset($validation) ? display_form_errors($validation,'lastName') : "" ?></span>
              <input name="lastName" value="<?= set_value('lastName') ;?>" placeholder="Last Name" type='text'>
            </div>
            <div>
              <span><?= isset($validation) ? display_form_errors($validation,'email') : "" ?></span>
              <input name="email" value="<?= set_value('email') ;?>"  placeholder="email" type='text'>
            </div>
            <div>
              <span><?= isset($validation) ? display_form_errors($validation,'password') : "" ?></span>
              <input name="password" value="<?= set_value('password') ;?>" placeholder="password" type='password'>
            </div>
            <div>
              <span><?= isset($validation) ? display_form_errors($validation,'passwordConf') : "" ?></span>
              <input name="passwordConf" placeholder="confirm password" type='password'>
            </div>
            <div class="btn-box">
              <button type="submit" class="btn-2">
                Zarejestruj się
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
</body>

</html>
