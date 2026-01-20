use concessionaire;
create table if not exists customers (
	id int primary key auto_increment,
	name varchar(255),
	surname varchar(255),
	email varchar(255),
	password varchar(255),
	dni varchar(255),
	age int,
	rentals varchar(255)
);
drop table cars;

create table if not exists cars (
	id int primary key auto_increment,
	plate varchar(255) unique,
	brand varchar(255),
	model varchar(255),
	fabricationYear varchar(255),
	consumation float,
	pricePerDay float,
	available bool,
	doors int, 
	seats int,
	extras varchar(255)
);