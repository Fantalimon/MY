<?php
$menus = [
    'multi' => 'Таблица умножния',
    'calc' => 'Калькулятор',
//    'menu3' => 'Menu 3',
//    'menu4' => 'Menu 4'
];
?>
<nav>
    <ul>
        <?php foreach ($menus as $key => $menu): ?>
            <li>
                <a href="index_new_new.php?id=<?php echo $key?>">
                    
                    <?php echo $menu ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
