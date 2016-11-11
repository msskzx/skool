use skool;

insert into schools(name, email, vision, mission, general_info, phone_number1 ,phone_number2, fees, address, main_language, type)
values("text", "hogdoor@hogdoor.com", "vision", "mission", "general_info", "012" ,"011", 5000, "right there", "English", "International");

insert into elementary_levels(supplies, school_id)
values("supply, supply and a supply", 1);

insert into middle_levels(school_id)
values(1);

insert into high_levels(school_id)
values(1);

insert into users(username,password,role)
values("mcadmin","secret","Employee");

insert into users(username,password,role)
values("superteacher","secret","Employee");

insert into users(username,password,role)
values("normalteacher","secret","Employee");

insert into employees(first_name, middle_name, last_name, role, birth_date, address, email, username, gender, school_id, phone_number, mobile_number1, mobile_number2)
values("John", "Doe" , "McAdmin", "Admin", '1990-12-12', "Du, st, ft 1", "mcadmin@mcadmin.com", "mcadmin", "Male", 1, "255","012", "010");

insert into employees(first_name, middle_name, last_name, role, birth_date, address, email, username, gender, school_id, phone_number, mobile_number1, mobile_number2)
values("Super", "Doe" , "McTeacher", "Teacher", '1991-12-12', "street 22", "superteacher@superteacher.com", "superteacher", "Male", 1, "122", "010", "01222");

insert into employees(first_name, middle_name, last_name, role, birth_date, address, email, username, gender, school_id, phone_number, mobile_number1, mobile_number2)
values("Normal", "Doe" , "McTeacher", "Teacher", '1992-12-12', "street 1", "normalteacher@normalteacher.com", "normalteacher", "Male", 1, "1223", "01012", "013222");

insert into admins(salary, employee_id)
values(5000, 1);

insert into teachers(salary, years_of_exp, employee_id)
values(3000, 10, 2);

insert into teachers(salary, years_of_exp, employee_id, supervisor_id)
values(3000, 10, 3,1);

insert into courses(name, code, description, grade, level, teacher_id, school_id)
values("Donuts Per Second", "DPS101", "How to make cookies in exponential donuts time", 1, "Elementary Level", 1, 1);

insert into courses(name, code, description, grade, level, teacher_id, school_id)
values("Donuts structure and Alchemist", "DPS301", "Travel into space", 2, "Elementary Level", 1, 1);

insert into course_requires_course(course_id, req_course_id)
values(1, 2);

insert into users(username, password, role)
values('one', 'secret', 'Student');

insert into students(first_name, middle_name, last_name, email, SSN, grade, gender, birth_date, school_id, username)
values('One', 'Two', 'Three', 'one@one.com', 1, 1, 'Male', '2010-09-11', 1 ,'one');

insert into users(username, password, role)
values('Maxm', 'secret', 'Student');

insert into students(first_name, middle_name, last_name, email, SSN, grade, gender, birth_date, school_id, username)
values('Maxm', 'Twain', 'DeV', 'maxm@maxm.com', 1, 1, 'Female', '2010-09-04', 1 ,'maxm');

insert into course_has_student(course_id, student_id)
values(1, 1);

insert into activities(date, location, description, type, admin_id, teacher_id)
values('2016-03-03', "H12", "Lorem ipsum dolor sit amet, consectetur adipisicing elit...", "Chess Tournament", 1, 1);

insert into activity_joinedBy_student(activity_id, student_id)
values(1,1);

insert into announcements(date, title, description, type, admin_id)
values('2016-03-03', "Party", "Lorem ipsum dolor sit amet, consectetur adipisicing elit...", "Trip", 1);

insert into clubs(name, high_level_id, purpose)
values('Koolerz', 1, 'We kool');

insert into club_joinedby_student(student_id, club_id)
values(1, 1);
