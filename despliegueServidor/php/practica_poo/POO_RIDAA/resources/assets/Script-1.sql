use concessionaire;
drop table customers;

create table if not exists customers (
	id int primary key auto_increment,
	name varchar(255),
	surname varchar(255),
	email varchar(255) unique,
	password varchar(255),
	dni varchar(255) unique,
	age int,
	rentals varchar(255)
);

create table if not exists cars (
	id int primary key auto_increment,
	plate varchar(255) unique,
	brand varchar(255),
	model varchar(255),
	fabricationYear int,
	consumation float,
	pricePerDay float,
	available bool,
	doors int, 
	seats int,
	extras varchar(255)
);