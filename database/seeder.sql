use skool;

insert into schools
(name, email, vision, mission, general_info, phone_number1 ,phone_number2, fees, address, main_language, type)
values
("Modern New Neu Nouvle", "hogdoor@hogdoor.com", "vision", "mission", "general_info", "012" ,"011", 5000, "right there", "English", "International"),
("Most Reviewed School Ever", "ever@ever.com", "vision", "mission", "general_info", "0125465" ,"012331", 5000, "Umnottelling you", "English", "International"),
("Deadpool & Joker Skool", "skool@skool.com", "vision", "mission", "general_info", "012" ,"011", 5000, "First let me show you a magic trick", "English", "National"),
("Arkham", "arkham@arkham.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");

insert into elementary_levels
(supplies, school_id)
values
("supply, supply and a supply", 1);

insert into middle_levels
(school_id)
values(1);

insert into high_levels
(school_id)
values(1);

insert into users
(username,password,role)
values
("mcadmin","secret","Employee"),
("superteacher","secret","Employee"),
("normalteacher","secret","Employee"),
('one', 'secret', 'Student'),
('maxm', 'secret', 'Student'),
('vader', 'secret', 'Parent'),
('deadpool', 'secret', 'Parent'),
('batman', 'secret', 'Parent'),
('corleone', 'secret', 'Student');

insert into employees
(first_name, middle_name, last_name, role, birth_date, address, email, username, gender, school_id, phone_number, mobile_number1, mobile_number2)
values
("John", "Doe" , "McAdmin", "Admin", '1990-12-12', "Du, st, ft 1", "mcadmin@mcadmin.com", "mcadmin", "Male", 1, "255","012", "010"),
("Super", "Ali" , "McTeacher", "Teacher", '1991-12-12', "street 22", "superteacher@superteacher.com", "superteacher", "Male", 1, "122", "010", "01222"),
("Normal", "Doe" , "Daw", "Teacher", '1992-12-12', "street 1", "normalteacher@normalteacher.com", "normalteacher", "Male", 1, "1223", "01012", "013222");

insert into admins
(salary, employee_id)
values
(5000, 1);

insert into teachers
(salary, years_of_exp, employee_id)
values
(3000, 10, 2);

insert into teachers
(salary, years_of_exp, employee_id, supervisor_id)
values
(3000, 10, 3,1);

insert into courses
(name, code, description, grade, level, teacher_id, school_id)
values
("Donuts Per Second", "DPS101", "How to make cookies in exponential donuts time", 1, "Elementary Level", 1, 1),
("Donuts structure and Alchemist", "DPS301", "Travel into space", 2, "Elementary Level", 1, 1);

insert into course_requires_course
(course_id, req_course_id)
values
(1, 2);

insert into students
(first_name, middle_name, last_name, email, SSN, grade, gender, birth_date, school_id, username)
values
('One', 'Two', 'Three', 'one@one.com', 134134, 1, 'Male', '2010-09-11', 1 ,'one'),
('Maxm', 'Twain', 'DeV', 'maxm@maxm.com', 112, 1, 'Female', '2010-09-04', 1 ,'maxm'),
('Corleone', 'I', 'V', 'corleone@corleone.com', 8, 'Male', '2005-09-04', 2, 'corleone');

insert into course_has_student
(course_id, student_id)
values
(1, 1);

insert into activities
(date, location, description, type, admin_id, teacher_id, school_id)
values
('2016-03-03', "H12", "Lorem ipsum dolor sit amet, consectetur adipisicing elit...", "Chess Tournament", 1, 1, 1);

insert into activity_joinedBy_student
(activity_id, student_id)
values
(1,1);

insert into announcements
(date, title, description, type, admin_id, school_id)
values
('2016-03-03', "Party", "Lorem ipsum dolor sit amet, consectetur adipisicing elit...", "Trip", 1, 1),
('2016-11-10', "Star Wars skool edition", "Stop the dark side of the Force", "Challenge", 1, 1);

insert into clubs
(name, high_level_id, purpose)
values
('Koolerz', 1, 'We kool'),
('Klubzinza', 1, 'SUP'),
('Akkump', 1, 'One more club for my list of accomplishments');

insert into club_joinedby_student
(student_id, club_id)
values
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 2);

insert into parents
(first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2, username)
values
('Dark', 'Darth', 'Vader', 'vader@vader.com', 'milky way st.', '09999', '09990','09991','vader'),
('Deadpool', 'X', 'L', 'deadpool@deadpool.com', 'R way st.', '09992349', '09321990','099412391','deadpool'),
('Batman', 'Bruce', 'Wayne', 'batman@batman.com', 'Bat cave st.', '0999329', '0992390','0923991','batman');

insert into students
(first_name, middle_name, last_name, SSN, gender, birth_date)
values
('Goku', 'Dark', 'Vader', 83289, 'Male', '2005-12-12'),
('Darth', 'Dark', 'Vader', 555, 'Male', '2005-12-12');

insert into parent_has_student
(parent_id, student_id)
values
(1, 3),
(1, 4);

insert into school_appliedInBy_student
(student_id, school_id, parent_id, accepted)
values(3, 1, 1, 'True'),
(4, 1, 1, 'False'),
(1, 1, 'True'),
(2, 1, 'True');

insert into reports
(report, teacher_id, student_id)
values
("This is not a very long report", 1, 3);

insert into parent_rates_teacher
(parent_id, teacher_id, rate)
values
(1, 2, 9);

insert into parent_reviews_school
(parent_id, school_id, review)
values
(1, 1, "Nice play ground you have"),
(1, 2, "Review you get"),
(2, 2, "One more review"),
(3, 2, "Shut up"),
(1, 3, "This should be R rated skool"),
(2, 3, "Why you do this"),
(1, 4, "The review is in the table");

insert into questions
(title, question, student_id, course_id)
values
("Apple pie exception", "I was making an apple pie when this error came out tried to pour some milk but it did not get solved", 1, 1);

insert into assignments
(post_date, due_date, content, teacher_id, course_id)
values
('2016-12-12', '2016-12-20', "Problem 1: define dps.", 1, 1),
('2016-11-01', '2016-11-20', "Problem 1: If Jack Sparrow was to shift his career what would he be?", 1, 1),
('2016-12-12', '2016-12-20', "Problem 1: write a program that detect cycles in dps.", 1, 2);

insert into assignment_solvedBy_student
(assignment_id, student_id, solution)
values
(1, 1, "Donuts Per Second...");
