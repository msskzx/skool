-- (name, email, vision, mission, general_info,in phone_number1, phone_number2, fees, address, main_language, type)
call insertSchool("Hogdoor", "hogdoor@hogdoor.com", "vision", "mission", "general_info", "012" ,"011", 5000, "right there", "English", "International");
call insertSchool("Most Reviewed School Ever", "ever@ever.com", "vision", "mission", "general_info", "0125465" ,"012331", 5000, "Umnottelling you", "English", "International");
call insertSchool("Deadpool & Joker Skool", "skool@skool.com", "vision", "mission", "general_info", "012" ,"011", 5000, "First let me show you a magic trick", "English", "National");
call insertSchool("Arkham", "arkham@arkham.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");

-- (supplies, school_id)
call insertElmentaryLevel("supply, supply and a supply", 1);
call insertElmentaryLevel("supply, supply and a supply", 2);

-- (school_id)
call insertMiddleLevel(1);
call insertMiddleLevel(3);

-- (school_id)
call insertHighLevel(1);
call insertHighLevel(4);

-- (school_name, username, password, first_name, middle_name, last_name, birth_date, address, email, gender)
call insertAdmin("Arkham", "heisenberg", "secret", "Walter", "W", "White", '1999-09-09', 'Meth lab second floor', "heisenberg@heisenberg.com", "Male");

-- (first_name, middle_name, last_name, role, birth_date, address, email, gender)
call insertTeacher('Lil', 'Dai', 'The Brave', 'Teacher', '1999-12-12', 'the brave st', 'lil@lil.com', 'Female');

-- (employee_id, username, password)
call setTeacherUsername(1, "dahaka", "secret");

-- (name, code, description, grade)
call insertCourse("Donuts Per Second", "DPS101", "How to make cookies in exponential donuts time", 1);
call insertCourse("Donuts structure and Alchemist", "DPS301", "Travel into space", 2);
call insertCourse("Imaginary Numbers: Dragon Ball edidtion", "IN101", "How to dragon ball the Imaginary our of numbers", 7);

-- (course_id, req_course_id)
call insertPrerequisite(2, 1);

-- (username, password, first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2)
call insertParent('gangsta', 'secret', 'TheGodFather', 'Darth', 'Vader', 'gangsta@gangsta.com', 'along this road', '09999', '09990','09991');
call insertParent('talion', 'secret', 'Talion', 'IDK', 'ISDK', 'talion@talion.com', 'Forge Tower', '095749', '0122390','06541');
call insertParent('vader', 'Dark', 'Darth', 'Vader', 'vader@vader.com', 'milky way st.', '09999', '09990','09991');
call insertParent('deadpool', 'Deadpool', 'X', 'L', 'deadpool@deadpool.com', 'R way st.', '09992349', '09321990','099412391');
call insertParent('batman', 'Batman', 'Bruce', 'Wayne', 'batman@batman.com', 'Bat cave st.', '0999329', '0992390','0923991');
call insertParent('talion', 'Talion', 'IDK', 'ISDK', 'talion@talion.com', 'Forge Tower', '095749', '0122390','06541');


-- (first_name, middle_name, last_name, email, SSN, grade, gender, birth_date, school_id, username)
call insertStudent('Corleone', 'III', 'V', 8554, '2005-09-04', 'Male');
call insertStudent('Lithariel', 'Talion', 'IDK', 121412, '2000-09-09', 'Female');
call insertStudent('Maxm', 'Twain', 'Devarx', 112,'2010-09-04', 'Female');
call insertStudent('Goku', 'Dark', 'Vader', 83289, '2005-12-12', 'Male');
call insertStudent('Darth', 'Dark', 'Vader', 555, '2005-12-12', 'Male');

-- (student_id, username, password)
call setStudentUsername(1, "lithariel", "secret");

-- (student_id, parent_id)
call setParentStudent(1, 1);
call setParentStudent(2, 1);
call setParentStudent(3, 2);

-- (student_id, school_id, parent_id)
call applyStudent(1, 1, 1);
call applyStudent(2, 1, 1);
call applyStudent(3, 1, 2);

insert into clubs
(name, high_level_id, purpose)
values
('Koolerz', 1, 'We kool'),
('Klubzinza', 1, 'SUP'),
('Akkump', 1, 'One more club for my list of accomplishments');

call joinClub(1, 1);

-- (student_id, course_id, title, question)
call insertQuestion(1, 1, "Apple pie exception", "I was making an apple pie when this error came out tried to pour some milk but it did not get solved");

-- (post_date, due_date, content, teacher_id, course_id);
call insertAssignment('2016-11-11', '2016-11-29', 'Solve this by flux finite automaton', 1, 1);
call insertAssignment('2016-12-12', '2016-12-20', "Problem 1: define dps.", 1, 1);
call insertAssignment('2016-11-01', '2016-11-20', "Problem 1: If Jack Sparrow was to shift his career what would he be?", 1, 1);
call insertAssignment('2016-12-12', '2016-12-20', "Problem 1: write a program that detect cycles in dps.", 1, 2);

-- (admin_id, student_id, accepted)
call acceptStudent(1, 3, 'Accepted');

-- (parent_id, teacher_id, rate)
call rateTeacher(1, 1, 8);
call rateTeacher(1, 2, 9);

-- (parent_id, school_id, review)
call reviewSchool(1, 6, "This is sehr gut");
call reviewSchool(3, 6, "Shut sup");
call reviewSchool(3, 1, "Tha Review");
call reviewSchool(5, 1, "Is this school internationl?");
call reviewSchool(5, 8, "To be an internationl skool is not that hard");
call reviewSchool(1, 1, "Nice play ground you have");
call reviewSchool(1, 2, "Review you get");
call reviewSchool(2, 2, "One more review");
call reviewSchool(3, 2, "Shut up");
call reviewSchool(3, 8, "Ketch up");
call reviewSchool(1, 8, "Suit up");
call reviewSchool(1, 3, "This should be R rated skool");
call reviewSchool(2, 3, "Why you do this");
call reviewSchool(1, 4, "Crowded classes are cleared away... one by one...");

-- ( date, title, description, type, admin_id)
call insertAnnouncement('2016-03-03', "Party", "Lorem ipsum dolor sit amet, consectetur adipisicing elit...", "Trip", 1);

-- (date, location, description, type, equipment, admin_id, teacher_id)
call insertActivity('2016-03-03', "H12", "desc", "Chess Tournament", "nothing", 1, 1);
