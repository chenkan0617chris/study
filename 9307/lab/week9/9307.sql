-- create database
create database fitnesscenter;
use fitnesscenter;

-- create classes tables
create table classes (
	id char(5) primary key,
    title char(30) not null,
	class_type char(20) not null,
    instructor_id int not null,
    foreign key (instructor_id) references instructors(id)
);

-- create enrolment tables
create table enrolment (
	id int auto_increment primary key,
    class_id char(5) not null,
    member_id int not null,
    foreign key (class_id) references classes(id),
    foreign key (member_id) references members(id)
);

-- create members tables
create table members (
	id int auto_increment primary key,
    username char(30) unique not null,
    password char(50) not null,
    name char(30) not null
);

-- create instructors tables
create table instructors(
	id int auto_increment primary key,
    name char(30) not null,
    facility char(20) not null
);

-- insert class
insert into classes values ('G1', 'Group Yoga', 'group', '3');
insert into classes values ('G2', 'Group bicycle', 'group', '2');
insert into classes values ('I1', 'Individual Leg Train', 'individual', '1');
insert into classes values ('I2', 'Individual Chest Train', 'individual', '4');

-- insert enrolment
insert into enrolment (class_id, member_id) values ('G1', '1');
insert into enrolment (class_id, member_id) values ('G1', '2');
insert into enrolment (class_id, member_id) values ('G1', '1');

-- insert instructors
insert into instructors (name, facility) values ('Tom', 'FCNorth');
insert into instructors (name, facility) values ('Richard', 'FCSouth');
insert into instructors (name, facility) values ('Lily', 'FCNorth');
insert into instructors (name, facility) values ('Jack', 'FCSouth');