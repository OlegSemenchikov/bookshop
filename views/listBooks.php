<h2>Список всех книг</h2>

    <?php //debug($data);?>


<div>
    <?php if(count($data)>0){
        $i = 0;
        foreach ($data as $item): ?>
            <div>
                    <span><?= ++$i; ?></span>
                    <span><?= $item['title']; ?></span>
            </div>

            <br/>
    <?php endforeach;} else {?>
        <p>
            <span>В данный момент в магане НЕТ книг.</span>
        </p>
    <?php }?>

        <p>
            <a href='/book/create'>Создать новую книгу</a>
        </p>
</div>