This file contains my understanding and steps I took on doing lab activity 1.

<h1>Exercises</h1>
a)
<ul> 
<li> Create a MySQL database table named ‘inventory’in MySQL Monitor, a command-line program. The structure of inventory
table is the shown in the lecture slides for Week 4(slide #24).</li>

Answer: database inventory created using following command.
```sql
create database if not exists inventory;
use inventory;
CREATE TABLE inventory ( item_number int NOT NULL AUTO_INCREMENT, make varchar(30) NOT NULL, model varchar(30) NOT NULL, price double NOT NULL, quantity int NOT NULL, PRIMARY KEY (item_number) );
```
<li>Insert at least 5 records into the table.</li>
Answer: added 5 records to database using following command.

```sql
INSERT INTO inventory(make, model, price, quantity) VALUES ('2002', 'xcy101', 28000, 1);
INSERT INTO inventory(make, model, price, quantity) VALUES ('2003', 'abc123', 5000, 13);
INSERT INTO inventory(make, model, price, quantity) VALUES ('2005', 'ssd123', 7958, 6);
INSERT INTO inventory(make, model, price, quantity) VALUES ('2022', 'pre115', 39000, 3);
INSERT INTO inventory(make, model, price, quantity) VALUES ('2020', 'xy12ab', 37000, 18);
```

![1create records.png](Screenshots%2F1create%20records.png)

<li>Write a query that return all records of the table.</li>

Answer: The records displayed using following command.
```sql
select * from inventory;
```

![2display.png](Screenshots%2F1display.png)

<li>Update an existing table row using ‘update’ statement.</li>
Answer: From the record, the price of item 2 was updated using following command.

```sql
UPDATE inventory SET price = 5055 WHERE item_number = 2;
``` 

![3update.png](Screenshots%2F1update.png)
</ul>

<p align="justify"> b) Create a MySQL database table named ‘Employees’ in phpMyAdmin. The structure of Employees table is the shown in the 
lecture slides for Week 4 (slide #3).  Then, similar to a), use this web interface to insert some data into this table 
and write SQL codes to query/update the table. </p>

Answer: THe following commands were used for above operations.
```sql
create table employees(last_name varchar(15) not null, first_name varchar(15) not null, address varchar(45) not null, city varchar(30) not null, state varchar(15) not null, zip int(8) not null);

insert into employees (last_name, first_name, address, city, state, zip) values ('Bolver', 'Maire', '02117 Barby Court', 'Sydney', 'NSW', '1130');
insert into employees (last_name, first_name, address, city, state, zip) values ('Revening', 'Aubert', '92978 Pawling Trail', 'Albuquerque', 'NM', '87140');
insert into employees (last_name, first_name, address, city, state, zip) values ('Lumox', 'Trevor', '111 Morrow Hill', 'Sydney', 'NSW', '1196');
insert into employees (last_name, first_name, address, city, state, zip) values ('Gilberthorpe', 'Ulrika', '62166 Morrow Pass', 'Melbourne', 'VIC', '8045');
insert into employees (last_name, first_name, address, city, state, zip) values ('Leither', 'Harriett', '84952 Briar Crest Street', 'Albuquerque', 'NM', '87140');
insert into employees (last_name, first_name, address, city, state, zip) values ('Lindblad', 'Brien', '5 Upham Crossing', 'Sydney', 'NSW', '1196');
insert into employees (last_name, first_name, address, city, state, zip) values ('Darkins', 'Ada', '090 Grayhawk Crossing', 'Adelaide Mail Centre', 'SA', '5889');
insert into employees (last_name, first_name, address, city, state, zip) values ('Baldwin', 'Darleen', '06464 Rowland Point', 'Sydney', 'NSW', '1109');
insert into employees (last_name, first_name, address, city, state, zip) values ('Abercromby', 'Mattias', '7402 Clemons Alley', 'Albuquerque', 'NM', '87140');
insert into employees (last_name, first_name, address, city, state, zip) values ('Balazin', 'Jeannette', '686 Gateway Place', 'Sydney', 'NSW', '1120');

select * from employees;

update employees set city = "newcastle", zip = "123456"  WHERE last_name = "Balazin";

select * from employees;
```
Create and display:
![2create&display.png](Screenshots%2F2create%26display.png)

Update record:

![2update.png](Screenshots%2F2update.png)

<p align="justify"> c) Write a PHP page to retrieve records from the ‘inventory’ table created in a), and display them neatly in an html 
table.You need to provide an html select control on the page (see Figure 1). The content of this select control are 
names of all makes that can be found in the inventory table.User can select to show the data of a specific make or show 
the data of all makes(see Figure 2). </p>

Answer: see attached file [c.php](c.php)

![3a.png](Screenshots%2F3a.png)

<p align="justify"> d) Modify the page in c) to allow user insert new data row from the web page (see Figure 3). After the user input the 
content of new row and press the ‘add’ button, the input data will be inserted into MySQL database. Then the page will
display the updated content of the ‘inventory’ table (see Figure 4). </p>

Answer: see attached file [d.php](d.php)

<p align="justify"> e) The following three tables are created with some data in a database called person_db.

``` sql
Employees(employee_id,  last_name,  first_name,  address, city, state, zip);
Experience(employee_id, language_id, years);Languages(language_id, language);
```

Write  the  SQL  query statement to  retrieve  those  employees  (with  their  items: first_name,  last_name,  language,
years,  city)  who  have  5  years’  experience  in “PHP” and  live in the city “Melbourne”.
```sql
$sqlQuery = “SELECT ......
```
</p>

<p align="justify"> f) Modify the code SearchSkill.php introduced in Lecture 4 (download Lec4Examples.zip from Blackboard) to get city, 
language, and years from the interface and output the search result as below by using the similar  SQL query in e):

<p align="justify"> g) Change the simple online quiz PHP page that you wrote for exercise (e) in Lab2 and exercise (c) in Lab3. Instead of 
hard coding the questions on the HTML page or store them in a file, you need to store them in one or more MySQL database
tables. You need to design the table structure to store questions and answers properly. When the page is loaded, it will
read the questions from the database and display them on the screen. So if questions/answers are changed, thisprogram can
be used without modifying any of PHP codes. </p>