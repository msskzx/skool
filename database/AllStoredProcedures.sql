-- “As a system administrator, I should be able to ...”

-- 1 Create a school with its information: school name, address, phone number, email, general information,
-- vision, mission, main language, type(national, international) and fees.

delimiter //
create procedure insertSchool
(in name varchar(255),in email varchar(255),in vision mediumtext,in mission mediumtext,in general_info mediumtext,in phone_number1 int ,in phone_number2 int,in fees int,in address varchar(255),in main_language varchar(255),in type varchar(255))
BEGIN
insert into schools
(name, email, vision, mission, general_info, phone_number1 ,phone_number2, fees, address, main_language, type)
values
(name, email, vision, mission, general_info, phone_number1 ,phone_number2, fees, address, main_language, type);
end //
delimiter ;

delimiter //
create procedure insertElementaryLevel
(in supplies mediumtext, in id int unsigned)
BEGIN

insert into elementary_levels
(id, supplies)
values
(id, supplies);

end //
delimiter ;

delimiter //
create procedure insertMiddleLevel
(in id int unsigned)
BEGIN

insert into middle_levels
(id)
values
(id);

end //
delimiter ;

delimiter //
create procedure insertHighLevel
(in id int unsigned)
BEGIN

insert into high_levels
(id)
values
(id);

end //
delimiter ;



-- 2 Add courses to the system with all of its information: course code, course name, course level (elementary,
-- middle, high), grade, description and prerequisite course(s).

delimiter //
create procedure insertCourse
(in name varchar(255), in code varchar(255), in description mediumtext, in grade int)
BEGIN
insert into courses
   (name, code, description, grade)
   values
   (name, code, description, grade);
end //
delimiter ;

delimiter //
create procedure insertPrerequisite
(in course_id int, in req_course_id int)
BEGIN
insert into course_requires_course
(course_id, req_course_id)
values
(course_id, req_course_id);
end //
delimiter ;



-- 3 Add admins to the system with their information: first name, middle name, last name, birthdate,
-- address, email, username, password, and gender. Given the school name, I should assign admins
-- to work in this school. Note that the salary of the admin depends on the type of the school. The
-- salary of an admin working in a national school is 3000 EGP, and that working in an international
-- school is 5000 EGP.

delimiter //
create procedure insertAdmin
(in school_name varchar(255), in username varchar(255), in password varchar(255), in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255), in birth_date date, in address varchar(255), in email varchar(255), in gender varchar(255))
BEGIN

declare school_id, employee_id int unsigned;
declare salary int;
declare school_type varchar(255);

call insertUser(username, password, "Employee");

select sc.id into school_id
from schools sc
where sc.name = school_name COLLATE utf8_unicode_ci;

insert into employees
(username, first_name, middle_name, last_name, role, birth_date, address, email, gender, school_id)
values
(username, first_name, middle_name, last_name, "Admin", birth_date, address, email, gender, school_id);

select e.id into employee_id
from employees e
where e.username = username COLLATE utf8_unicode_ci;

select sc.type into school_type
from schools sc
where sc.id = school_id;

if(school_type = 'National') then
set salary = 3000;
else
set salary = 5000;
end if;

insert into admins
(salary, id)
values
(salary, employee_id);

end //
delimiter ;



-- 4 Delete a school from the database with all of its corresponding information. Students and employees
-- of this school should not be deleted from the system, but should not have a username and password
-- on the system until they are assigned to a new school again.

delimiter //
create procedure deleteSchool
(in id int unsigned)
BEGIN

set sql_safe_updates = 0;

delete from users
where users.username in(
select students.username
from students
where students.school_id = id);

delete from users
where users.username in(
select employees.username
from employees
where employees.school_id = id);

delete from schools
where schools.id = id;

set sql_safe_updates = 1;
end //
delimiter ;

-- “As a system user (registered, or not registered), I should be able to ...”

-- 1 Search for any school by its name, address or its type (national/international).

delimiter //
create procedure searchSchools
(in input varchar(255))
BEGIN
select sc.* from schools sc
where sc.name like concat('%', input, '%') COLLATE utf8_unicode_ci or sc.address like concat('%', input,'%') COLLATE utf8_unicode_ci or sc.type = input COLLATE utf8_unicode_ci;
end //
delimiter ;



