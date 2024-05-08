create database easyparking;
use easyparking;


create table users (
	id int auto_increment primary key,
    username char(30) unique not null,
    password char(50) not null,
    name char(30),
    surname char(30),
    phone char(20),
    email char(30),
    type char(20) not null
);

create table locations (
	id char(10) primary key,
    location char(30) not null,
    description char(50) not null,
    capacity int not null,
    current_available int not null,
    cost int not null
);

create table parkings (
	id int auto_increment primary key,
    user_id int not null,
    location_id char(10) not null,
    start_time datetime not null,
    end_time datetime,
    total_cost int,
    status char(10) not null,
    foreign key (user_id) references users(id),
    foreign key (location_id) references locations(id)
);

