# Instructions # 
**Database In Xampp** \
Database name is "adiutor". It has two tables as below \
The database is of type "utf8_general_ci", which is default one. \
\
First create a table called "events", with "unique_id", "description", "datetime" as columns. \
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

"datetime" column has
* type - "DATETIME"
* Remaining all no changes
* Note: The Date time format in Xampp is "YYYY-MM-DD 29:59:59"

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
1st PHP Page: "login.php" - Done by Mayank\
Has a basic form with two entrires - "Unique Number" and "Password"\
If correct data entered display welcome if not take to same page and display "wrong password/roll number"\
\
2nd PHP Page - Done by Mayank:
**Note** Here we use "validate.php" file which will check the role based on unique number and also check for password correctness\
If unique number is of admin take to home_admin.php, for faculty take to home_faculty.php and for student take to home_student.php\
If password or unique number wrong, take to same login.php and display password/unique number wrong.\
Same in case password or unique number are not entered at all. \
  
  Added Additional php file 2.1 - dbcom for data base communication. - Done by Mayank \
  
Administrator:
3rd "home_admin.php" - Taken by Mayank\
This page should contain all the buttons which can redirect the admin to all the different pages related to his tasks. 
The tasks he can perform are: add or delete an account, view and search an existing account. 

4th "admin_view.php" - Taken by Mayank\
Through this page, admin can view,search and delete any account.
The accounts are displayed as two tables - one for faculty and other for students. By default, the tables show all the accounts. When a query is entered, the tables then show the accounts matching that query. There will be a delete button here for every row which will ask for confirmation (a javascript alert) and then delete the account if pressed "Yes". \

The columns of the tables will be Name, Roll Number and a delete button for every row.\

5th "add_individual.php" - Taken by Sameer\
This page has a form with "Name", "Roll Number", "Role" fields. (Adding a check for roll number uniqueness while adding individual is up for discussion)
For "Role" field, it has to have two options "Student", "Faculty", admin should select one. \
default password is "{role}_{rollno}" where {role} = {student,faculty} and {rollno} is the roll number, later we will have a button for student and faculty to change their password.\

6th "event_coordinator.php" - Taken by Sameer\
In this page, the accounts who are event coordinators are displayed as a table. The role of an individual is "studentEC" if an individual is both event coordinator and student and "facultyEC" if he is event coordinator and faculty.
The table will have the columns "Name", "Roll Number", "Role"(Faculty/Student); and a "Remove Role" button for every row which the removes the role of event coordinator for that account.


Event Coordinator:
7th "home_eventco.php" - Done by Sathvik\
Modify init.php to include a table "event_requests" with the columns "Title" and "Description" and table "events" to include a title\
This page will have two buttons - "View Events" (to eventco_view.php) and "New event" (to add_events.php)\
The requested event additions will be displayed here with "Title", "Description" and a button to accept or deny. The 

8th "eventco_view.php" - Done by Sathvik\
The events are displayed as a table with "Title", "Description"; with a delete button for every row.

9th "add_events.php" - Done by Sathvik\
A html form with "Title", "Description" which adds a row to the "events" table.

Faculty:\
"home_faculty.php" - Taken by Sathvik\
In this page, there are three buttons - "Events"(to view_events.php) "Change Password"(to change_pswd.php) and "View Room Allotment"(to faculty_room.php)

"view_events.php" - Taken by Sathvik\
In this page, posted events are displayed as a table with a button "Add to timetable" for every row which is then added to the timetable (To be done later). There is a button "Request Event" (to event_req.php). If the individual is an event coordinator, there is a button "Go to Event Coordinator homepage" (to home_eventco.php).

"change_pswd.php"
An html form with "Current Password" and "New Password". On submission check if current password is correct and then proceed to change the password. If not show a javascript alert.

"event_req.php"
A html form with "Title" and "Description" which are then added to event_requests table and on submission gives an alert "Event Request Submitted"

Modify init.php to include a "rooms" table with columns "date","room_no", "time","owner" and a table "room_reqs" table with similar columns as "rooms"
"faculty_room.php"
In this page, there is a text box for entering date which will display the room occupancy info for that date as a table with columns "Room Number", "Time" and "Taken By". There is a button at the bottom "Request Room" (to room_req.php)

"room_req.php"
This page has an html form with "Room Number"(a dropdown list with default room numbers) "Date" "Time". All these are stored in the "room_reqs" table along with the user's name who made the request.

Students:\
"home_student.php"
This page has two buttons - "Change Password"(to change_pswd.php) and "Events"(to view_events.php) **NOTE** Students make use of the same php files as faculty ("view_events.php", "event_req.php")for events feature. See if this idea is good.


Administrator:\
Add a button to home_admin.php "Room Occupancy" to take him to "admin_room.php" 

"admin_room.php"
In this page, there is a text box for entering the room number which a table with the columns "Taken By", "Date", "Time" with the room number as its title (from the "rooms" table). In the bottom of this page, there is a button "View Room Requests"(To admin_roomreq.php)

"admin_roomreq.php"
This page displays the contents of the mysql table "room_reqs" as an html table with a button for every row "Accept" which deletes the corresponding row in "room_reqs" but adds it to the "rooms" table and "Deny" which deletes the corresponding row in "room_reqs" table.

"view_courses.php"
Modify home_admin.php to include buttons - "View Course List"(view_courses.php) and "Add a Student to a Course"(to add_students.php) \
The course name and faculty names are displayed as a table with "delete" for every row which deletes the mysql tables "$id_courses"
There is a button at the bottom "Add Course" which takes us to "add_courses.php"

"add_courses.php"
Modify init.php to include a table "courses" with columns "name" "instuctor" "unique_id".
A html form with input for name of faculty and course name. Add a check for if name of individual is faculty or student. 
When submission of form is succesful, create a table through this php "$id_courses" (where $id is the unique id of course) with columns "name" "roll number" and "unique_id"(of the student).

"add_students.php"
A html form with a dropdown list of course names(from courses table) and "Roll Number" of the student which on submission adds a row to the table ($id_courses) get $id from courses table and name of the student from individual table.

Faculty:
modify home_faculty.php to include a button "View My Courses"( to faculty_courses.php) and "View Deadlines" (to faculty_deadlines.php)



