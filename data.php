CREATE DATABASE content;

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
   `type` varchar(255) NOT NULL, 
  `code`  varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
)


CREATE TABLE `users` (

 

`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,

 `username` VARCHAR( 100 ) NOT NULL ,

 `password` VARCHAR( 100 ) NOT NULL ,

 `online` INT( 100 ) NOT NULL ,

 `email` VARCHAR( 100 ) NOT NULL ,

 `active` INT( 10 ) NOT NULL ,

 `rtime` INT( 100 ) NOT NULL

 

) 

//tblproduct

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(500)  ,

  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
)



INSERT INTO `products` ( `name`, `code`, `image`, `price`,`quantity`,`type` ) VALUES
( 'ASUS K550', 'lap1', 'product-images/lap1.jpg', '25000.00','10','laptop'),
('ASUS K555', 'lap2', 'product-images/lap2.jpg', '28000.00','10','laptop'),
('ASUS K565', 'lap3', 'product-images/lap3.jpg', '30000.00','10','laptop'),
('ASUS K552', 'lap4', 'product-images/lap4.jpg', '33000.00','10','laptop'),
('HP probook', 'lap5', 'product-images/lap5.jpg', '38000.00','10','laptop'),
('HP probook', 'lap6', 'product-images/lap6.jpg', '48000.00','10','laptop'),
('DELL Vostro', 'lap7', 'product-images/lap7.jpg', '52000.00','10','laptop'),
('DELL Vostro', 'lap8', 'product-images/lap8.jpg', '60000.00','10','laptop'),
('ACER', 'lap9', 'product-images/lap9.jpg', '68000.00','10','laptop'),
('ACER', 'lap10', 'product-images/lap10.jpg', '77000.00','10','laptop');




INSERT INTO `products` ( `name`, `code`, `image`, `price`,`quantity`,`type` ) VALUES
( 'CANON 50D', 'dslr1', 'product-images/dslr1.jpg', '25000.00','10','dslr'),
('CANON 60D', 'dslr2', 'product-images/dslr2.jpg', '28000.00','10','dslr'),
('CANON 70D', 'dslr3', 'product-images/dslr3.jpg', '30000.00','10','dslr'),
('CANON 80D', 'dslr4', 'product-images/dslr4.jpg', '33000.00','10','dslr'),
('CANON 90D', 'dslr5', 'product-images/dslr5.jpg', '38000.00','10','dslr'),
('CANON 100D', 'dslr6', 'product-images/dslr6.jpg', '48000.00','10','dslr'),
('CANON 110D', 'dslr7', 'product-images/dslr7.jpg', '52000.00','10','dslr'),
('CANON 120D', 'dslr8', 'product-images/dslr8.jpg', '60000.00','10','dslr'),
('CANON 130D', 'dslr9', 'product-images/dslr9.jpg', '68000.00','10','dslr'),
('CANON 150D', 'dslr10', 'product-images/dslr10.jpg', '77000.00','10','dslr');




INSERT INTO `products` ( `name`, `code`, `image`, `price`,`quantity`,`type` ) VALUES
( 'ASUS  ', 'mon1', 'product-images/mon1.jpg', '25000.00','10','monitor'),
('ASUS  ', 'mon2', 'product-images/mon2.jpg', '28000.00','10','monitor'),
('ASUS  ', 'mon3', 'product-images/mon3.jpg', '30000.00','10','monitor'),
('ASUS ', 'mon4', 'product-images/mon4.jpg', '33000.00','10','monitor'),
('HP  ', 'mon5', 'product-images/mon5.jpg', '38000.00','10','monitor'),
('HP  ', 'mon6', 'product-images/mon6.jpg', '48000.00','10','monitor'),
('DELL  ', 'mon7', 'product-images/mon7.jpg', '52000.00','10','monitor'),
('DELL  ', 'mon8', 'product-images/mon8.jpg', '60000.00','10','monitor'),
('ACER', 'mon9', 'product-images/mon9.jpg', '68000.00','10','monitor'),
('ACER', 'mon10', 'product-images/mon10.jpg', '77000.00','10','monitor');



INSERT INTO `products` ( `name`, `code`, `image`, `price`,`quantity`,`type` ) VALUES
( 'CANON 50D', 'print1', 'product-images/print1.jpg', '25000.00','10','printer'),
('CANON 60D', 'print2', 'product-images/print2.jpg', '28000.00','10','printer'),
('CANON 70D', 'print3', 'product-images/print3.jpg', '30000.00','10','printer'),
('CANON 80D', 'print4', 'product-images/print4.jpg', '33000.00','10','printer'),
('CANON 90D', 'print5', 'product-images/print5.jpg', '38000.00','10','printer'),
('CANON 100D', 'print6', 'product-images/print6.jpg', '48000.00','10','printer'),
('CANON 110D', 'print7', 'product-images/print7.jpg', '52000.00','10','printer'),
('CANON 120D', 'print8', 'product-images/print8.jpg', '60000.00','10','printer'),
('CANON 130D', 'print9', 'product-images/print9.jpg', '68000.00','10','printer'),
('CANON 150D', 'print10', 'product-images/print10.jpg', '77000.00','10','printer');
