<?php
$menus = [
    'multi' => 'Таблица умножния',
    'calc' => 'Калькулятор',
    'quiz' => 'Тест',
    'Users'=>'All Users'
//    'menu3' => 'Menu 3',
//    'menu4' => 'Menu 4'
];
?>
<nav>
    <ul>
        <?php foreach ($menus as $key => $menu): ?>
            <li>
                <a href="index.php?id=<?php echo $key?>">
                    
                    <?php echo $menu ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
