/* (1) First, the script inserts into the table WORKSON an additional row about an employee with enumber 00105, 
such that after the insertion, the total working hours of employee 00105 is equal to 80 hours per week.
 (The project number to be inserted is up to you. Note that only one additional row is to be inserted, which means a single insert statement is expected.)
*/
insert into workson values("00105", 1001,  80 - (select sum(hours) from (select * from workson ) as w1 where w1.enumber = '00105'));


/* (2) Next, the script creates a single column relational table MESSAGE to store variable size strings no longer than 600 characters.
*/
create table MESSAGE(
	size varchar(600) not null,
    constraint MESSAGE_PK primary key (size)
);
select * from message;

/* (3) Next, the script inserts into a relational table MESSAGE information about the contents of a sample database that 
       violate the consistency constraint. "An employee cannot work more than 70 hours in total per week"
       The script must list the outcomes of verification of the consistency constraint as a single column table with 
       the following messages as the rows in the table.

       An employee <insert employee number here> is working more than 70 hours in total per week.

       For example, if an employee 007 is working more than 70 hours per week then the following text must be inserted into 
       a relational table MESSAGE.

       An employee 007 is working more than 70 hours in total per week.      	   	       		      	  	       	       
       HINT: use a row function CONCAT to create the messages like the one listed above. E.g. CONCAT('An employee', enumber, 'is working more than 70 hours in total per week.')                                             
*/
Insert into MESSAGE (select concat('An employee ', enumber ,' is working more than 70 hours in total per week.') from workson group by enumber having sum(hours) > 70);


/* (4) Finally, the script makes the contents of a relational table MESSAGE permanent and lists the contents of the relational table.
*/
commit;
select size from MESSAGE;

