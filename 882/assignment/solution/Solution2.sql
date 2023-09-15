/*
(1) Modify the consistency constraint of the sample database, such that after a modification, 
a pair of attributes name and dob can uniquely identify an employee.
*/
alter table employee drop constraint employee_ck;
alter table employee add constraint employee_ck unique (name, dob);

/*
(2) Modify the consistency constraint of the sample database, such that after a modification, 
the hours of WORKSON can store the value between 5.0 and 70.0.
*/
alter table workson drop constraint workson_check;
alter table workson add constraint workson_check check (hours >= 5 and hours <= 70);


/*
(3) Modify the consistency constraint of the sample database, such that after a modification, 
the dob of DEPENDENT is mandatory.
*/
alter table dependent modify dob date NOT null;

/*
(4) Modify the structure of the sample database, such that after a modification, 
the employee’s name can be up to 50 characters long.
*/
alter table employee modify name char(50) NOT null;


/*
(5) Modify the structure of the sample database, such that after a modification, 
the start date esdate of an employee is recorded, and the esdate is optional. 
*/
alter table employee drop column esdate;
alter table employee add column esdate date null;

/*
(6) Modify the consistency constraint of the sample database, such that after a modification, 
the sponsor of PROJECT is mandatory and can only contain either a string 
'Microsoft' or 'Education committee' or 'Cloud Pty Ltd' or 'Football Club' or 'Database Committee' or 'UoW'.
*/
alter table project modify sponsor varchar(30) not null;
alter table project drop constraint project_check;
alter table project add constraint project_check check (sponsor in ('Microsoft', 'Education committee', 'Cloud Pty Ltd', 'Football Club', 'Database Committee', 'UoW'));
