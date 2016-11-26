-- (name, email, vision, mission, general_info,in phone_number1, phone_number2, fees, address, main_language, type)
call insertSchool("Hogwarts", "hogwarts@hogwarts.com", "vision", "mission", "general_info", "012" ,"011", 5000, "right there", "English", "International");
call insertSchool("Mordor", "mordor@mordor.com", "vision", "mission", "general_info", "0125465" ,"012331", 5000, "Umnottelling you", "English", "International");
call insertSchool("The Skool", "skool@skool.com", "vision", "mission", "general_info", "012" ,"011", 5000, "First let me show you a magic trick", "English", "National");
call insertSchool("Arkham", "arkham@arkham.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");
call insertSchool("Gotham", "gotham@gotham.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");
call insertSchool("Opal", "opal@opal.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");
call insertSchool("Thanagar", "thanagar@thanagar.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");
call insertSchool("Metropolis", "metropolis@metropolis.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");
call insertSchool("Hub", "hub@hub.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");
call insertSchool("Sanctum", "sanctum@sanctum.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");
call insertSchool("Genesis", "genesis@genesis.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");
call insertSchool("Atlantis", "atlantis@atlantis.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");
call insertSchool("Qward", "qward@qward.com", "vision", "mission", "general_info", "0121431" ,"0114311", 5000, "arkham asylum", "English", "National");

-- (supplies, school_id)
call insertElementaryLevel("You can never trust a drug addict. ", 1);
call insertElementaryLevel("A man provides for his family.And he does it even when he's not appreciated, or respected, or even loved. He simply bears up and he does it. Because he's a man", 2);

-- (school_id)
call insertMiddleLevel(1);
call insertMiddleLevel(3);

-- (school_id)
call insertHighLevel(1);
call insertHighLevel(4);

-- (school_name, username, password, first_name, middle_name, last_name, birth_date, address, email, gender)
call insertAdmin("Hogwarts", "heisenberg", "secret", "Walter", "Wanka", "White", '1999-09-09', 'Meth lab second floor', "heisenberg@heisenberg.com", "Male");
call insertAdmin("Hogwarts", "shredder", "secret", "Shredder", "Ninja", "Samurai", '1990-09-09', 'Meth lab second floor', "shredder@shredder.com", "Male");
call insertAdmin("Mordor", "splinter", "secret", "Splinter", "Ninja", "Rat", '1990-09-09', 'Sewer ground floor', "splinter@splinter.com", "Male");
call insertAdmin("The Skool", "terminator", "secret", "Terminator", "X", "Dest", '1990-09-09', 'Sky net lab ', "terminator@terminator.com", "Male");
call insertAdmin("Arkham", "joker", "secret", "Joker", "Heh", "Gas", '1990-09-09', 'Villain pub', "joker@joker.com", "Male");

-- (first_name, middle_name, last_name, birth_date, address, email, gender, phone_number, mobile_number1, mobile_number2)
call insertTeacher('Lili', 'Dai', 'The Brave', '1992-12-12', 'the brave st', 'lili@lili.com', 'Female', 2, null, null, null);
call insertTeacher('Harley', 'Quin', 'Juan', '1992-12-12', 'Baseball st', 'harley@harley.com', 'Female', 3, null, "12321", null);
call insertTeacher('Dahaka', 'Abyss', 'Ndere', '1982-12-12', 'Time Island', 'lil@lil.com', 'Male', 20, "012", null, null);

-- (teacher_id, school_id)
call applySchoolTeacher(6, 1);
call applySchoolTeacher(7, 1);
call applySchoolTeacher(8, 1);

-- (employee_id, username, password)
call setTeacherUsername(6, "lili", "secret");
call setTeacherUsername(7, "harley", "secret");
call setTeacherUsername(8, "dahaka", "secret");

-- (teacher_id, supervisor_id)
call assignSupervisor(6, 8);
call assignSupervisor(7, 8);


