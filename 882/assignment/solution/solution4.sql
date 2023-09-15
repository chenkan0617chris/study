/*
(1) Find the department number and name of all departments that do not have a manager. 
*/
select dnumber, dname from department where manager is null;

/*
(2) Find the employee number and name of all employees whose salaries are greater than or equal to 100 but less than or equal to 165.
*/
select enumber, name from employee where salary >= 100 and salary <= 165;

/*
(3) Find the total number of employees that have no supervisor. 
*/
select count(*) from employee where supervisor is null;

/*
(4) Find the department number and the total number of employees for each department.
*/
select dnumber, count(*) total_number_of_employees from employee group by dnumber;

/*
(5) Find the average budget of all the departments. 
*/
select avg(budget) from department;

/*
(6) Find the department number and the total number of locations for each department. 
*/
select dnumber, count(*) from deptlocation group by dnumber;
