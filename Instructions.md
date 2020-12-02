# Instructions # 
**Database In Xampp** \
Database name is "adiutor". It has two tables as below \
The database is of type "utf8_general_ci", which is default one. \
\
First create a table called "event", with "unique_id", "description" as columns. \
\
"unique_id" column has
* type - int
* Length/Values - 255
* Default - none
* Collation - no changes
* Attributes - no changes
* Null - no tick
* Index - primary
* A_I - tick
* Remaining all no changes
                       
"description" column has 
* type - MEDIUMTEXT
* Remaining all no changes 

Second table is "individual", with "unique_id", "name", "roll_no", "password", "role" and "event_array" as columns. \
\
"unique_id" same as above\
\
"name" column has
* type - VARCHAR
* Length/Values - 300
* Remaining all unchanged

"roll_no" column has
* type - BIGINT
* Length/Values - 11
* Remaining all unchanged

"passowrd" column has 
* type - VARCHAR
* Length/Values - 32
* Remaining all unchanged

"role" column has 
* type - VARCHAR
* Length/Values - 11
* Remaining all unchanged

"event_array" column has (**Note** In xampp we can't store array as column, so we store all 
events as comma seperated string.Eg., "1,2,54,89,458" 
* type - MEDIUMTEXT
* Remaining all unchanged

                         
**Note** whoever writing this make sure before creating the table use the "Preview SQL" button that will view the SQL code,\
copy and keep it somewhere and upload to repo \
**Note** Add a default admin in individual table with name: admin, roll_no: 69420, password: phpmyadmin, role: admin, event_array: (nothing)
* Submit the php file or sql file that will make the database and tables
* Deadline: 27-Nov-2020 (12:00PM afternoon)

**PHP FILES**
First see all the database files and make a database on your machine. \
\
Note that to login we use "unique Number" and Password, where admin has unique number as 69420, \
for students it is their roll number and for faculty it is 9190010012, where starting 9 means faculty and \
next 19 is year they joined and 00 is just like that, next 1 means CSE faculty, 00, next 12 means serial number \
\
First PHP Page: "login.php"\
Has a basic form with two entrires - "Unique Number" and "Password"\
If correct data entered display welcome if not take to same page and display "wrong password/roll number"\
\
Second PHP Page:
**Note** Here we use "validate.php" file which will check the role based on unique number and also check for password correctness\
If unique number is of admin take to home_admin.php, for faculty take to home_faculty.php and for student take to home_student.php\
If password or unique number wrong, take to same login.php and display password/unique number wrong.\
Same in case password or unique number are not entered at all. \

Administrator:
"home_admin.php"\
This page should contain all the buttons which can redirect the admin to all the different pages related to his tasks. 
The tasks he can perform are: add or delete an account, view and search an existing account. 

"admin_view.php"
Through this page, admin can view,search and delete any account.
The accounts are displayed as two tables - one for faculty and other for students. By default, the tables show all the accounts. When a query is entered, the tables then show the accounts matching that query. There will be a delete button here for every row which will ask for confirmation (a javascript alert) and then delete the account if pressed "Yes". 

The columns of the tables will be Name, Roll Number and a delete button for every row.

"add_individual.php"
This page has a form with "Name", "Roll Number", "Role" fields. (Adding a check for roll number uniqueness while adding individual is up for discussion)
For "Role" field, it has to have two options "Student", "Faculty", admin should select one. \
default password is "<role>_<rollno>" where <role> = {student,faculty} and <rollno> is the roll number, later we will have a button for student and faculty to change their password.\

"event_coordinator.php"
For this, modify init.php and create a table for "event_co" which contains the columns "unique_id" which is the unique id of the individual who is an event coordinator.
In this page, the accounts who are event coordinators are displayed as a table. 
The table will have the columns "Name", "Roll Number", "Role"(Faculty/Student); and a "Remove Role" button for every row which the removes the role of event coordinator for that account.


Event Coordinator:
"home_eventco.php"
This page will have two buttons - "View Events" (to eventco_view.php) and "New event" (to add_events.php)
The requested event additions will be displayed here with "Title", "Description" and a button to accept or deny. The 

"eventco_view.php"
The events are displayed as a table with "Title", "Description"; with a delete button for every row.

"add_events.php"
A html form with "Name" and "Description" which adds a row to the "events" table.




                        