-- 2 View a list of all available schools on the system categorized by their level.

delimiter //
create procedure getElementaryLevels()
BEGIN
select sc.*, el.supplies
from schools sc inner join elementary_levels el
on sc.id = el.id;
end //
delimiter ;

delimiter //
create procedure getMiddleLevels()
BEGIN
select sc.*
from schools sc inner join middle_levels ml
on sc.id = ml.id;
end //
delimiter ;

delimiter //
create procedure getHighLevels()
BEGIN
select sc.*
from schools sc inner join high_levels hl
on sc.id = hl.id;
end //
delimiter ;



-- 3 View the information of a certain school along with the reviews written about it and teachers
-- teaching in this school

delimiter //
create procedure getSchoolReviews
(in school_id int)
BEGIN

select prs.*
from schools sc inner join parent_reviews_school prs
on sc.id = prs.school_id and sc.id = school_id;

end //
delimiter ;

delimiter //
create procedure getSchoolTeachers
(in school_id int)
BEGIN

select e.*, t.years_of_exp
from schools sc inner join employees e
on sc.id = e.school_id
inner join teachers t
on e.id = t.id and sc.id = school_id;

end //
delimiter ;

-- “As an administrator, I should be able to ...”

-- 1 View and verify teachers who signed up as employees of the school I am responsible of, and assign
-- to them a unique username and password. The salary of a teacher is calculated as follows: years of
-- experience * 500 EGP.
--
-- (school_id)
-- call getSchoolTeachers(1);

delimiter //
create procedure rejectTeacher
(in admin_id int unsigned, in teacher_id int unsigned)
BEGIN

declare school_id, school_id1 int unsigned;

select e.school_id into school_id
from employees e
where e.id = admin_id;

select e.school_id into school_id1
from employees e
where e.id = teacher_id;

if( school_id = school_id1) then

update employees set school_id = null
where employees.id = teacher_id;

end if;

end //
delimiter ;

delimiter //
create procedure insertUser
(in username varchar(255), in password varchar(255), in role varchar(255))
BEGIN
   insert into users
   (username, password, role)
   values
   (username, password, role);
end //
delimiter ;

delimiter //
create procedure setTeacherUsername
(in teacher_id int, in username varchar(255), in password varchar(255))
BEGIN

call insertUser(username, password, "Employee");

update employees set username = username
where employees.id = teacher_id;

end //
delimiter ;



-- 2 View and verify students who enrolled to the school I am responsible of, and assign to them a
-- unique username and password.


delimiter //
create procedure getMySchoolStudents
(in admin_id int unsigned)
BEGIN

declare school_id int unsigned;

select e.school_id into school_id
from employees e
where e.id = admin_id;

select *
from students st
where st.school_id = school_id;

end //
delimiter ;

delimiter //
create procedure setStudentUsername
(in student_id int unsigned, in username varchar(255), in password varchar(255))
BEGIN

call insertUser(username, password, "Student");

update students set username = username
where students.id = student_id;

call setStudentGrade(student_id);

end //
delimiter ;

delimiter //
create procedure setStudentGrade
(in student_id int unsigned)
BEGIN

declare grade, age int;

select year(curdate()) - year(birth_date) into age
from students st
where st.id = student_id;

set grade = age - 5;

update students set grade = grade
where students.id = student_id;

end //
delimiter ;



-- 3 Add other admins to the school I am working in. An admin has first name, middle name, last name,
-- birthdate, address, email, username, password, and gender. Note that the salary of the admin
-- depends on the type of the school.
--
-- (school_name, username, password, first_name, middle_name, last_name, birth_date, address, email, gender)
-- call insertAdmin("Arkham", "heisenberg", "secret", "Walter", "W", "White", '1999-09-09', 'Meth lab second floor', "heisenberg@heisenberg.com", "Male");



-- 4 Delete employees and students from the system.

delimiter //
create procedure deleteStudent
(in id int)
BEGIN
   delete from students
   where students.id = id;
end //
delimiter ;

