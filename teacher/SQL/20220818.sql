
-- 累加
UPDATE `products` SET `pages`=`pages`+1 WHERE sid=1

-- 合併查詢

SELECT * FROM `products` JOIN `categories`;

SELECT * FROM `products` 
    JOIN `categories` 
    ON  products.category_sid=`categories`.sid;


SELECT `products`.*, `categories`.`name` FROM `products` 
    JOIN `categories` 
    ON  products.category_sid=`categories`.sid;

-- 別名

SELECT p.*, c.`name` FROM `products` AS p
    JOIN `categories` AS c
    ON  p.category_sid=c.sid;

SELECT p.*, c.`name` FROM `products` p
    JOIN `categories` c
    ON  p.category_sid=c.sid;


SELECT p.*, c.`name` 分類名稱 FROM `products` p
    JOIN `categories` c
    ON  p.category_sid=c.sid;

-- left join

SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON  p.category_sid=c.sid;

SELECT p.*, c.`name` 分類名稱 FROM `categories` c
    LEFT JOIN `products` p
    ON  p.category_sid=c.sid;

-- NULL
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON  p.category_sid=c.sid
    WHERE c.`name` IS NULL

SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON  p.category_sid=c.sid
    WHERE c.`name` IS NOT NULL

-- 模糊查詢

SELECT * FROM `products` WHERE `author` LIKE '平田';

SELECT * FROM `products` WHERE `author` LIKE '平田%';

SELECT * FROM `products` WHERE `author` LIKE '%陳%';

SELECT * FROM `products` WHERE `author` LIKE '%陳%' OR `bookname` LIKE '%陳%';

SELECT * FROM `products` WHERE `author` LIKE '%科技%' OR `bookname` LIKE '%科技%';

--
SELECT * FROM `products` WHERE `sid` IN (6, 2, 3, 100);


-- 計算筆數
SELECT COUNT(1) FROM `products`;

SELECT COUNT(1) FROM `products` WHERE `category_sid`=1;

SELECT COUNT(1) num FROM `products`;
