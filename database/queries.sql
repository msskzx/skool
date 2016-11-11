use skool;

-- “As a system administrator, I should be able to ...”

-- Create a school with its information: school name, address, phone number, email, general information,
-- vision, mission, main language, type(national, international) and fees.

-- insert into schools(name, email, vision, mission, general_info, phone_number1 ,phone_number2, fees, address, main_language, type)
   -- values("text", "hogdoor@hogdoor.com", "vision", "mission", "general_info", "012" ,"011", 5000, "right there", "English", "International");



-- 
-- Add courses to the system with all of its information: course code, course name, course level (elementary,
-- middle, high), grade, description and prerequisite course(s).
-- 
-- insert into courses(name, code, description, grade, level, teacher_id, school_id)
   -- values("text", "code", "desc", 1, "Elementary Level", "012" ,"011", 5000, "right there", "English", "International");

-- insert into course_requires_course(course_id, req_course_id)
-- values(1,2);
-- 


-- Add admins to the system with their information: first name, middle name, last name, birthdate,
-- address, email, username, password, and gender. Given the school name, I should assign admins
-- to work in this school. Note that the salary of the admin depends on the type of the school. The
-- salary of an admin working in a national school is 3000 EGP, and that working in an international
-- school is 5000 EGP.
-- 
-- insert into admins(first_name, middle_name, last_name, birth_date, address, email, username, password, gender)
-- values("Adam", "Admin" , "McAdmin", '1990-12-12', "Du, st, ft 1", "adam@adam.com", "mcadmin", "secret", "Male");
	

-- Search for any school by its name, address or its type (national/international).

-- select * from schools
-- where name = 'name' or address = 'address' or type = 'type';


--  View a list of all available schools on the system categorized by their level.
-- select *
-- from schools inner join elementary_levels
-- on schools.id = school_id;
-- 
-- select *
-- from schools inner join middle_levels
-- on schools.id = school_id;
-- --
-- select *
-- from schools inner join high_levels
-- on schools.id = school_id;
-- -- 
-- 
-- View the information of a certain school along with the reviews written about it and teachers
-- teaching in this school
-- select schools.name, parentt_school.review, employees.first_name
-- from schools, parentt_school, employees
-- where schools.id = parentt_school.id and schools.id = employees.school_id and school.id = '1' and employees.role = 'Teacher';
