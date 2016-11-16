-- “As an administrator, I should be able to ...”
--
-- 1 View and verify teachers who signed up as employees of the school I am responsible of, and assign
-- to them a unique username and password. The salary of a teacher is calculated as follows: years of
-- experience * 500 EGP.
--
-- delimiter //
-- create procedure insertUser
-- (in username1 varchar(255), in password1 varchar(255), in role1 varchar(255))
-- BEGIN
--    insert into users
--    (username, password, role)
--    values
--    (username1, password1, role1);
-- end //
-- delimiter ;
--
-- delimiter //
-- create procedure setEmployeeUsername
-- (in id1 int, in username1 varchar(255), in password1 varchar(255))
-- BEGIN
--    call insertUser(username1, password1, "Employee");
--    update employees set username = username1
--    where id = id1;
-- end //
-- delimiter ;
--
--
--
-- 2 View and verify students who enrolled to the school I am responsible of, and assign to them a
-- unique username and password.
--
-- delimiter //
-- create procedure setStudentUsername
-- (in id1 int, in username1 varchar(255), in password1 varchar(255))
-- BEGIN
--    call insertUser(username1, password1, "Student");
--    update students set username = username1
--    where id = id1;
-- end //
-- delimiter ;
--
-- call setStudentUsername(1, "Jiglo", "secret");
--
--
--
-- 3 Add other admins to the school I am working in. An admin has first name, middle name, last name,
-- birthdate, address, email, username, password, and gender. Note that the salary of the admin
-- depends on the type of the school.
--
delimiter //
create procedure insertAdmin
(in username varchar(255), in password varchar(255), in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255), in birth_date date, in address ,in email varchar(255),in gender varchar(255),in school_id int)
BEGIN
   call insertUser(username, password, "Employee");
   call insertEmployee(first_name, middle_name, last_name, "Admin", birth_date, address, email, username, gender, school_id)

   update employees e set e.username = username where id = ?;

   insert into admins a
   (salary, employee_id)
   values
   (salary, employee_id);
   end //
delimiter ;
--
-- delimiter //
-- create procedure insertEmployee
-- (in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255), in role varchar(255), in birth_date date, in address varchar(255) ,in email varchar(255),in gender varchar(255),in school_id int)
-- BEGIN
--    insert into employees e
--    (first_name, middle_name, last_name, role, birth_date, address, email, gender, school_id)
--    values
--    (first_name, middle_name, last_name, role, birth_date, address, email, gender, school_id)
-- end //
-- delimiter ;
--
--
--
-- 4 Delete employees and students from the system.
--
-- delimiter //
-- create procedure deleteStudent
-- (in id int)
-- BEGIN
--    delete from students
--       where students.id = id;
-- end //
-- delimiter ;
--
-- delimiter //
-- create procedure deleteEmployee
-- (in id int)
-- BEGIN
--    delete from employees
--       where employees.id = id;
-- end //
-- delimiter ;
--
--
--
-- 5 Edit the information of the school I am working in.
--
-- delimiter //
-- create procedure updateSchool
-- (in id int,in name varchar(255),in email varchar(255),in vision mediumtext,in mission mediumtext,in general_info mediumtext,in phone_number1 int ,in phone_number2 int,in fees int,in address varchar(255),in main_language varchar(255),in type varchar(255))
-- BEGIN
-- update schools set name = name, email = email, vision = vision, mission = mission, general_info = general_info, phone_number1 = phone_number1, phone_number2 = phone_number2, fees = fees, address = address, main_language = main_language, type = type
--    where schools.id = id;
-- end //
-- delimiter ;
--
--
--
-- 6 Post announcements with the following information: date, title, description and type
--
-- delimiter //
-- create procedure insertAnnouncement
-- (in date date,in title varchar(255),in description mediumtext,in type varchar(255),in admin_id int, in school_id int)
-- BEGIN
-- insert into announcements
-- (date, title, description, type, admin_id, school_id)
-- values
-- (date, title, description, type, admin_id, school_id);
-- end //
-- delimiter ;
--
--
--
-- Create activities and assign every activity to a certain teacher. An activity has its own date, location
-- in school, type, equipment(if any), and description.
--
-- delimiter //
-- create procedure insertActivity
-- (in date date,in location varchar(255),in description mediumtext,in type varchar(255), in equipment varchar(255), in admin_id int, in teacher_id int, in school_id int)
-- BEGIN
-- insert into activities
-- (date, location, description, type, equipment, admin_id, teacher_id, school_id)
-- values
-- (date, location, description, type, equipment, admin_id, teacher_id, school_id);
-- end //
-- delimiter ;
--
--
--
-- Change the teacher assigned to an activity.
--
-- delimiter //
-- create procedure assignTeacherActivity
-- (in id int, in teacher_id int, in admin_id int)
-- BEGIN
-- update activities
-- set teacher_id = teacher_id, admin_id = admin_id
-- where activities.id = id;
-- end //
-- delimiter ;
--
--
--
-- 9 Assign teachers to courses that are taught in my school based on the levels it offers.
--
-- delimiter //
-- create procedure updateTeacherCourse
-- (in id int, in teacher_id int)
-- BEGIN
-- update courses
-- set teacher_id = teacher_id
-- where courses.id = id;
-- end //
-- delimiter ;
--
--
--
-- 10 Assign teachers to be supervisors to other teachers.
--
-- delimiter //
-- create procedure assignSupervisor
-- (in id int, in supervisor_id int)
-- BEGIN
-- update teachers
-- set supervisor_id = supervisor_id
-- where teachers.id = id;
-- end //
-- delimiter ;
--
-- 11 Accept or reject the application submitted by parents to their children.
--
-- delimiter //
-- create procedure acceptStudent
-- (in school_id int, in student_id int, in accepted varchar(255))
-- BEGIN
-- update school_appliedInBy_student
-- set accepted = accepted
-- where school_appliedInBy_student.student_id = student_id
-- and school_appliedInBy_student.school_id = school_id;
-- end //
-- delimiter ;
