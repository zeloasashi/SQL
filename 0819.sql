-- 金額加總
SELECT SUM(`price`) FROM `products` WHERE `sid` IN (2,3);

SELECT SUM(`price`) FROM `order_details` WHERE `order_sid`=11; --訂單明細的金額

SELECT SUM(`price` * `quantity`) FROM `order_details` WHERE `order_sid`=11; -- 金額*數量

-- GROUP BY 群組，通常會和COUNT一起使用
SELECT * FROM `products` GROUP BY `category_sid`;

SELECT `category_sid` FROM `products` GROUP BY `categories_sid`; -- MySQL8的用法，打上面會出現錯誤訊息

SELECT `category_sid`, COUNT(1) FROM `products` GROUP BY `category_sid`; -- 各分類總共有幾筆產品

-- 求分類名稱和該分類筆數
SELECT 
        p.`category_sid`,
        c.`name` 分類名稱,
        COUNT(1) 筆數
    FROM `products` p
    JOIN `categories` c
        ON p.`category_sid`=c.`sid`
    GROUP BY p.`category_sid`;

-- 為什麼會出現20且為什麼20是空值?  老師自己改的

-- 所有資料都可能一對一/一對多/多對多

--取得一筆訂單的內容
SELECT o.*, od.price, od.quantity, p.bookname FROM `orders` o
-- 搜尋訂單中的全部資料和訂單詳細價格、訂單詳細數量、商品書名
    JOIN `order_details` od ON o.sid=od.order_sid
    JOIN `products` p ON od.product_sid=p.sid
    WHERE o.sid=11;

--取得某時間的訂單，一定要寫年-月-日，不能只寫年或只寫年-月，都會跑不出來
-- 取得2016-03-25的訂單
SELECT * FROM `orders` WHERE
	`order_date` > '2016-03-25'
    AND 
    `order_date` < '2016-03-26';
-- 取得2016年03月的訂單
SELECT * FROM `orders` WHERE
    `order_date` >= '2016-03-01'
    AND
    `order_date` < '2016-04-01'
-- 取得2016年3月12:00-13:00的訂單
SELECT * FROM `orders` WHERE
    `order_date` >= '2016-03-01 12:00:00'
    AND
    `order_date` < '2016-04-01 13:00:00';

-- 2017 年之後的訂單
SELECT *
    FROM `orders`
    WHERE `order_date` > '2017-01-01';

-- 2016年的訂單
SELECT * FROM `orders` WHERE
	`order_date` > '2016-01-01'
    AND 
    `order_date` < '2016-12-31';

-- 錯誤的寫法，不能只寫年
SELECT * FROM `orders` WHERE
	`order_date` > '2016'
    AND 
    `order_date` < '2017';

-- 錯誤的寫法，不能只寫年-月，一定要寫年-月-日
SELECT * FROM `orders` WHERE
	`order_date` > '2016-03'
    AND 
    `order_date` < '2016-04';

-- 子查詢 https://ithelp.ithome.com.tw/articles/10219497

SELECT `product_sid` FROM `order_details` WHERE `order_sid`=11;
SELECT * FROM `products` WHERE `sid` IN
(
    SELECT `product_sid` FROM `order_details` WHERE `order_sid`=11 -- ()內不能有分號，要放在外面
);
-- 講義寫法
SELECT `product_sid`
    FROM `order_details`
    WHERE `order_sid` = 11;
SELECT *
    FROM `products`
    WHERE sid IN (
        SELECT `product_sid`
        FROM `order_details`
        WHERE `order_sid` = 11
);
SELECT p.*, od.price od_price
    FROM products p
    JOIN
    (SELECT `product_sid`, `price` FROM `order_details`
        WHERE `order_sid` = 11) od --子查詢的record select? 一定要設定別名
    ON p.sid = od.product_sid;
-- 款式，型號，顏⾊
-- 購物⾞：多種型態的商品、多個購物⾞
-- 解釋「標籤」資料表結構

-- 老師上課寫法
SELECT
    p.*,
    od.quantity,
    od.price od_price
FROM `products` p
JOIN
(
    SELECT * FROM `order_details` WHERE `order_sid`=11
)od
ON p.sid=od.product_sid;

-- VIEW 檢視表
CREATE VIEW product_cate_view AS -- 要幫要VIEW的東西取別名
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    JOIN `categories` c
    ON p.category_sid=c.sid;