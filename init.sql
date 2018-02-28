DROP TABLE IF EXISTS dept CASCADE;
DROP TABLE IF EXISTS emp CASCADE;
CREATE TABLE dept ( 
    dept_no            SERIAL PRIMARY KEY,
    dept_name          TEXT,
    location           TEXT
);
CREATE TABLE emp ( 
    emp_no             SERIAL PRIMARY KEY,
    last_name          text,
    first_name         text,
    dept_no            integer,
    FOREIGN KEY (dept_no) REFERENCES dept (dept_no)
);

INSERT INTO dept (dept_no, dept_name, location) VALUES 
	(10, 'Sales', 'Tokyo'),
	(20, 'Research', 'Osaka'),
	(30, 'Accounting', 'Nagoya');

INSERT INTO emp (last_name, first_name, dept_no) VALUES 
	('Sakata','Yuki', 10),
	('Suzuki','Yoshiaki', 20),
	('Hiruta','Risa', 30 ),
	('Shouji','Mirei', 10),
	('Sasaki','Yoshiharu', 20);
