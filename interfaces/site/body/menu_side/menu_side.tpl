<ul class="menu menu_side">
    <?php
    $print_items = function($items)use(&$print_items){
        foreach($items as $item){
            $active = $item['active']->int();
            $class = $active==0? '' : ($active==1 ? 'is-active' : 'has-active');
            echo '<li class="menu__item '.$class.'"><a class="menu__link" href="'.$item['url'].'">';
//            if ($item['icon']->bool()){
//                echo '<img class="menu__icon" src="'.$item['icon'].'" alt="">';
//            }
            echo '<span class="menu__label">'.$item['title'].'</span></a>';
            if (isset($item['children'])){
                echo '<ul class="menu__sub">';
                $print_items($item['children']);
                echo '</ul>';
            }
            echo '</li>';
        }
    };
    $print_items($v['items']);
?></ul>