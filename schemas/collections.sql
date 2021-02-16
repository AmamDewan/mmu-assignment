CREATE TABLE `eshop`.`roles` (
  `roleId` BIGINT NOT NULL AUTO_INCREMENT,
  `roleName` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`roleId`)
);

CREATE TABLE `eshop`.`user` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL,
  `passwordHash` VARCHAR(32) NOT NULL,
  `userRole` BIGINT NULL,
  `registeredAt` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userRole`) REFERENCES `eshop`.`roles`(`roleId`),
  UNIQUE INDEX `uq_email` (`email` ASC) 
);

CREATE TABLE `eshop`.`product` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(75) NOT NULL,
  `slug` VARCHAR(100) NOT NULL,
  `sku` VARCHAR(100) NOT NULL,
  `imgUrl` VARCHAR(100) NOT NULL,
  `price` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uq_slug` (`slug` ASC)
);

CREATE TABLE `eshop`.`category` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `parentId` BIGINT NULL DEFAULT NULL,
  `title` VARCHAR(75) NOT NULL,
  `slug` VARCHAR(100) NOT NULL,
  `imgUrl` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));
  
ALTER TABLE `eshop`.`category` 
ADD INDEX `idx_category_parent` (`parentId` ASC);
ALTER TABLE `eshop`.`category` 
ADD CONSTRAINT `fk_category_parent`
  FOREIGN KEY (`parentId`)
  REFERENCES `eshop`.`category` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

CREATE TABLE `eshop`.`product_category` (
  `productId` BIGINT NOT NULL,
  `categoryId` BIGINT NOT NULL,
  PRIMARY KEY (`productId`, `categoryId`),
  INDEX `idx_pc_category` (`categoryId` ASC),
  INDEX `idx_pc_product` (`productId` ASC),
  CONSTRAINT `fk_pc_product`
    FOREIGN KEY (`productId`)
    REFERENCES `eshop`.`product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pc_category`
    FOREIGN KEY (`categoryId`)
    REFERENCES `eshop`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `eshop`.`cart` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `userId` BIGINT NULL DEFAULT NULL,
  `status` SMALLINT(6) NOT NULL DEFAULT 0,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL,
  `line1` VARCHAR(50) NULL DEFAULT NULL,
  `line2` VARCHAR(50) NULL DEFAULT NULL,
  `city` VARCHAR(50) NULL DEFAULT NULL,
  `province` VARCHAR(50) NULL DEFAULT NULL,
  `country` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_cart_user` (`userId` ASC),
  CONSTRAINT `fk_cart_user`
    FOREIGN KEY (`userId`)
    REFERENCES `eshop`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `eshop`.`cart_item` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `productId` BIGINT NOT NULL,
  `cartId` BIGINT NOT NULL,
  `sku` VARCHAR(100) NOT NULL,
  `price` FLOAT NOT NULL DEFAULT 0,
  `quantity` SMALLINT(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `idx_cart_item_product` (`productId` ASC),
  CONSTRAINT `fk_cart_item_product`
    FOREIGN KEY (`productId`)
    REFERENCES `eshop`.`product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

ALTER TABLE `eshop`.`cart_item` 
ADD INDEX `idx_cart_item_cart` (`cartId` ASC);
ALTER TABLE `eshop`.`cart_item` 
ADD CONSTRAINT `fk_cart_item_cart`
  FOREIGN KEY (`cartId`)
  REFERENCES `eshop`.`cart` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

CREATE TABLE `eshop`.`order` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `userId` BIGINT NULL DEFAULT NULL,
  `total` FLOAT NOT NULL DEFAULT 0,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL,
  `line1` VARCHAR(50) NULL DEFAULT NULL,
  `line2` VARCHAR(50) NULL DEFAULT NULL,
  `city` VARCHAR(50) NULL DEFAULT NULL,
  `province` VARCHAR(50) NULL DEFAULT NULL,
  `country` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_order_user` (`userId` ASC),
  CONSTRAINT `fk_order_user`
    FOREIGN KEY (`userId`)
    REFERENCES `eshop`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `eshop`.`order_item` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `productId` BIGINT NOT NULL,
  `orderId` BIGINT NOT NULL,
  `sku` VARCHAR(100) NOT NULL,
  `price` FLOAT NOT NULL DEFAULT 0,
  `quantity` SMALLINT(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `idx_order_item_product` (`productId` ASC),
  CONSTRAINT `fk_order_item_product`
    FOREIGN KEY (`productId`)
    REFERENCES `eshop`.`product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

ALTER TABLE `eshop`.`order_item` 
ADD INDEX `idx_order_item_order` (`orderId` ASC);
ALTER TABLE `eshop`.`order_item` 
ADD CONSTRAINT `fk_order_item_order`
  FOREIGN KEY (`orderId`)
  REFERENCES `eshop`.`order` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;