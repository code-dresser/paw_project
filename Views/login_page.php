<html>
<head>
        <meta charset='utf-8'>
</head>
    <body>
       
        <h2> Log in form </h2>
        <hr>
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
        <form  action="<?= base_url("auth/loginUser") ?>" method='post'>
            <?= csrf_field() ;?>
            <span><?= isset($validation) ? display_form_errors($validation,'email') : "" ?></span> <br/>
            <input name="email" value="<?= set_value('email') ;?>"  placeholder="email" type='text'><br/>
            <span><?= isset($validation) ? display_form_errors($validation,'password') : "" ?></span><br/> 
            <input name="password" value="<?= set_value('password') ;?>" placeholder="password" type='text'><br/>
            <input type='submit' value='Zaloguj'>
        </form>

        <h2> Register form </h2>
        <hr>
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
        <form  action="<?= base_url("auth/registerUser") ?>" method='post'>
            <?= csrf_field() ;?>
            <span><?= isset($validation) ? display_form_errors($validation,'firstName') : "" ?></span> <br/>
            <input name="firstName" value="<?= set_value('firstName') ;?>"  placeholder="First Name" type='text'><br/>
            <span><?= isset($validation) ? display_form_errors($validation,'lastName') : "" ?></span><br/> 
            <input name="lastName" value="<?= set_value('lastName') ;?>" placeholder="Last Name" type='text'><br/>

            <span><?= isset($validation) ? display_form_errors($validation,'email') : "" ?></span> <br/>
            <input name="email" value="<?= set_value('email') ;?>"  placeholder="email" type='text'><br/>
            <span><?= isset($validation) ? display_form_errors($validation,'password') : "" ?></span><br/> 
            <input name="password" value="<?= set_value('password') ;?>" placeholder="password" type='text'><br/>
            <span><?= isset($validation) ? display_form_errors($validation,'passwordConf') : "" ?></span><br/> 
            <input name="passwordConf" placeholder="confirm password" type='text'><br/>
            <input type='submit' value='Zarejestruj'>
        </form>

    </body>
</html>