
-- 註解

INSERT INTO `address_book`
(`sid`, `name`, `mobile`, `email`, `address`, `created_at`)
VALUES 
(NULL, '李小明3', '0918123456', 'ming@good.com', '台北市', NOW());

INSERT INTO `address_book`
(`name`, `mobile`, `email`, `address`, `created_at`)
VALUES 
('李小明4', '0918123456', 'ming@good.com', '台北市', NOW());


INSERT INTO `address_book`
(`sid`, `name`, `mobile`, `email`, `address`, `created_at`)
VALUES 
(NULL, '李小明5', '', 'ming@good.com', '台北市', NOW());

-- 多筆

INSERT INTO `address_book`
(`sid`, `name`, `mobile`, `email`, `address`, `created_at`)
VALUES 
(NULL, '李小明6', '0918123456', 'ming@good.com', '台北市', NOW()),
(NULL, '李小明7', '0918123456', 'ming@good.com', '台北市', NOW()),
(NULL, '李小明8', '0918123456', 'ming@good.com', '台北市', NOW()),
(NULL, '李小明9', '0918123456', 'ming@good.com', '台北市', NOW()),
(NULL, '李小明10', '0918123456', 'ming@good.com', '台北市', NOW()),
(NULL, '李小明11', '0918123456', 'ming@good.com', '台北市', NOW()),
(NULL, '李小明12', '0918123456', 'ming@good.com', '台北市', NOW());


-- 刪除
DELETE FROM `address_book` WHERE `sid` = 16;

-- 全部刪除
DELETE FROM `address_book`;

-- 修改
UPDATE `address_book` 
    SET `mobile` = '0918000222' 
    WHERE `sid` = 17;

UPDATE `address_book` SET `mobile` = '0918-000-000';

-- 排序
SELECT * FROM `address_book` ORDER BY `sid` ASC; -- 升冪
SELECT * FROM `address_book` ORDER BY `sid`; -- 升冪
SELECT * FROM `address_book` ORDER BY `sid` DESC; -- 降冪

SELECT * FROM `address_book` ORDER BY `name` ASC, `sid` DESC;
SELECT * FROM `address_book` ORDER BY `name`, `sid` DESC;