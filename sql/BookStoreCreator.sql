CREATE DATABASE BookStore;

USE BookStore;

CREATE TABLE  BookInventory (
	BookID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	BookName varchar (75) NULL ,
    Quantity int 
);
CREATE TABLE BookInventoryOrder (
    OrderID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	FirstName varchar (25) NULL ,
	LastName varchar (25) NULL ,
	PaymentOption enum('credit','debit','cash')
);
Drop table BookInventory;