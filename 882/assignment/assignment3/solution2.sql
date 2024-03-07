/* 
(1) The script creates two new users: alice and bob. The passwords are up to you.
*/
create user alice identified by 'alice';
create user bob identified by 'bob';


/* 
(2) The script creates a new database task2 and it creates the relational tables DEPARTMENT and PROJECT in a database task2. 
The relational tables are the same as in the sample database. 
The simplest way is to copy and paste CREATE TABLE statements from a file dbcreate.sql. 
There is no need to insert any data.
*/
create database task2;
use task2;

CREATE TABLE DEPARTMENT (
	dnumber        DECIMAL(5)              NOT NULL, /* Department number              */
	dname          VARCHAR(30)             NOT NULL, /* Department name                */
	manager        CHAR(5)                     NULL, /* Department manager number      */
	budget         DECIMAL(10,2)           NOT NULL, /* Budget of department           */
	msdate         DATE                        NULL, /* Manager start date             */
	CONSTRAINT DEPARTMENT_PK PRIMARY KEY (dnumber),
	CONSTRAINT DEPARTMENT_CK UNIQUE (dname),
	CONSTRAINT DEPARTMENT_CHECK1 CHECK (budget >= 0),
	CONSTRAINT DEPARTMENT_CHECK2 CHECK (dnumber >=1 ) );
    
CREATE TABLE PROJECT (
	pnumber         DECIMAL(10)             NOT NULL, /* Project number                */
	ptitle          VARCHAR(30)             NOT NULL, /* Project title                 */
	sponsor         VARCHAR(30)                 NULL, /* Project sponsor name          */
	dnumber         DECIMAL(5)              NOT NULL, /* Department number             */
	budget          DECIMAL(10,2)           NOT NULL, /* Project budget                */
	CONSTRAINT Project_PK PRIMARY KEY(PNumber),
	CONSTRAINT Project_FK FOREIGN KEY (DNumber) REFERENCES DEPARTMENT(DNumber),
	CONSTRAINT Project_CK UNIQUE (PTitle) );

/* 
(3) The script grants the access in a read mode to both relational tables DEPARTMENT and PROJECT to a user alice. 
The read access rights must be granted such that a user alice is allowed to grant access in a read mode to both tables to the other users.
*/
grant select on task2.DEPARTMENT to alice with grant option;
grant select on task2.PROJECT to alice with grant option;

/* 
(4) The script lists information about the privileges granted in step (3). 
*/
select user, db, table_name, table_priv from mysql.tables_priv where user = 'alice';


/* 
(5) The script grants the access in a write mode to a relational table PROJECT to a user bob. 
In this case, a user bob is not allowed to grant the same privilege to the other users.
*/
grant update, insert, delete on task2.project to bob;

/* 
(6) The script grants the access in a read mode to the columns dname and budget in the relational table DEPARTMENT to a user bob. 
A user bob is not allowed to grant the same privilege to other users.
*/
grant select(dname, budget) on task2.department to bob;

