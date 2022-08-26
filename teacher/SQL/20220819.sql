-- 加總

SELECT SUM(`price`) FROM `products` WHERE `sid` IN (2,3);

SELECT SUM(`price`) FROM `order_details` WHERE `order_sid`=11;

SELECT SUM(`price` * `quantity`) FROM `order_details` WHERE `order_sid`=11;

-- GROUP BY: 群組

SELECT * FROM `products` GROUP BY `category_sid`;

SELECT `category_sid` FROM `products` GROUP BY `category_sid`; -- MySQL 8

-- 各分類有幾筆產品
SELECT `category_sid`, COUNT(1) FROM `products` GROUP BY `category_sid`;

SELECT 
        p.`category_sid`,
        c.`name` 分類名稱,
        COUNT(1) 筆數
    FROM `products` p
    JOIN `categories` c
        ON p.`category_sid`=c.`sid`
    GROUP BY p.`category_sid`;

SELECT 
        p.`category_sid`,
        c.`name` 分類名稱,
        COUNT(1) 筆數
    FROM `products` p
    LEFT JOIN `categories` c
        ON p.`category_sid`=c.`sid`
    GROUP BY p.`category_sid`;


-- 某一筆訂單的明細
SELECT o.*, od.price, od.quantity, p.bookname FROM `orders` o 
    JOIN `order_details` od ON o.sid=od.order_sid
    JOIN `products` p ON od.product_sid=p.sid
    WHERE o.sid=11;

-- 某一天的訂單
SELECT * FROM `orders` WHERE
	`order_date` > '2016-03-25'
    AND 
    `order_date` < '2016-03-26';

-- 錯誤的寫法
SELECT * FROM `orders` WHERE
	`order_date` > '2016'
    AND 
    `order_date` < '2017';

-- 錯誤的寫法
SELECT * FROM `orders` WHERE
	`order_date` > '2016-03'
    AND 
    `order_date` < '2016-04';

-- 正確的寫法, 三月分的訂單
SELECT * FROM `orders` WHERE
	`order_date` >= '2016-03-01'
    AND 
    `order_date` < '2016-04-01';

-- 某一小時內的訂單
SELECT * FROM `orders` WHERE
	`order_date` >= '2016-03-01 12:00:00'
    AND 
    `order_date` < '2016-04-01 13:00:00';



-- 子查詢
SELECT `product_sid` FROM `order_details` WHERE `order_sid`=11;

SELECT * FROM `products` WHERE `sid` IN 
(
    SELECT `product_sid` FROM `order_details` WHERE `order_sid`=11
);


SELECT 
    p.*, 
    od.quantity,
    od.price od_price 
FROM `products` p
JOIN 
(
    SELECT * FROM `order_details` WHERE `order_sid`=11
) od
ON p.sid=od.product_sid;


-- VIEW

CREATE VIEW product_cate_view AS
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    JOIN `categories` c
    ON  p.category_sid=c.sid;