-- (name, code, description, grade)
call insertCourse("Donuts", "DPS101", "How to make cookies in exponential donuts time", 1);
call insertCourse("Graph Theory", "GT101", "Solving mazes", 1);
call insertCourse("Neural Networks", "NN101", "This is getting neural", 1);
call insertCourse("Donuts structure", "DPS301", "Travel into space", 2);
call insertCourse("Imaginary Numbers: Dragon Ball edidtion", "IN101", "How to dragon ball the Imaginary out of numbers", 7);
call insertCourse("Mathematics", "math", "mathing the science out of things", 1);
call insertCourse("Mathematics", "math", "mathing the science out of things", 2);
call insertCourse("Mathematics", "math", "mathing the science out of things", 3);
call insertCourse("Mathematics", "math", "mathing the science out of things", 4);
call insertCourse("Mathematics", "math", "mathing the science out of things", 5);
call insertCourse("Mathematics", "math", "mathing the science out of things", 6);
call insertCourse("Mathematics", "math", "mathing the science out of things", 7);
call insertCourse("Mathematics", "math", "mathing the science out of things", 8);
call insertCourse("Mathematics", "math", "mathing the science out of things", 9);
call insertCourse("Mathematics", "math", "mathing the science out of things", 10);
call insertCourse("Mathematics", "math", "mathing the science out of things", 11);
call insertCourse("Mathematics", "math", "mathing the science out of things", 12);

-- (course_id, req_course_id)
call insertPrerequisite(4, 1);

-- (course_id, teacher_id)
call updateTeacherCourse(1, 6);
call updateTeacherCourse(2, 6);
call updateTeacherCourse(3, 7);
call updateTeacherCourse(4, 7);
call updateTeacherCourse(5, 8);
call updateTeacherCourse(6, 8);
call updateTeacherCourse(7, 8);
call updateTeacherCourse(8, 8);
call updateTeacherCourse(9, 8);
call updateTeacherCourse(10, 8);
call updateTeacherCourse(11, 8);
call updateTeacherCourse(12, 8);
call updateTeacherCourse(13, 8);
call updateTeacherCourse(14, 8);
call updateTeacherCourse(15, 8);
call updateTeacherCourse(16, 8);
call updateTeacherCourse(17, 8);

insert into course_has_student
(course_id, student_id)
values
(1, 1),
(2, 1),
(3, 1),
(16, 3);


-- (username, password, first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2)
call insertParent('vader', 'secret', 'Dark', 'Darth', 'Vader', 'vader@vader.com', 'milky way st.', '09999', '09990','09991');
call insertParent('talion', 'secret', 'Talion', 'Actis', 'Pacer', 'talion@talion.com', 'Forge Tower', '095749', '0122390','06541');
call insertParent('deadpool', 'secret', 'Deadpool', 'Wade', 'Pale', 'deadpool@deadpool.com', 'R way st.', '099949', '093990','099412391');
call insertParent('twain', 'secret', 'Mark', 'Luther', 'Twain', 'twain@twain.com', 'The river', '0999329', '92390','03991');
call insertParent('batman', 'secret', 'Batman', 'Bruce', 'Wayne', 'batman@batman.com', 'Bat cave st.', '09929', '099390','0923991');

-- (first_name, middle_name, last_name, email, SSN, grade, gender, birth_date, school_id, username)
call insertStudent('Goku', 'Dark', 'Vader', 83289, '2005-12-12', 'Male');
call insertStudent('Kad', 'Dark', 'Vader', 555, '2005-12-12', 'Male');
call insertStudent('Lithariel', 'Talion', 'Actis', 121412, '2000-09-09', 'Female');
call insertStudent('Corleone', 'Deadpool', 'Pale', 8554, '2001-09-04', 'Male');
call insertStudent('Maxm', 'Mark', 'Twain', 112,'2001-09-04', 'Female');

-- (student_id, parent_id)
call setParentStudent(1, 1);
call setParentStudent(2, 1);
call setParentStudent(3, 2);
call setParentStudent(4, 3);
call setParentStudent(5, 4);

-- (student_id, school_id, parent_id)
call applyStudent(1, 1, 1);
call applyStudent(2, 1, 1);
call applyStudent(3, 1, 2);
call applyStudent(4, 1, 3);
call applyStudent(5, 1, 4);

