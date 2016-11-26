-- “As an administrator, I should be able to ...”
--
-- 1 View and verify teachers who signed up as employees of the school I am responsible of, and assign
-- to them a unique username and password. The salary of a teacher is calculated as follows: years of
-- experience * 500 EGP.
--
-- (admin_id)
call getMySchoolTeachers(1);
--
-- (admin_id, teacher_id)
call rejectTeacher(1, 1);
--
-- (employee_id, username, password)
call setTeacherUsername(1, "dahaka", "secret");
--
--
--
-- 2 View and verify students who enrolled to the school I am responsible of, and assign to them a
-- unique username and password.
--
-- (admin_id)
call getMySchoolStudents(1);
--
-- (student_id, username, password)
call setStudentUsername(1, "jiglo", "secret");
--
--
--
-- 3 Add other admins to the school I am working in. An admin has first name, middle name, last name,
-- birthdate, address, email, username, password, and gender. Note that the salary of the admin
-- depends on the type of the school.
--
-- (school_name, username, password, first_name, middle_name, last_name, birth_date, address, email, gender)
call insertAdmin("Arkham", "heisenberg", "secret", "Walter", "W", "White", '1999-09-09', 'Meth lab second floor', "heisenberg@heisenberg.com", "Male");
--
--
--
-- 4 Delete employees and students from the system.
--
-- (student_id)
call deleteStudent(4);
--
-- (employee_id)
call deleteEmployee(4);
--
--
--
-- 5 Edit the information of the school I am working in.
--
-- ( admin_id, name, email, vision, mission, general_info, phone_number1, phone_number2, fees, address, main_language, type)
call updateSchool(1, "Hogdoor", "hogdoor@hogdoor.com", "vision", "mission", "general_info", "012" ,"011", 5000, "right there", "English", "International");
--
--
--
-- 6 Post announcements with the following information: date, title, description and type
--
-- ( date, title, description, type, admin_id)
call insertAnnouncement('2016-03-03', "Party", "Lorem ipsum dolor sit amet, consectetur adipisicing elit...", "Trip", 1);
--
--
--
-- Create activities and assign every activity to a certain teacher. An activity has its own date, location
-- in school, type, equipment(if any), and description.
--
-- (date, location, description, type, equipment, admin_id, teacher_id)
call insertActivity('2016-03-03', "H12", "desc", "Chess Tournament", "nothing", 1, 1);
--
--
--
-- Change the teacher assigned to an activity.
--
-- (activity_id, teacher_id, admin_id)
call assignTeacherActivity(4, 2, 1);
--
--
--
-- 9 Assign teachers to courses that are taught in my school based on the levels it offers.
--
-- (course_id, teacher_id)
call updateTeacherCourse(1, 1);
--
--
--
-- 10 Assign teachers to be supervisors to other teachers.
--
-- (teacher_id, supervisor_id)
call assignSupervisor(1, 2);
--
--
--
-- 11 Accept or reject the application submitted by parents to their children.
-- (admin_id, student_id, accepted)
call acceptStudent(1, 1, 'Accepted');
--
-- “As a parent, I should be able to ...”
--
-- 1 Sign up by providing my name (first name and last name), contact email, mobile number(s), address,
-- home phone number, a unique username and password.
--
-- (username, password, first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2)
call insertParent('gangsta', 'secret', 'TheGodFather', 'Darth', 'Vader', 'gangsta@gangsta.com', 'along this road', '09999', '09990','09991');
--
--
--
-- 2 Apply for my children in any school. For each child I should provide his/her social security number
-- (SSN), name, birthdate, and gender.
--
-- (first_name, middle_name, last_name, SSN, birth_date, gender)
call insertStudent('Lithariel', 'Talion', 'IDK', 121412, '1990-09-09', 'Female');
--
-- (student_id, parent_id)
call setParentStudent(6, 5);
--
-- (student_id, school_id, parent_id)
call applyStudent(6, 1, 5);
--
--
--
-- 3 View a list of schools that accepted my children categorized by child.
--
-- (parent_id)
call getSchoolsAccepted(1);
--
--
--
-- 4 Choose one of the schools that accepted my child to enroll him/her. The child remains unverified
-- (no username and password, refer to user story 2 for the administrator) until the admin verifies
-- him.
--
-- (student_id, school_id)
call enrollStudent(6, 1);
--
--
--
-- 5 View reports written about my children by their teachers.
--
-- (parent_id)
call getChildrenReports(1);
--
--
--
-- 6 Reply to reports written about my children by their teachers.
--
-- (parent_id, report_id, parent_comment)
call parentCommentReport(1, 1, "Why you no teach well?");
--
--
--
-- 7 View a list of all schools of all my children ordered by its name.
--
-- (parent_id)
call getChildrenSchools(1);
--
--
--
-- 8 View the announcements posted within the past 10 days about a school if one of my children is
-- enrolled in it.
--
-- (parent_id, school_id)
call getChildrenAnnouncements(1, 1);
--
--
--
-- 9 Rate any teacher that teaches my children.
--
-- (parent_id, teacher_id, rate)
call rateTeacher(1, 1, 8);
--
--
--
-- 10 Write reviews about my children’s school(s).
--
-- (parent_id, school_id, title, review)
call reviewSchool(1, 6, "Gut", "This is sehr gut");
--
--
--
-- 11 Delete a review that i have written.
--
-- (parent_id, school_id)
call reviewSchool(1, 4);
--
--
--
-- 12 View the overall rating of a teacher, where the overall rating is calculated as the average of ratings
-- provided by parents to that teacher.
--
-- (teacher_id, output)
call avgRating(2, @ans);
select @ans;
--
--
--
-- 13 View the top 10 schools with the highest number of reviews or highest number of enrolled students.
-- This should exclude schools that my children are enrolled in.
--
-- (parent_id)
call topSchools(0);
--
--
--
-- 14 Find the international school which has a reputation higher than all national schools, i.e. has the
-- highest number of reviews.
--
call popularInternational();
--
--
-- “As an enrolled student, I should be able to ...”
--
-- 1 Update my account information except for the username.
--
-- (id, first_name, middle_name, last_name, SSN, birth_date, gender)
call updateStudent(6, 'Lithariel', 'Talion', 'Forgerizer', 121412, '1990-09-09', 'Female');
--
--
--
-- 2 View a list of courses’ names assigned to me based on my grade ordered by name.
--
-- (student_id)
call getMyCourses(1);
--
--
--
-- 3 Post questions I have about a certain course.
--
-- (student_id, course_id, title, question)
call insertQuestion(1, 1, "Apple pie exception", "I was making an apple pie when this error came out tried to pour some milk but it did not get solved");
--
--
--
-- 4 View all questions asked by other students on a certain course along with their answers.
--
-- (student_id, course_id)
call getQuestionsByOthers(2, 1);
--
--
--
-- 5 View the assignments posted for the courses I take.
--
-- (student_id)
call getMyAssignments(1);
--
--
--
-- 6 Solve assignments posted for courses I take.
--
-- (student_id, assignment_id, solution)
call insertSolution(1, 1, "Donuts per second ma dear fellow");
--
--
--
-- 7 View the grade of the assignments I solved per course.
--
-- (student_id, course_id)
call getGrades(1, 1);
--
--
--
-- 8 View the announcements posted within the past 10 days about the school I am enrolled in.
--
-- (student_id)
call getAnnouncements(1);
--
--
--
-- 9 View all the information about activities offered by my school, as well as the teacher responsible
-- for it.
--
-- (student_id)
call getMySchoolActivities(1);
--
--
--
-- 10 Apply for activities in my school on the condition that I can not join two activities of the same
-- type on the same date.
--
-- (student_id, activity_id)
call joinActivity(1, 1);
--
--
--
-- 11 Join clubs offered by my school, if I am a highschool student.
--
-- (student_id, club_id)
call joinClub(1, 1);
--
--
--
-- 12 Search in a list of courses that i take by its name or code.
--
-- (student_id, input)
call searchCourses(1, 'Donuts');