delimiter //
create procedure deleteEmployee
(in id int)
BEGIN
   delete from employees
   where employees.id = id;
end //
delimiter ;



-- 5 Edit the information of the school I am working in.

delimiter //
create procedure updateSchool
(in admin_id int unsigned, in name varchar(255), in email varchar(255), in vision mediumtext, in mission mediumtext, in general_info mediumtext, in phone_number1 int , in phone_number2 int, in fees int, in address varchar(255), in main_language varchar(255), in type varchar(255))
BEGIN

declare school_id int unsigned;

select e.school_id into school_id
from employees e
where e.id = admin_id;

update schools set name = name, email = email, vision = vision, mission = mission, general_info = general_info, phone_number1 = phone_number1, phone_number2 = phone_number2, fees = fees, address = address, main_language = main_language, type = type
where schools.id = school_id;

end //
delimiter ;


-- 6 Post announcements with the following information: date, title, description and type

delimiter //
create procedure insertAnnouncement
(in date date,in title varchar(255),in description mediumtext,in type varchar(255),in admin_id int)
BEGIN

declare school_id int unsigned;

select e.school_id into school_id
from admins a
inner join employees e
on a.employee_id = e.id and a.id = admin_id;

insert into announcements
(date, title, description, type, admin_id, school_id)
values
(date, title, description, type, admin_id, school_id);
end //
delimiter ;



-- 7 Create activities and assign every activity to a certain teacher. An activity has its own date, location
-- in school, type, equipment(if any), and description.

delimiter //
create procedure insertActivity
(in date date,in location varchar(255),in description mediumtext,in type varchar(255), in equipment varchar(255), in admin_id int unsigned, in teacher_id int unsigned)
BEGIN

declare school_id int unsigned;

select e.school_id into school_id
from employees e
where e.id = admin_id;

insert into activities
(date, location, description, type, equipment, admin_id, teacher_id, school_id)
values
(date, location, description, type, equipment, admin_id, teacher_id, school_id);
end //
delimiter ;



-- 8 Change the teacher assigned to an activity.

delimiter //
create procedure assignTeacherActivity
(in id int, in teacher_id int, in admin_id int)
BEGIN
update activities
set teacher_id = teacher_id, admin_id = admin_id
where activities.id = id;
end //
delimiter ;



-- 9 Assign teachers to courses that are taught in my school based on the levels it offers.

delimiter //
create procedure updateTeacherCourse
(in id int, in teacher_id int)
BEGIN
update courses
set teacher_id = teacher_id
where courses.id = id;
end //
delimiter ;



-- 10 Assign teachers to be supervisors to other teachers.

delimiter //
create procedure assignSupervisor
(in id int, in supervisor_id int)
BEGIN
update teachers
set supervisor_id = supervisor_id
where teachers.id = id;
end //
delimiter ;



-- 11 Accept or reject the application submitted by parents to their children.

delimiter //
create procedure acceptStudent
(in admin_id int unsigned, in student_id int unsigned, in accepted varchar(255))
BEGIN

declare school_id int unsigned;

select e.school_id into school_id
from employees e
where e.id = admin_id;

update school_appliedInBy_student
set accepted = accepted
where school_appliedInBy_student.student_id = student_id
and school_appliedInBy_student.school_id = school_id;
end //
delimiter ;

-- “As a parent, I should be able to ...”

-- 1 Sign up by providing my name (first name and last name), contact email, mobile number(s), address,
-- home phone number, a unique username and password.

delimiter //
create procedure insertParent
(in username varchar(255), in password varchar(255), in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255), in email varchar(255), in address varchar(255), in phone_number int, in mobile_number1 int, in mobile_number2 int)
BEGIN

   call insertUser(username, password, "Parent");

   insert into parents
   (first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2, username)
   values
   (first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2, username);

end //
delimiter ;



-- 2 Apply for my children in any school. For each child I should provide his/her social security number
-- (SSN), name, birthdate, and gender.

delimiter //
create procedure insertStudent
(in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255),in SSN int, in birth_date date, in gender varchar(255))
BEGIN

insert into students
(first_name, middle_name, last_name, SSN, gender, birth_date)
values
(first_name, middle_name, last_name, SSN, gender, birth_date);