-- (admin_id, student_id, accepted)
call acceptStudent(1, 1, 'Accepted');
call acceptStudent(1, 2, 'Accepted');
call acceptStudent(1, 3, 'Accepted');
call acceptStudent(1, 4, 'Accepted');
call acceptStudent(2, 5, 'Accepted');
call acceptStudent(2, 1, 'Accepted');
call acceptStudent(2, 2, 'Rejected');
call acceptStudent(2, 3, 'Accepted');
call acceptStudent(2, 4, 'Rejected');
call acceptStudent(2, 5, 'Accepted');

-- (student_id, school_id)
call enrollStudent(1, 1);
call enrollStudent(2, 1);
call enrollStudent(3, 1);
call enrollStudent(4, 1);


-- (student_id, username, password)
call setStudentUsername(1, "goku", "secret");
call setStudentUsername(2, "kad", "secret");
call setStudentUsername(3, "lithariel", "secret");
call setStudentUsername(4, "corleone", "secret");


insert into clubs
(name, high_level_id, purpose)
values
('Koolerz', 1, 'We kool'),
('Klubzinza', 1, 'SUP'),
('Akkump', 1, 'One more club for my list of accomplishments');

-- (student_id, club_id)
call joinClub(3, 1);
call joinClub(3, 2);
call joinClub(4, 2);




-- (student_id, course_id, title, question)
call insertQuestion(1, 1, "Apple pie exception", "I was making an apple pie when this error came out tried to pour some milk but it did not get solved");
call insertQuestion(3, 16, "GCD exception", "I was mathing the science out of things just like you said then... click bait...");

-- (question_id, answer)
call answerQuestion(1, 'restart you router');

-- (post_date, due_date, content, course_id);
call insertAssignment('2016-11-11', '2016-11-29', 'Solve this by flux finite automaton', 1);
call insertAssignment('2016-12-12', '2016-12-20', "Problem 1: define dps.", 1);
call insertAssignment('2016-12-12', '2016-12-20', "Problem 1: write a program that detect cycles in dps.", 2);
call insertAssignment('2016-11-01', '2016-11-20', "Problem 1: If Jack Sparrow was to shift his career what would he be?", 3);

-- (student_id, assignment_id, solution)
call insertSolution(1, 1, "Donuts per second ma dear fellow");

-- (student_id, assignment_id, grade)
call gradeAssignment(1, 1, 10);

-- (parent_id, teacher_id, rate)
call rateTeacher(1, 6, 8);
call rateTeacher(2, 6, 9);
call rateTeacher(1, 7, 9);
call rateTeacher(1, 8, 9);

-- (parent_id, school_id, review)
call reviewSchool(1, 1, "Not bad", "If you tell the truth, you don't have to remember anything.");
call reviewSchool(2, 1, "Not bad", "I am so clever that sometimes I don't understand a single word of what I am saying.");
call reviewSchool(3, 1, "Not bad", "Good friends, good books, and a sleepy conscience: this is the ideal life.");
call reviewSchool(4, 1, "Not bad", "Never put off till tomorrow what may be done day after tomorrow just as well.");
call reviewSchool(5, 1, "Not bad", "I love deadlines. I love the whooshing noise they make as they go by.");
call reviewSchool(1, 2, "Not bad", "I like work: it fascinates me. I can sit and look at it for hours.");
call reviewSchool(2, 2, "Not bad", "You can't throw too much style into a miracle.");
call reviewSchool(3, 2, "Not bad", "How empty is theory in the presence of fact!");
call reviewSchool(4, 3, "Not bad", "No one can make you feel inferior without your consent.");
call reviewSchool(5, 4, "Not bad", "A day without sunshine is like, you know, night.");

-- ( date, title, description, type, admin_id)
call insertAnnouncement('2016-12-03', "Well Party", "Well... IDK", "Party", 1);

-- (date, location, description, type, equipment, admin_id, teacher_id)
call insertActivity('2016-12-12', "H12", "desc", "Chess Tournament", "nothing", 1, 6);
call insertActivity('2016-12-12', "H13", "desc", "Chess Tournament", "nothing", 1, 7);
call insertActivity('2016-12-12', "Platform", "desc", "Color Festival", "nothing", 1, 8);

-- (student_id, activity_id)
call joinActivity(1, 1);

-- (report, teacher_id, student_id)
call insertReport("I am the one who knocks! little kid!", 1, 1);

-- (parent_id, report_id, parent_comment)
call parentCommentReport(1, 1, "Why you no teach well?");
