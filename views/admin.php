
<?php
if($data){
    extract($data);
    ?>
        <?php if($login_status=="access_granted") { ?>
            <p style="color:green">Авторизация прошла успешно.</p>
        <?php } elseif($login_status=="access_denied") { ?>
            <p style="color:red">Логин и/или пароль введены неверно.</p>
    <?php }
}

    if(!isset($_SESSION['admin'])): ?>
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
    <?php else:?>

          <div style="display: flex; align-items: center; justify-content: center;">
                <div>
                    <a href='/book/all'>Список книг</a>
                </div>
                <div style='margin:55px;'>
                    <a href='/author/all'>Список авторов</a>
                </div>
                <div>
                    <a href='/customer/all'>Список покупателей</a>
                </div>
           </div>

    <?php endif;?>