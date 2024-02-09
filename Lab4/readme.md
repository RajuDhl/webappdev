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
CREATE TABLE inventory ( item_number int NOT NULL AUTO_INCREMENT, make char(20) NOT NULL, model varchar(30) NOT NULL, price double NOT NULL, quantity int NOT NULL, PRIMARY KEY (item_number) );
```
<li>Insert at least 5 records into the table.</li>
Answer: added 5 records to database using following command.

```sql
INSERT INTO inventory(make, model, price, quantity) VALUES ('Yamaha', 'xcy101', 28000, 1);
INSERT INTO inventory(make, model, price, quantity) VALUES ('Mazda', 'abc123', 5000, 13);
INSERT INTO inventory(make, model, price, quantity) VALUES ('Honda', 'ssd123', 7958, 6);
INSERT INTO inventory(make, model, price, quantity) VALUES ('Audi', 'pre115', 39000, 3);
INSERT INTO inventory(make, model, price, quantity) VALUES ('Tesla', 'xy12ab', 37000, 18);
```

![1create records.png](Screenshots%2F1create%20records.png)

<li>Write a query that return all records of the table.</li>

Answer: The records displayed using following command.
```sql
select * from inventory;
```

![1display.png](Screenshots%2F1display.png)

<li>Update an existing table row using ‘update’ statement.</li>
Answer: From the record, the price of item 2 was updated using following command.

```sql
UPDATE inventory SET price = 5055 WHERE item_number = 2;
``` 

![1update.png](Screenshots%2F1update.png)
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
![3ss.png](Screenshots%2F3ss.png)


<p align="justify"> d) Modify the page in c) to allow user insert new data row from the web page (see Figure 3). After the user input the 
content of new row and press the ‘add’ button, the input data will be inserted into MySQL database. Then the page will
display the updated content of the ‘inventory’ table (see Figure 4). </p>

Answer: see attached file [d.php](d.php)
![4display.png](Screenshots%2F4display.png)

<p align="justify"> e) The following three tables are created with some data in a database called person_db.

``` sql
Employees(employee_id,  last_name,  first_name,  address, city, state, zip);
Experience(employee_id, language_id, years);
Languages(language_id, language);
```

Answer: Rather than creating new table for employees, the existing employee table was used. ID column was added as a 
primary key and set as auto increment. The following command was used.
```sql
ALTER TABLE employees ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY FIRST;
```

Then created the required two tables. 

```sql
CREATE TABLE languages (language_id INT AUTO_INCREMENT PRIMARY KEY, language VARCHAR(30));
CREATE TABLE experience (employee_id INT, language_id INT, years INT, FOREIGN KEY (employee_id) REFERENCES employees(id), FOREIGN KEY (language_id) REFERENCES languages(language_id));
```

I have used https://www.mockaroo.com/ to generate random data.

```sql
insert into experience (employee_id, language_id, years) values  (7, 1, 8),(7, 4, 4),(9, 1, 10),(3, 7, 6),(4, 2, 7),
    (10, 9, 8),(6, 7, 8),(6, 9, 5),(10, 2, 5),(4, 9, 6),(8, 9, 7),(5, 6, 10),(1, 7, 6),(2, 2, 7),(8, 8, 8),(6, 1, 1),
    (7, 8, 6),(4, 4, 3),(1, 4, 10),(2, 4, 7),(1, 8, 10),(2, 8, 7),(5, 4, 6),(2, 9, 6),(7, 3, 9),(4, 10, 6),(10, 7, 6),
    (5, 1, 3),(6, 8, 1),(9, 10, 10),(9, 3, 4),(3, 5, 6),(7, 6, 4),(10, 4, 9),(6, 5, 5),(9, 5, 4),(5, 10, 8),(5, 3, 2),
    (8, 6, 8),(8, 7, 7),(8, 3, 3),(2, 6, 4),(5, 2, 3),(4, 6, 6),(3, 3, 10),(3, 4, 9),(1, 6, 7),(10, 3, 5),(1, 10, 7),
    (6, 6, 8),(3, 2, 5),(10, 8, 4),(6, 10, 8),(10, 5, 5),(9, 7, 8),(2, 3, 10),(10, 1, 1),(5, 8, 5),(5, 9, 4),(6, 3, 5),
    (8, 5, 4),(7, 7, 8),(7, 10, 7),(10, 6, 6),(9, 2, 5),(9, 6, 5),(7, 9, 8),(3, 1, 1),(1, 9, 3),(3, 6, 9),(10, 10, 8),
    (4, 7, 4),(1, 2, 9),(9, 4, 9),(8, 10, 7),(5, 7, 10),(8, 2, 3),(7, 2, 7),(9, 8, 6),(1, 5, 10),(9, 9, 5),(2, 7, 4),
    (7, 5, 8),(8, 1, 6),(3, 8, 10),(3, 9, 9),(4, 8, 10),(3, 10, 10),(6, 4, 2),(4, 3, 4),(1, 1, 5),(2, 10, 7),(2, 1, 4),
    (2, 5, 2),(6, 2, 7),(4, 5, 4),(5, 5, 1),(1, 3, 7),(4, 1, 9),(8, 4, 6);
```

Write  the  SQL  query statement to  retrieve  those  employees  (with  their  items: first_name,  last_name,  language,
years,  city)  who  have  5  years’  experience  in “PHP” and  live in the city “Melbourne”.
```sql
SELECT employees.first_name, employees.last_name, languages.language, experience.years, employees.city FROM employees 
    JOIN experience ON employees.id = experience.employee_id JOIN languages ON experience.language_id = languages.language_id
    WHERE languages.language = 'PHP' AND experience.years = 5 AND employees.city = 'Melbourne';
```
![5query.png](Screenshots%2F5query.png)

</p>

<p align="justify"> f) Modify the code SearchSkill.php introduced in Lecture 4 (download Lec4Examples.zip from Blackboard) to get city, 
language, and years from the interface and output the search result as below by using the similar  SQL query in e):

Answer: FIrst, the code had to be modified to run as is locally. see attached [searchSkill.php](searchSkill.php)

<p align="justify"> g) Change the simple online quiz PHP page that you wrote for exercise (e) in Lab2 and exercise (c) in Lab3. Instead of 
hard coding the questions on the HTML page or store them in a file, you need to store them in one or more MySQL database
tables. You need to design the table structure to store questions and answers properly. When the page is loaded, it will
read the questions from the database and display them on the screen. So if questions/answers are changed, thisprogram can
be used without modifying any of PHP codes. </p>