end //
delimiter ;

delimiter //
create procedure setParentStudent
(in student_id int unsigned, in parent_id int unsigned)
BEGIN
insert into parent_has_student
(student_id, parent_id)
values
(student_id, parent_id);
end //
delimiter ;

delimiter //
create procedure applyStudent
(in student_id int unsigned, in school_id int unsigned, in parent_id int unsigned)
BEGIN
insert into school_appliedInBy_student
(student_id, school_id, parent_id)
values
(student_id, school_id, parent_id);
end //
delimiter ;



-- 3 View a list of schools that accepted my children categorized by child.

delimiter //
create procedure getSchoolsAccepted
(in parent_id int unsigned)
BEGIN

select *
from schools s
inner join school_appliedInBy_student sabs
on s.id = sabs.school_id
where sabs.parent_id = parent_id and accepted = "Accepted"
order by sabs.student_id;

end //
delimiter ;



4 Choose one of the schools that accepted my child to enroll him/her. The child remains unverified
(no username and password, refer to user story 2 for the administrator) until the admin verifies
him.

delimiter //
create procedure enrollStudent
(in student_id int unsigned, in school_id int unsigned)
BEGIN
update students set students.school_id = school_id
where students.id = student_id;
end //
delimiter ;



-- 5 View reports written about my children by their teachers.

delimiter //
create procedure getChildrenReports
(in parent_id int unsigned)
BEGIN
select *
from reports r
inner join parent_has_student phs
on r.student_id = phs.student_id and phs.parent_id = parent_id;
end //
delimiter ;



6 Reply to reports written about my children by their teachers.

delimiter //
create procedure parentCommentReport
(in parent_id int unsigned, in report_id int unsigned, in parent_comment text)
BEGIN
insert into parent_repliesOn_report
(parent_id, report_id, parent_comment)
values
(parent_id, report_id, parent_comment);
end //
delimiter ;



-- 7 View a list of all schools of all my children ordered by its name.

delimiter //
create procedure getChildrenSchools
(in parent_id int unsigned)
BEGIN
select sc.*, st.*
from students st
inner join parent_has_student phs
on st.id = phs.student_id and phs.parent_id = parent_id
inner join schools sc
on sc.id = st.school_id
order by sc.name;
end //
delimiter ;



-- 8 View the announcements posted within the past 10 days about a school if one of my children is
-- enrolled in it.

delimiter //
create procedure getChildrenAnnouncements
(in parent_id int unsigned, in school_id int unsigned)
BEGIN
select a.*
from parent_has_student phs
inner join students st
on st.id = phs.student_id and phs.parent_id = parent_id and st.school_id = school_id
inner join schools sc
on sc.id = st.school_id
inner join announcements a
on a.school_id = sc.id and datediff(curdate(), a.date) < 10;
end //
delimiter ;



-- 9 Rate any teacher that teaches my children.

delimiter //
create procedure rateTeacher
(in parent_id int unsigned, in teacher_id int unsigned, in rate int)
BEGIN
insert into parent_rates_teacher
(parent_id, teacher_id, rate)
values
(parent_id, teacher_id, rate);
end //
delimiter ;



-- 10 Write reviews about my children’s school(s).

delimiter //
create procedure reviewSchool
(in parent_id int unsigned, in school_id int unsigned, in title varchar(255), in review mediumtext)
BEGIN
insert into parent_reviews_school
(parent_id, school_id, title, review)
values
(parent_id, school_id, title, review);
end //
delimiter ;



-- 11 Delete a review that i have written.

delimiter //
create procedure deleteReview
(in parent_id int unsigned, in school_id int unsigned)
BEGIN
delete from parent_reviews_school
where parent_reviews_school.parent_id = parent_id and parent_reviews_school.school_id = school_id;
end //
delimiter ;



-- 12 View the overall rating of a teacher, where the overall rating is calculated as the average of ratings
-- provided by parents to that teacher.

delimiter //
create procedure avgRating
(in teacher_id int unsigned, out ans float(3, 1))
BEGIN

select avg(rate) into ans
from parent_rates_teacher prt
where prt.teacher_id = teacher_id;