-- “As a system administrator, I should be able to ...”
--
-- 1 Create a school with its information: school name, address, phone number, email, general information,
-- vision, mission, main language, type(national, international) and fees.
--
-- (name, email, vision, mission, general_info,in phone_number1, phone_number2, fees, address, main_language, type)
call insertSchool("Hogwarts", "hogwarts@hogwarts.com", "vision", "mission", "general_info", "012" ,"011", 5000, "right there", "English", "International");
--
-- (supplies, school_id)
call insertElementaryLevel("keep it in a dry place", 1);
--
-- (school_id)
call insertMiddleLevel(1);
--
-- (school_id)
call insertHighLevel(1);
--
--
--
-- 2 Add courses to the system with all of its information: course code, course name, course level (elementary,
-- middle, high), grade, description and prerequisite course(s).
--
-- (name, code, description, grade)
call insertCourse("Imaginary Numbers: Dragon Ball edidtion", "IN101", "How to dragon ball the Imaginary our of numbers", 7);
--
-- (course_id, req_course_id)
call insertPrerequisite(1, 2);
--
--
--
-- 3 Add admins to the system with their information: first name, middle name, last name, birthdate,
-- address, email, username, password, and gender. Given the school name, I should assign admins
-- to work in this school. Note that the salary of the admin depends on the type of the school. The
-- salary of an admin working in a national school is 3000 EGP, and that working in an international
-- school is 5000 EGP.
--
-- (school_name, username, password, first_name, middle_name, last_name, birth_date, address, email, gender)
call insertAdmin("Arkham", "heisenberg", "secret", "Walter", "W", "White", '1999-09-09', 'Meth lab second floor', "heisenberg@heisenberg.com", "Male");
--
--
--
-- 4 Delete a school from the database with all of its corresponding information. Students and employees
-- of this school should not be deleted from the system, but should not have a username and password
-- on the system until they are assigned to a new school again.
--
-- (school_id)
call deleteSchool(7);

