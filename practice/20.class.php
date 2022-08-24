<?php 
// 講義P.17-19
// 1.簡單類別
// 若先不考慮繼承，類別的定義語法如下：
// class 類別名稱 //類別定義的標頭
// {
// 屬性宣告
// 建構函式定義
// ⽅法定義
// }




// 這個範例是設定類別的方法?

// 「方法」其實就是函式，主要區別是：方法屬於物件，函式則是全域的。在修飾字方面，使用private 表示私有方法，否則為公開方法。類別定義中，除了「宣告並指定屬性的敘述」可以直接放在類別內，其餘敘述都應該放在方法內。
    class Person{
        public $name;
        public $age;
        function __construct($name, $age = 18) // 要設參數的放前面，有預設值的放後面，不然會壞掉
        // 也可以兩個都設參數
        {
            $this->name = $name; //把參數(區域變數)設定到屬性
            $this->age = $age;
        }

        function getJSON(){
            return json_encode([
                'name' => $this->name,
                'age' => $this->age,
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    $p1 = new Person('Peter'); // 兩個都設參數的話這邊改成 $p1 = new Person('Peter', 20)
    echo $p1->getJSON();

?>