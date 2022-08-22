
    <?php 
    $ar3 = array(
        'name' => 'John',
        2,
        'age' => 25,
        4, 6
    );
    foreach($ar3 as $k=>$v){ //foreac很重要一定要會~~這樣是取道V的值
        echo "<div>$k: $v</div>"; //為什麼會印出1:4和2:6→照索引值順序0、1、2
    }
    ?>