-- “As a teacher, I should be able to ...”
--
-- 1 Sign up by providing my first name, middle name, last name, birthdate, address, email, and gender.
--
-- (first_name, middle_name, last_name, birth_date, address, email, gender, years_of_exp, phone_number, mobile_number1, mobile_number2)
call insertTeacher('Lil', 'Dai', 'The Brave' '1999-12-12', 'the brave st', 'lil@lil.com', 'Female', 2, null, null, null);
--
--
--
-- 2 View a list of courses’ names I teach categorized by level and grade.
--
-- (teacher_id)
call getCoursesITeach(6);
--
--
--
-- 3 Post assignments for the course(s) I teach. Every assignment has a posting date, due date and
-- content.
--
-- (post_date, due_date, content, course_id);
call insertAssignment('2016-11-11', '2016-11-29', 'Solve this by flux finite automaton', 1);
--
--
--
-- 4 View the students’ solutions for the assignments I posted ordered by students’ ids.
--
-- (teacher_id)
call getAssignmentsSolutions(1);
--
--
--
-- 5 Grade the students’ solutions for the assignments I posted.
--
-- (student_id, assignment_id, grade)
call gradeAssignment(1, 1, 10);
--
--
--
-- 6 Delete assignments.
--
-- (assignment_id)
call deleteAssignment(1);
--
--
--
-- 7 Write monthly reports about every student I teach. A report is issued on a specific date to a specific
-- student and contains my comment.
--
-- (report, teacher_id, student_id)
call insertReport("You little kid... deserve a cookie...", 1, 3);
--
--
--
-- 8 View the questions asked by the students for each course I teach.
--
-- (teacher_id)
call getQuestionsOfMyCourses(2);
--
--
--
-- 9 Answer the questions asked by the students for each course I teach.
--
-- (question_id, answer)
call answerQuestion(1, 'restart you router');
--
--
--
-- 10 View a list of students that i teach categorized by the grade and ordered by their name (first name
-- and last name).
--
-- (teacher_id)
call getMyStudents(6);
--
--
--
-- 11 View a list of students that did not join any activity.
--
call getStudentsJoinedNoActivity();
--
--
--
-- 12 Display the name of the high school student who is currently a member of the greatest number of
-- clubs.
--
-- (output)
call getMostActiveStudent(@ans);
select @ans as Name;

-- “As a system user (registered, or not registered), I should be able to ...”
--
-- 1 Search for any school by its name, address or its type (national/international).
--
-- (input)
call searchSchools("arkham");
--
--
--
-- 2 View a list of all available schools on the system categorized by their level.
--
call getElementaryLevels();
--
call getMiddleLevels();
--
call getHighLevels();
--
--
--
--
-- 3 View the information of a certain school along with the reviews written about it and teachers
-- teaching in this school
--
-- (school_id)
call getSchoolReviews(1);
--
-- (school_id)
call getSchoolTeachers(1);
