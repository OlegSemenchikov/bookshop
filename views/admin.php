
<?php

use System\View;

    ?>
    <?php if($data&&isset($data['message_fail'])){ ?>
        <p style="color:red"><?= $data['message_fail'];?></p>
    <?php } elseif($data&&isset($data['message_success'])) { ?>
        <p style="color:green"><?= $data['message_success'];?></p>
    <?php }


    if(!isset($_SESSION['admin'])){ ?>
        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; margin-top: 100px">

            <form action="/admin/login" method="post">
                <p>
                    <input type="text" name="login" placeholder="login">
                </p>
                <p>
                    <input type="password" name="password" placeholder="password">
                </p>
                <p>
                    <input type="submit" value="Войти" name="btn" style="width: 147px; height: 26px;">
                </p>
            </form>
        </div>
    <?php } else {

        try {
            View::render('topMenuAdmin');
        }catch (\ErrorException $e) {
            echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
        }

    }?>



