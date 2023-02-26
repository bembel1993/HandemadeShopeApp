CREATE TABLE `products` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`price` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`descrip` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`photo` LONGTEXT NOT NULL COLLATE 'cp1250_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='cp1250_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;


CREATE TABLE `user` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`namesurname` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`password` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`email` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`number` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='cp1250_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `cart` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`productId` INT(10) NULL DEFAULT '0',
	`userId` INT(10) NULL DEFAULT '0',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `productId` (`productId`) USING BTREE,
	INDEX `userId` (`userId`) USING BTREE,
	CONSTRAINT `FK_cart_user` FOREIGN KEY (`userId`) REFERENCES `handmade`.`user` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `FK__products` FOREIGN KEY (`productId`) REFERENCES `handmade`.`products` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='cp1250_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `orders` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nameprod` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`totalprice` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`photo` LONGTEXT NOT NULL COLLATE 'cp1250_general_ci',
	`nameuser` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`emailuser` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`phoneuser` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'cp1250_general_ci',
	`qty` INT(10) NOT NULL DEFAULT '0',
	`cartId` INT(10) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `cartId` (`cartId`) USING BTREE
)
COLLATE='cp1250_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

INSERT INTO `user` ( `namesurname`, `password`, `email`, `number`) VALUES ( 'Duke Nukem', 'password', 'dk@mail', '2223334');
INSERT INTO `user` ( `namesurname`, `password`, `email`, `number`) VALUES ( 'Alex Volk', 'password', 'av@mail', '1234567');
INSERT INTO `user` ( `namesurname`, `password`, `email`, `number`) VALUES ( 'Jhon Smith', 'password', 'jms@mail', '1112223');
INSERT INTO `user` ( `namesurname`, `password`, `email`, `number`) VALUES ( 'Tom Cat', 'aaasss1', 'tc@mail', '1234567');
INSERT INTO `user` ( `namesurname`, `password`, `email`, `number`) VALUES ( 'Liu Khang', 'aaasss1', 'mk@mail', '1231233');

INSERT INTO `products` ( `name`, `price`, `descrip`, `photo`) VALUES ('Purse for man', '50', 'Good purse for use every day', 'https://cdn.shopify.com/s/files/1/0027/5470/7567/collections/1-ust_64dad9da-2d3f-4e6a-8697-9ae458390dd8.jpg?v=1643234105');
INSERT INTO `products` ( `name`, `price`, `descrip`, `photo`) VALUES ( 'Purse for woman', '70', 'Good stuf for woman', 'https://ladybuqart.pl/15114-large_default/handmade-leather-woman-purse-pepa-xl-in-plum-and-claret-color-variation-made-by-ladybuq.jpg');
INSERT INTO `products` ( `name`, `price`, `descrip`, `photo`) VALUES ( 'Bags for woman', '200', 'Modern and style', 'https://i.pinimg.com/474x/5e/c0/7a/5ec07a5349b306344ba0eb74e0f70a2a.jpg');
INSERT INTO `products` ( `name`, `price`, `descrip`, `photo`) VALUES ( 'Sheath', '40', 'Leather sheath for the Knife', 'https://lucasforge.com/wp-content/uploads/2011/01/Nessmuk-in-Sheath-1024x682.jpg');
INSERT INTO `products` ( `name`, `price`, `descrip`, `photo`) VALUES ( 'Keychain', '10', 'Safe your key', 'https://ae01.alicdn.com/kf/H75438d2fbc44412192075f9bc23b3097D/Vintage-Handmade-Cowhide-Leather-Keychain-For-Men-Waist-Hanging-Retro-Pattern-Rope-Key-Chain-Wallet-Car.jpg_Q90.jpg_.webp');
