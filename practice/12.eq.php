<pre>
    <?php 
    $ar3 = [
        'name' => 'John',
        'age' => 25,
    ];

    $ar4 = $ar3; //複製後再設定
    $ar5 = &$ar3; //設定位址(類似JS的參照)，$ar5是$ar3的別名

    $ar3['age'] = 32;

    print_r($ar3); //被上面改成32了?
    print_r($ar4);
    print_r($ar5);

    $a = 10;
    $b = &$a; //設定位址
    $b = 5;
    var_dump($a); // 蝦?

    ?>
</pre>