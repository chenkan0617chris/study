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
    username char(30) not null,
    location_id char(10) not null,
    start_time datetime not null,
    end_time datetime,
    total_cost int,
    status char(10) not null,
    foreign key (username) references users(username),
    foreign key (location_id) references locations(id)
);

insert into users (username, password, name, surname, phone, email, type) values ('admin1', md5('asdasd'), 'admin', 'aaa', '0456345234', 'test@admin.com', 'administrator');
insert into users (username, password, name, surname, phone, email, type) values ('user1', md5('asdasd'), 'user', 'bbb', '0456345234', 'test@user.com', 'user');

insert into locations values ('P1', '30 Rowland Avenue', 'this is a parking', 20, 10);
insert into locations values ('P2', '62 Jobson Avenue', 'this is a test description', 40, 5);

insert into parkings (username, location_id, start_time) value ('user1', 'P1', '2024-05-09 20:38:50');
insert into parkings (username, location_id, start_time) value ('user1', 'P2', '2024-05-10 00:02:47');