end //
delimiter ;



-- 13 View the top 10 schools with the highest number of reviews or highest number of enrolled students.
-- This should exclude schools that my children are enrolled in.

delimiter //
create procedure topSchools
(in parent_id int unsigned)
BEGIN

select distinct id, name, email, vision, mission, general_info, phone_number1 ,phone_number2, fees, address, main_language, type
from(
select new_table.*
from (
   select count(*) as countX, sc1.*
   from schools sc1
   inner join parent_reviews_school prs1
   on sc1.id = prs1.school_id and sc1.id not in(
      select sc.id
      from schools sc
      inner join students st
      on sc.id = st.school_id
      inner join parent_has_student phs
      on phs.student_id = st.id and phs.parent_id = parent_id
   )
   group by sc1.id
   order by countX desc
   limit 10) new_table

union

select new_table.*
from (
   select count(*) as countX, sc1.*
   from schools sc1
   inner join students st
   on sc1.id = st.school_id and sc1.id not in (
      select sc.id
      from schools sc
      inner join students st
      on sc.id = st.school_id
      inner join parent_has_student phs
      on phs.student_id = st.id and phs.parent_id = parent_id
   )
   group by st.school_id
   order by count(*) desc
   limit 10) new_table
) final_table
order by countX desc
limit 10;
end //
delimiter ;



-- 14 Find the international school which has a reputation higher than all national schools, i.e. has the
-- highest number of reviews.

delimiter //
create procedure popularInternational
()
BEGIN
select sc.* from schools sc where sc.id in (
   select sc1.id
   from schools sc1
   inner join parent_reviews_school prs1
   on sc1.id = prs1.school_id
   where sc1.type = "International"
   group by sc1.id
   having count(sc1.id) >
   all(
      select count(sc2.id)
      from schools sc2
      inner join parent_reviews_school prs2
      on sc2.id = prs2.school_id
      where sc2.type = "National"
      group by sc2.id
   ))
limit 1;
end //
delimiter ;

-- “As an enrolled student, I should be able to ...”

-- 1 Update my account information except for the username.

delimiter //
create procedure updateStudent
(in student_id int unsigned, in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255),in SSN int, in birth_date date, in gender varchar(255), in email varchar(255))
BEGIN
update students
set first_name = first_name, middle_name = middle_name, last_name = last_name, SSN = SSN, gender = gender, birth_date = birth_date, email = email
where students.id = student_id;
end //
delimiter ;



-- 2 View a list of courses’ names assigned to me based on my grade ordered by name.

delimiter //
create procedure getStudentCourses
(in student_id int unsigned)
BEGIN

select c.*
from courses c
inner join course_has_student chs
on c.id = chs.course_id and chs.student_id = student_id
order by c.name;

end //
delimiter ;

-- 3 Post questions I have about a certain course.

delimiter //
create procedure insertQuestion
(in student_id int unsigned, in course_id int unsigned, in title varchar(255), in question mediumtext)
BEGIN

insert into questions
(title, question, student_id, course_id)
values
(title, question, student_id, course_id);

end //
delimiter ;



-- 4 View all questions asked by other students on a certain course along with their answers.

delimiter //
create procedure getQuestionsByOthers
(in student_id int unsigned, in course_id int unsigned)
BEGIN

select *
from questions q
where q.student_id <> student_id and q.course_id = course_id;

end //
delimiter ;



-- 5 View the assignments posted for the courses I take.

delimiter //
create procedure getMyAssignments
(in student_id int unsigned)
BEGIN

select a.*
from assignments a
inner join course_has_student chs
on a.course_id = chs.course_id and chs.student_id = student_id;

end //
delimiter ;



-- 6 Solve assignments posted for courses I take.

delimiter //
create procedure insertSolution
(in student_id int unsigned, in assignment_id int unsigned, in solution mediumtext)
BEGIN

insert into assignment_solvedBy_student
(assignment_id, student_id, solution)
values
(assignment_id, student_id, solution);

end //
delimiter ;



-- 7 View the grade of the assignments I solved per course.

delimiter //
create procedure getGrades
(in student_id int unsigned, in course_id int unsigned)
BEGIN

