INSERT INTO `address_book` 
(`id`, `name`, `mobile`, `email`, `birthday`, `address`, `created_at`) 
VALUES 
(NULL, '林新德', '0956911036', 'shinder.lin@gmail.com', '2022-06-01', '和平東路一段', '2022-08-16 12:05:08');

-- 生日可以是空值，所以可以直接刪掉或是空字串' '
-- 其他欄位如果刪掉，windows雖然會跳錯誤訊息但可以新增，mac不能新增

INSERT INTO `address_book` 
(`id`, `name`, `mobile`, `email`, `address`, `created_at`) 
VALUES 
(NULL, '陳思芳', '0956911036', 'f8919@gmail.com', '和平東路一段', '2022-08-16 12:05:08');

INSERT INTO `address_book` 
(`id`, `name`, `email`, `birthday`, `address`, `created_at`) 
VALUES 
(NULL, '劉國良', 'bettercalleason@gmail.com', '2022-06-01', '和平東路一段', '2022-08-16 12:05:08');

INSERT INTO `address_book` 
(`id`, `name`, `email`, `birthday`, `address`, `created_at`) 
VALUES 
(NULL, '王緯辰', 'eddie@gmail.com', '', '和平東路一段', '2022-08-16 12:05:08');

INSERT INTO `address_book` 
(`id`, `name`, `email`, `birthday`, `address`, `created_at`) 
VALUES 
(NULL, '小童', 'Andy@gmail.com', '', '和平東路一段', NOW());

-- 一次新增多筆資料(注意有資料上限)

INSERT INTO `address_book` 
(`id`, `name`, `mobile`, `email`, `birthday`, `address`, `created_at`) 
VALUES 
(NULL, '陳思芳2', '0956911036', 'f8919@gmail.com', ' ', '和平東路一段', NOW()),
(NULL, '劉國良2', '0956911036', 'bettercalleason@gmail.com', '2022-06-01', '和平東路一段', NOW()),
(NULL, '王緯辰2', '0956911036', 'eddie@gmail.com', ' ', '和平東路一段', NOW()),
(NULL, '小童2', '0956911036', 'Andy@gmail.com', ' ', '和平東路一段', NOW());

--刪除
DELETE FROM `address_book` WHERE 0 -- where 0 表示false，所以不會刪除
DELETE FROM `address_book` WHERE `id` = 1; --表示刪除第一個id的資料
-- 全部刪除
DELETE FROM `address_book` ;

-- 修改，如果沒加where限定條件就是全都改
UPDATE `address_book` SET  `mobile` = '0918000222' WHERE `id` = 10;

-- 排序
SElECT * FROM `address_book` ORDER BY `id` ASC; -- ASC打不打都是升冪(由小到大)
SElECT * FROM `address_book` ORDER BY `id` DESC; --降冪(由大到小)
-- 限定條件排序
SELECT * FROM `address_book` ORDER BY `name` ASC, `id` DESC;
SELECT * FROM `address_book` ORDER BY `name`, `id` DESC;