CREATE DATABASE BookStore;

USE BookStore;

CREATE TABLE  BookInventory (
	BookID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	BookName varchar (75) NOT NULL ,
    Quantity int NOT NULL
);
CREATE TABLE BookInventoryOrder (
    OrderID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	FirstName varchar (25) NOT NULL ,
	LastName varchar (25) NOT NULL ,
	PaymentOption enum('credit','debit','cash') NOT NULL,
	BookName varchar (75) NOT NULL 
);