select a.name, asbs.grade
from assignment_solvedBy_student asbs
inner join assignments a
on asbs.assignment_id = a.id and asbs.student_id =  student_id and a.course_id = course_id;

end //
delimiter ;



-- 8 View the announcements posted within the past 10 days about the school I am enrolled in.

delimiter //
create procedure getSchoolAnnouncements
(in school_id int unsigned)
BEGIN

select a.*
from announcements a
where a.school_id = school_id and datediff(curdate(), a.date) < 10;

end //
delimiter ;



-- 9 View all the information about activities offered by my school, as well as the teacher responsible
-- for it.

delimiter //
create procedure getSchoolActivities
(in school_id int unsigned)
BEGIN

select a.*, e.first_name, e.last_name
from activities a
inner join teachers t
on a.teacher_id = t.id and a.school_id = school_id
inner join employees e
on e.id = t.id;

end //
delimiter ;



-- 10 Apply for activities in my school on the condition that I can not join two activities of the same
-- type on the same date.

delimiter //
create procedure joinActivity
(in student_id int unsigned, in activity_id int unsigned)
BEGIN

declare acount int;
declare atype varchar(255);
declare adate date;
declare school_id1, school_id2 int unsigned;

select st.school_id into school_id1
from students st
where st.id = student_id;

select a.school_id into school_id2
from activities a
where a.id = activity_id;

if(school_id1 = school_id2) then

select a.type, a.date into atype, adate
from activities a
where a.id = activity_id;

select count(*) into acount
from activities a
inner join activity_joinedBy_student ajbs
on a.id = ajbs.activity_id and ajbs.student_id = student_id
and a.type = atype COLLATE utf8_unicode_ci and a.date = adate;

if(acount = 0) then
insert into activity_joinedBy_student
   (student_id, activity_id)
   values
   (student_id, activity_id);
end if;

end if;

end //
delimiter ;



-- 11 Join clubs offered by my school, if I am a highschool student.

delimiter //
create procedure joinClub
(in student_id int unsigned, in club_id int unsigned)
BEGIN

declare grade int;

select s.grade into grade
from students s
where s.id = student_id;

if(grade > 8) then
   insert into club_joinedBy_student
   (student_id, club_id)
   values
   (student_id, club_id);
end if;

end //
delimiter ;



-- 12 Search in a list of courses that i take by its name or code.

delimiter //
create procedure searchCourses
(in student_id int unsigned, in input varchar(255))
BEGIN

select c.*
from courses c
inner join course_has_student chs
on c.id = chs.course_id and chs.student_id = student_id and
(c.name like concat('%', input, '%') COLLATE utf8_unicode_ci or c.code like concat('%', input, '%') COLLATE utf8_unicode_ci);

end //
delimiter ;



get all information of a student and his age

delimiter //
create procedure getAge
(in student_id int unsigned)
BEGIN

select *, year(curdate()) - year(birth_date) as age
from students s
where s.id = student_id;

end //
delimiter ;

-- “As a teacher, I should be able to ...”

-- 1 Sign up by providing my first name, middle name, last name, birthdate, address, email, and gender.

delimiter //
create procedure insertTeacher
(in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255), in birth_date date, in address varchar(255), in email varchar(255), in gender varchar(255), in years_of_exp int, in phone_number varchar(255), in mobile_number1 varchar(255), in mobile_number2 varchar(255))
BEGIN

declare id int unsigned;

insert into employees
(first_name, middle_name, last_name, role, birth_date, address, email, gender, phone_number, mobile_number1, mobile_number2)
values
(first_name, middle_name, last_name, "Teacher", birth_date, address, email, gender, phone_number, mobile_number1, mobile_number2);

select e.id into id
from employees e
where e.email = email COLLATE utf8_unicode_ci;

insert into teachers
(id, years_of_exp)
values
(id, years_of_exp);

end //
delimiter ;

delimiter //
create procedure applySchoolTeacher
(in teacher_id int unsigned, in school_id int unsigned)
BEGIN

update employees set school_id = school_id
where employees.id = teacher_id;

end //
delimiter ;


-- 2 View a list of courses’ names I teach categorized by level and grade.

