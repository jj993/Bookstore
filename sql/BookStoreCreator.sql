CREATE DATABASE BookStore;

USE BookStore;

CREATE TABLE  BookInventory (
	BookID int NOT NULL PRIMARY KEY auto_increment,
	BookName nvarchar (75) NULL ,
    Quantity int 
);
CREATE TABLE BookInventoryOrder (
	FirstName nvarchar (25) NULL ,
	LastName nvarchar (25) NULL ,
	PaymentOption enum('credit','debit','cash')
);