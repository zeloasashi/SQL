--可以做商品被點擊，頁數就+1的監聽動作
UPDATE `products` SET `pages`=`pages`+1 WHERE sid = 1

-- JOIN合併查詢，純查詢用，實際不這樣做，因為如果商品上萬件很吃效能
-- https://ithelp.ithome.com.tw/articles/10215741
SELECT * FROM `products` JOIN `categories`;

SELECT * FROM `products` 
    JOIN `categories` 
    ON  products.category_sid=`categories`.sid;

-- 因主鍵重複，重新調整商品種類與分類名稱：選取所有的商品，將商品的種類和名稱和分類結合，讓商品與分類的主鍵資料=分類裡的主鍵
SELECT `products`.*, `categories`.`name` FROM `products`
    JOIN`categories`
    ON products.category_sid=`categories`.sid;

--別名
SELECT p.*, c.`name` FROM `products` AS p
    JOIN `categories` AS c
    ON p.categories_sid=c.sid;

SELECT p.*, c.`name` FROM `products` p
    JOIN `categories` c
    ON p.category_sid=c.sid;

SELECT p.*, c.`name` 分類名稱 FROM `products` p
    JOIN `categories` c
    ON p.category_sid=c.sid;

-- left join，不會QQ
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON p.category_sid=c.sid;

SELECT p.*, c.`name` 分類名稱 FROM `categories` c
    LEFT JOIN `products` p
    ON p.category_sid=c.sid;

-- NULL 設定空值
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON p.category_sid=c.sid
    WHERE c.`name` IS NULL -- 一個句子(指令?)只能有一個WHERE(只能設定一個條件)

SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON p.category_sid=c.sid
    WHERE c.`name` IS NOT NULL 

-- 模糊查詢，常用!!
SELECT * FROM `products` WHERE `autohor` LIKE '平田'; -- 這樣查不到東西，要加%，且最好前後都加

SELECT * FROM `products` WHERE `author` LIKE '%陳%';
SELECT * FROM `products` WHERE `author` LIKE '%陳%' AND `bookname` LIKE '%陳%'; --這樣查不到東西，因為是作者和書名都要有陳
SELECT * FROM `products` WHERE `author` LIKE '%科技%' OR `bookname` LIKE '%科技%'; --這樣是作者或書名有科技

-- LIMIT 分頁，第一個是索引值(從哪一筆開始，是從0開始)，第二個是一頁出現幾筆資料
SELECT * FROM `products` LIMIT 6,5;

-- WHERE IN 將商品加入購物車時?
-- 這個指令是跑迴圈，所以呈現結果不會照打的順序，而是由小到大排序
SELECT * FROM `products` WHERE `sid` IN (6, 2, 3,);

--計算筆數
SELECT COUNT(1) FROM `products` -- 取得總筆數
SELECT COUNT(1) FROM `products` WHERE `category_sid`=1; -- 商品中種類是1的筆數
SELECT COUNT(1) num FROM `products`; --設計名稱為num