delimiter //
create procedure getCoursesITeach
(in teacher_id int unsigned)
BEGIN

select *
from courses c
where c.teacher_id = teacher_id
order by grade;

end //
delimiter ;



-- 3 Post assignments for the course(s) I teach. Every assignment has a posting date, due date and
-- content.

delimiter //
create procedure insertAssignment
(in name varchar(255), in post_date date, in due_date date, in content mediumtext, in course_id int unsigned)
BEGIN

declare teacher_id int unsigned;

select c.teacher_id into teacher_id
from courses c
where c.id = course_id;

insert into assignments
(name, post_date, due_date, content, teacher_id, course_id)
values
(name, post_date, due_date, content, teacher_id, course_id);

end //
delimiter ;



-- 4 View the students’ solutions for the assignments I posted ordered by students’ ids.

delimiter //
create procedure getAssignmentsSolutions
(in teacher_id int unsigned)
BEGIN

select *
from assignment_solvedBy_student asbs
inner join assignments a
on asbs.assignment_id = a.id and a.teacher_id = teacher_id
order by student_id;

end //
delimiter ;



-- 5 Grade the students’ solutions for the assignments I posted.

delimiter //
create procedure gradeAssignment
(in student_id int unsigned, in assignment_id int unsigned, in grade int)
BEGIN

update assignment_solvedBy_student
set assignment_solvedBy_student.grade = grade
where assignment_solvedBy_student.student_id = student_id and assignment_solvedBy_student.assignment_id = assignment_id;

end //
delimiter ;



-- 6 Delete assignments.

delimiter //
create procedure deleteAssignment
(in assignment_id int unsigned)
BEGIN

delete from assignments
where assignments.id = assignment_id;

end //
delimiter ;



-- 7 Write monthly reports about every student I teach. A report is issued on a specific date to a specific
-- student and contains my comment.

delimiter //
create procedure insertReport
(in report mediumtext, in teacher_id int unsigned, in student_id int unsigned)
BEGIN

insert into reports
(report, teacher_id, student_id)
values
(report, teacher_id, student_id);

end //
delimiter ;



-- 8 View the questions asked by the students for each course I teach.

delimiter //
create procedure getQuestionsOfMyCourses
(in teacher_id int unsigned)
BEGIN

select *
from questions q
inner join courses c
on q.course_id = c.id and c.teacher_id = teacher_id;

end //
delimiter ;



-- 9 Answer the questions asked by the students for each course I teach.

delimiter //
create procedure answerQuestion
(in question_id int unsigned, in answer mediumtext)
BEGIN

update questions
set questions.answer = answer
where questions.id = question_id;

end //
delimiter ;



-- 10 View a list of students that i teach categorized by the grade and ordered by their name (first name
-- and last name).

delimiter //
create procedure getMyStudents
(in teacher_id int unsigned)
BEGIN

select distinct s.* from students s
inner join course_has_student chs
on s.id = chs.student_id
inner join courses c
on c.id = chs.course_id
where c.teacher_id = teacher_id
order by s.grade, s.first_name, s.last_name;

end //
delimiter ;



-- 11 View a list of students that did not join any activity.

delimiter //
create procedure getStudentsJoinedNoActivity
()
BEGIN

select *
from students s1
where s1.id not in(
select s2.id
from students s2
inner join activity_joinedBy_student ajbs
on ajbs.student_id = s2.id);

end //
delimiter ;



-- 12 Display the name of the high school student who is currently a member of the greatest number of
-- clubs.

delimiter //
create procedure getMostActiveStudent
(out name varchar(255))
BEGIN

select concat(first_name, ' ', middle_name, ' ', last_name) into name
from students where id = (
select st.id
from students st
inner join club_joinedby_student cjbs
on st.id = cjbs.student_id
group by st.id
order by count(*) desc
limit 1);

end //
delimiter ;



delimiter //
create procedure getCourseAssignments
(in course_id int unsigned)
BEGIN

select a.* from assignments a where a.id = course_id;

end //
delimiter ;



delimiter //
create procedure getSchoolClubs
(in school_id int unsigned)
BEGIN

select c.* from clubs c where c.id = school_id;

end //
delimiter ;
