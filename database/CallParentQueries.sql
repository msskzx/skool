-- 1 Sign up by providing my name (first name and last name), contact email, mobile number(s), address,
-- home phone number, a unique username and password.
--
-- (username, password, first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2)
-- call insertParent('gangsta', 'secret', 'TheGodFather', 'Darth', 'Vader', 'gangsta@gangsta.com', 'along this road', '09999', '09990','09991');
--
--
--
-- 2 Apply for my children in any school. For each child I should provide his/her social security number
-- (SSN), name, birthdate, and gender.
--
-- (first_name, middle_name, last_name, SSN, birth_date, gender)
-- call insertStudent('Lithariel', 'Talion', 'IDK', 121412, '1990-09-09', 'Female');
-- (student_id, parent_id)
-- call setParentStudent(6, 5);
-- (student_id, school_id, parent_id)
-- call applyStudent(6, 1, 5);
--
--
--
-- 3 View a list of schools that accepted my children categorized by child.
-- (parent_id)
-- call getSchoolsAccepted(1);
--
--
--
-- 4 Choose one of the schools that accepted my child to enroll him/her. The child remains unverified
-- (no username and password, refer to user story 2 for the administrator) until the admin verifies
-- him.
--
-- (student_id, school_id)
-- call enrollStudent(6, 1);
--
--
--
-- 5 View reports written about my children by their teachers.
--
-- (parent_id)
-- call getChildrenReports(1);
--
--
--
-- 6 Reply to reports written about my children by their teachers.
--
-- (parent_id, report_id, parent_comment)
-- call parentCommentReport(1, 1, "Why you no teach well?");
--
--
--
-- 7 View a list of all schools of all my children ordered by its name.
--
-- (parent_id)
-- call getChildrenSchools(1);
--
--
--
-- 8 View the announcements posted within the past 10 days about a school if one of my children is
-- enrolled in it.
--
-- (parent_id, school_id)
-- call getChildrenAnnouncements(1, 1);
--
--
--
-- 9 Rate any teacher that teaches my children.
--
-- (parent_id, teacher_id, rate)
-- call rateTeacher(1, 1, 8);
--
--
--
-- 10 Write reviews about my children’s school(s).
--
-- (parent_id, school_id, review)
-- call reviewSchool(1, 6, "This is sehr gut");
--
--
--
-- 11 Delete a review that i have written.
--
-- (parent_id, school_id)
-- call reviewSchool(1, 4);
--
--
--
-- 12 View the overall rating of a teacher, where the overall rating is calculated as the average of ratings
-- provided by parents to that teacher.
--
-- (teacher_id)
-- call avgRating(2);
--
--
--
-- 13 View the top 10 schools with the highest number of reviews or highest number of enrolled students.
-- This should exclude schools that my children are enrolled in.
--
-- (parent_id)
-- call topSchools(0);
--
--
--
-- 14 Find the international school which has a reputation higher than all national schools, i.e. has the
-- highest number of reviews.
--
-- call popularInternational();
