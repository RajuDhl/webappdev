```webapp```
CREATE TABLE inventory ( item_number int NOT NULL AUTO_INCREMENT, make varchar(30) NOT NULL, model varchar(30) NOT NULL, price double NOT NULL, quantity int NOT NULL, PRIMARY KEY (item_number) );

INSERT INTO inventory(make, model, price, quantity) VALUES ('2002', 'xcy101', 28000, 1);
INSERT INTO inventory(make, model, price, quantity) VALUES ('2003', 'abc123', 5000, 13);
INSERT INTO inventory(make, model, price, quantity) VALUES ('2005', 'ssd123', 7958, 6);
INSERT INTO inventory(make, model, price, quantity) VALUES ('2022', 'pre115', 39000, 3);
INSERT INTO inventory(make, model, price, quantity) VALUES ('2020', 'xy12ab', 37000, 18);

select * from inventory;

UPDATE inventory SET price = 5055 WHERE item_number = 2;

create table employee(last_name varchar(15) not null, first_name varchar(15) not null, adderess varchar(45) not null, city varchar(30) not null, state varchar(15) not null, zip int(8) not null);

SELECT employees.first_name, employees.last_name, languages.language, experience.years, employees.city FROM employees JOIN experience ON employees.id = experience.employee_id JOIN languages ON experience.language_id = languages.language_id WHERE languages.language = 'PHP' AND experience.years = 5 AND employees.city = 'Melbourne';