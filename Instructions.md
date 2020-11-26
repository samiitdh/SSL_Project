# Instructions # 
**Database In Xampp** \
Database name is "adiutor". It has two tables as below \
The database is of type "utf8_general_ci", which is default one. \
\
First create a table called "event", with "unique_id", "description" as columns. \
\
"unique_id" column has
* type - int
* Length/Values - 11
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
copy and keep it somewhere and upload to repo



                        
