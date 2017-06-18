DROP TABLE IF EXISTS `Orders` ;

CREATE TABLE IF NOT EXISTS `Orders` (
  `Order_Id` VARCHAR(20) NOT NULL,
  `Order_Time` DATETIME NOT NULL default sysdate,
  `Order_Status` ENUM('INPROCESS','CONFIRMED','PLACED','ASSIGNED','DELIVERED','CANCELED') NOT NULL ,
  `City_Code` VARCHAR(5) NOT NULL,
  `Area_Code` VARCHAR(5) NOT NULL,
  `Area_Name` VARCHAR(45) NOT NULL,
  `Restaurant_Id` VARCHAR(5) NOT NULL,
  `Restaurant_Name` VARCHAR(45) NOT NULL,
  `Customer_Id` VARCHAR(45) NULL,
  `Delivery_Address` VARCHAR(45) NOT NULL,
  `Assigned_Executive` VARCHAR(45) NULL,
  `Assigned_Delivery_Boy` VARCHAR(45) NULL,
  `Log` LONGTEXT NULL,
  PRIMARY KEY (`Order_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Order_Contents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Order_Contents` ;

CREATE TABLE IF NOT EXISTS `Order_Contents` (
  `Order_Id` VARCHAR(20) NOT NULL,
  `Item_Code` VARCHAR(20) NOT NULL,
  `Item_Name` VARCHAR(60) NOT NULL,
  `Iteam_Cost` DECIMAL(5,2) NOT NULL,
  `Item_Quantity` INT NOT NULL DEFAULT 1,
  `Total_Item_Cost` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`Order_Id`, `Item_Code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Order_Bill`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Order_Bill` ;

CREATE TABLE IF NOT EXISTS `Order_Bill` (
  `Order_Id` VARCHAR(20) NOT NULL,
  `Order_Cost` DECIMAL(5,2) NOT NULL,
  `Delivery_Charges` DECIMAL(3,2) NOT NULL,
  `Coupon_Value` DECIMAL(4,2) NOT NULL,
  `Tax` DECIMAL(5,2) NOT NULL,
  `Collect_From_Customer` DECIMAL(5,2) NOT NULL,
  `Pay_To_Restaurant` DECIMAL(5,2) NOT NULL,
  `Payment_Type` ENUM('OnlinePayment','CashOnDelivery') NOT NULL,
  PRIMARY KEY (`Order_Id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
