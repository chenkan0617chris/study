/* 
(1) Use WITH clause to implement a SELECT query: find the names and dates of birth of all employees who work on a project that has a budget greater than or equal to 110000, 
remove duplicates from the results and order the results in descending order of date of birth. 

Your task is to implement the query using WITH clause where no more than two tables are joined at a time. 
The first subquery must join the relational tables WORKSON and PROJECT. 
The second subquery must join the outcomes of the first subquery with a relational table EMPLOYEE. 
Finally, SELECT statement must find the required information using the results obtained from the second subquery.
*/

with workInfo as (select enumber, budget from workson w left join project p
on w.pnumber = p.pnumber),

employeeInfo as (select name, dob, budget from workInfo left join employee
on workInfo.enumber = employee.enumber
)
SELECT distinct name, dob from employeeInfo where budget >= 110000 order by dob desc;

/* 
(2) Use relational views to implement the same query as in question (1) above: 
find the names and dates of birth of all employees who work on a project that has a budget greater than or equal to 110000, 
remove duplicates from the results and order the results in descending order of date of birth.

Your task is to implement relational views as join query where no more than two tables are joined at a time. 
The first relational view must join the relational tables WORKSON and PROJECT. 
The second relational view must join the first relational view with a relational table EMPLOYEE. 
Finally, SELECT statement must find the required information using the second relational view.
*/
create view workInfo as (select enumber, budget from workson w left join project p
on w.pnumber = p.pnumber);

create view employeeInfo as (select name, dob, budget from workInfo left join employee
on workInfo.enumber = employee.enumber
);

SELECT distinct name, dob from employeeInfo where budget >= 110000 order by dob desc;

/* 
(3) Create a relational table FINANCE and copy from the relational table EMPLOYEE information about all employees who belong to the FINANCE department. 
Remember to enforce appropriate consistency constraints on the new relational table FINANCE. 
You do not need to remove employees from the relational table EMPLOYEE.
*/
create table FINANCE (
	enumber char(5) not null,
    name varchar(30) not null,
    dob date not null,
    address varchar(50) not null,
    sex char(1) not null,
    salary decimal(7,2) not null,
    supervisor char(5) null,
    dnumber decimal(5,0) not null,
    constraint finance_pk primary key (enumber),
	CONSTRAINT finance_FK1 FOREIGN KEY (supervisor) REFERENCES EMPLOYEE(enumber),
	CONSTRAINT finance_FK2 FOREIGN KEY (dnumber) REFERENCES DEPARTMENT (dnumber),
	CONSTRAINT finance_CHECK1 CHECK ( sex IN ('F', 'M') ),
	CONSTRAINT finance_CHECK2 CHECK ( salary > 0 )
);

insert into FINANCE (
select enumber, name, dob, address, sex, salary, supervisor, dnumber from employee
where dnumber = (select dnumber from department where dname = 'FINANCE')
);

/* 
(4) Delete information about the projects that have budget greater than or equal to 35000. 
(HINT: you must first remove information about who works on the projects that have budget greater than or equal to 35000. ) 
There is no need to remove any rows from a relational table EMPLOYEE. 
*/


delete from workson
where pnumber in (select distinct pnumber from project 
where budget >= 35000);

delete from project
where budget >= 35000;
