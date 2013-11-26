Written in PHP. Allow users to enter an ID into a form and then click a single button to clock-in/out.  
The clock-in and out times is saved in a MySQL database and the program keeps track of an 
employee’s status, whether clocked in/out so that the next time they access the system it will know to 
do a clock-out vs. a clock-in and vice-versa.

Steps to recreate the database:

1) Create a database named 'timemachine'
2) Import the sql dump in sql_dump/timemachine.sql
3) Set the user priveleges: user = root, passsword: crop.
   Alternatively, you can just change the user and password in line #9 in classes/database.php
