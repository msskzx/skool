-- “As a teacher, I should be able to ...”
--
-- 1 Sign up by providing my first name, middle name, last name, birthdate, address, email, and gender.
--
-- (first_name, middle_name, last_name, role, birth_date, address, email, gender)
-- call insertTeacher('Lil', 'Dai', 'The Brave', 'Teacher', '1999-12-12', 'the brave st', 'lil@lil.com', 'Female');
--
--
--
-- 2 View a list of courses’ names I teach categorized by level and grade.
--
-- (teacher_id)
-- call getCoursesITeach(1);
--
--
--
-- 3 Post assignments for the course(s) I teach. Every assignment has a posting date, due date and
-- content.
--
-- (post_date, due_date, content, teacher_id, course_id);
-- call insertAssignment('2016-11-11', '2016-11-29', 'Solve this by flux finite automaton', 1, 1);
--
--
--
-- 4 View the students’ solutions for the assignments I posted ordered by students’ ids.
--
-- (teacher_id)
-- call getAssignmentsSolutions(1);
--
--
--
-- 5 Grade the students’ solutions for the assignments I posted.
--
-- (student_id, assignment_id, grade)
-- call gradeAssignment(1, 1, 10);
--
--
--
-- 6 Delete assignments.
--
-- (assignment_id)
-- call deleteAssignment(1);
--
--
--
-- 7 Write monthly reports about every student I teach. A report is issued on a specific date to a specific
-- student and contains my comment.
--
-- (report, teacher_id, student_id)
-- call insertReport("You little kid... deserve a cookie...", 1, 3);
--
--
--
-- 8 View the questions asked by the students for each course I teach.
--
-- (teacher_id)
-- call getQuestionsOfMyCourses(2);
--
--
--
-- 9 Answer the questions asked by the students for each course I teach.
--
-- (question_id, answer)
-- call answerQuestion(1, 'restart you router');
--
--
--
-- 10 View a list of students that i teach categorized by the grade and ordered by their name (first name
-- and last name).
--
-- (teacher_id)
-- call getMyStudents(2);
--
--
--
-- 11 View a list of students that did not join any activity.
--
-- call getStudentsJoinedNoActivity();
--
--
--
-- 12 Display the name of the high school student who is currently a member of the greatest number of
-- clubs.
--
-- call getMostActiveStudent(@name);
-- select @name;
