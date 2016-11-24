-- “As a system administrator, I should be able to ...”
--
-- 1 Create a school with its information: school name, address, phone number, email, general information,
-- vision, mission, main language, type(national, international) and fees.
--
-- delimiter //
-- create procedure insertSchool
-- (in name varchar(255),in email varchar(255),in vision mediumtext,in mission mediumtext,in general_info mediumtext,in phone_number1 int ,in phone_number2 int,in fees int,in address varchar(255),in main_language varchar(255),in type varchar(255))
-- BEGIN
-- insert into schools
-- (name, email, vision, mission, general_info, phone_number1 ,phone_number2, fees, address, main_language, type)
-- values
-- (name, email, vision, mission, general_info, phone_number1 ,phone_number2, fees, address, main_language, type);
-- end //
-- delimiter ;
--
-- delimiter //
-- create procedure insertElementaryLevel
-- (in supplies mediumtext, in id int unsigned)
-- BEGIN
--
-- insert into elementary_levels
-- (id, supplies)
-- values
-- (id, supplies);
--
-- end //
-- delimiter ;
--
-- delimiter //
-- create procedure insertMiddleLevel
-- (in id int unsigned)
-- BEGIN
--
-- insert into middle_levels
-- (id)
-- values
-- (id);
--
-- end //
-- delimiter ;
--
-- delimiter //
-- create procedure insertHighLevel
-- (in id int unsigned)
-- BEGIN
--
-- insert into high_levels
-- (id)
-- values
-- (id);
--
-- end //
-- delimiter ;
--
--
--
-- 2 Add courses to the system with all of its information: course code, course name, course level (elementary,
-- middle, high), grade, description and prerequisite course(s).
--
-- delimiter //
-- create procedure insertCourse
-- (in name varchar(255), in code varchar(255), in description mediumtext, in grade int)
-- BEGIN
-- insert into courses
--    (name, code, description, grade)
--    values
--    (name, code, description, grade);
-- end //
-- delimiter ;
--
-- delimiter //
-- create procedure insertPrerequisite
-- (in course_id int, in req_course_id int)
-- BEGIN
-- insert into course_requires_course
-- (course_id, req_course_id)
-- values
-- (course_id, req_course_id);
-- end //
-- delimiter ;
--
--
--
-- 3 Add admins to the system with their information: first name, middle name, last name, birthdate,
-- address, email, username, password, and gender. Given the school name, I should assign admins
-- to work in this school. Note that the salary of the admin depends on the type of the school. The
-- salary of an admin working in a national school is 3000 EGP, and that working in an international
-- school is 5000 EGP.
--
-- delimiter //
-- create procedure insertAdmin
-- (in school_name varchar(255), in username varchar(255), in password varchar(255), in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255), in birth_date date, in address varchar(255), in email varchar(255), in gender varchar(255))
-- BEGIN
-- declare school_id, employee_id int unsigned;
-- declare salary int;
-- declare school_type varchar(255);
--
-- call insertUser(username, password, "Employee");
--
-- select sc.id into school_id
-- from schools sc
-- where sc.name = school_name COLLATE utf8_unicode_ci;
--
-- insert into employees
-- (username, first_name, middle_name, last_name, role, birth_date, address, email, gender, school_id)
-- values
-- (username, first_name, middle_name, last_name, "Admin", birth_date, address, email, gender, school_id);
--
-- select e.id into employee_id
-- from employees e
-- where e.username = username COLLATE utf8_unicode_ci;
--
-- select sc.type into school_type
-- from schools sc
-- where sc.id = school_id;
--
-- if(school_type = 'National') then
-- set salary = 3000;
-- else
-- set salary = 5000;
-- end if;
--
-- insert into admins
-- (salary, id)
-- values
-- (salary, employee_id);
--
-- end //
-- delimiter ;
--
--
--
-- 4 Delete a school from the database with all of its corresponding information. Students and employees
-- of this school should not be deleted from the system, but should not have a username and password
-- on the system until they are assigned to a new school again.
--
-- delimiter //
-- create procedure deleteSchool
-- (in id int unsigned)
-- BEGIN
--
-- set sql_safe_updates = 0;
--
-- delete from users
-- where users.username in(
-- select students.username
-- from students
-- where students.school_id = id);
--
-- delete from users
-- where users.username in(
-- select employees.username
-- from employees
-- where employees.school_id = id);
--
-- delete from schools
-- where schools.id = id;
--
-- set sql_safe_updates = 1;
-- end //
-- delimiter ;
