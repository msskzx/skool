-- “As an enrolled student, I should be able to ...”
--
-- 1 Update my account information except for the username.
--
-- delimiter //
-- create procedure updateStudent
-- (in student_id int unsigned, in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255),in SSN int, in birth_date date, in gender varchar(255))
-- BEGIN
-- update students
-- set first_name = first_name, middle_name = middle_name, last_name = last_name, SSN = SSN, gender = gender, birth_date = birth_date
-- where students.id = student_id;
-- end //
-- delimiter ;
--
--
--
-- 2 View a list of courses’ names assigned to me based on my grade ordered by name.
--
-- delimiter //
-- create procedure getMyCourses
-- (in id int unsigned)
-- BEGIN
--
-- select c.name
-- from courses c
-- inner join course_has_student chs
-- on c.id = chs.course_id and chs.student_id = id
-- order by c.name;
--
-- end //
-- delimiter ;

-- 3 Post questions I have about a certain course.
--
-- delimiter //
-- create procedure insertQuestion
-- (in student_id int unsigned, in course_id int unsigned, in title varchar(255), in question mediumtext)
-- BEGIN
--
-- insert into questions
-- (title, question, student_id, course_id)
-- values
-- (title, question, student_id, course_id);
--
-- end //
-- delimiter ;
--
--
--
-- 4 View all questions asked by other students on a certain course along with their answers.
--
-- delimiter //
-- create procedure updateStudent
-- (in student_id int unsigned, in course_id int unsigned)
-- BEGIN
--
-- select *
-- from questions q
-- where q.student_id <> student_id and q.course_id = course_id;
--
-- end //
-- delimiter ;
--
--
--
-- 5 View the assignments posted for the courses I take.
--
-- delimiter //
-- create procedure getMyAssignments
-- (in student_id int unsigned)
-- BEGIN
--
-- select a.*
-- from assignments a
-- inner join course_has_student chs
-- on a.course_id = chs.course_id and chs.student_id = student_id;
--
-- end //
-- delimiter ;
--
--
--
-- 6 Solve assignments posted for courses I take.
--
-- delimiter //
-- create procedure insertSolution
-- (in student_id int unsigned, in assignment_id int unsigned, in solution mediumtext)
-- BEGIN
--
-- insert into assignment_solvedBy_student
-- (assignment_id, student_id, solution)
-- values
-- (assignment_id, student_id, solution);
--
-- end //
-- delimiter ;
--
--
--
-- 7 View the grade of the assignments I solved per course.
--
-- delimiter //
-- create procedure getGrades
-- (in student_id int unsigned, in course_id int unsigned)
-- BEGIN
--
-- select a.id, asbs.grade
-- from assignment_solvedBy_student asbs
-- inner join assignments a
-- on asbs.assignment_id = a.id
-- where asbs.student_id =  student_id and a.course_id = course_id;
--
-- end //
-- delimiter ;
--
--
--
-- 8 View the announcements posted within the past 10 days about the school I am enrolled in.
--
-- delimiter //
-- create procedure getAnnouncements
-- (in student_id int unsigned)
-- BEGIN
--
-- select a.*
-- from announcements a
-- inner join students st
-- on a.school_id = st.school_id and st.id = student_id and datediff(curdate(), a.date) < 10;
--
-- end //
-- delimiter ;
--
--
--
-- 9 View all the information about activities offered by my school, as well as the teacher responsible
-- for it.
--
-- delimiter //
-- create procedure getMySchoolActivities
-- (in student_id int unsigned)
-- BEGIN
--
-- declare school_id int unsigned;
--
-- select st.school_id into school_id
-- from students st
-- where st.id = student_id;
--
-- select a.*, t.*
-- from activities a
-- inner join teachers t
-- on a.teacher_id = t.id and a.school_id = school_id;
--
-- end //
-- delimiter ;
--
--
--
-- 10 Apply for activities in my school on the condition that I can not join two activities of the same
-- type on the same date.
--
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

if(school_id1 <> school_id2) then

select a.type into atype
from activities a
where a.id = activity_id;

select a.date into adate
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
--
--
--
-- 11 Join clubs offered by my school, if I am a highschool student.
--
-- delimiter //
-- create procedure joinClub
-- (in student_id int unsigned, in club_id int unsigned)
-- BEGIN
--
-- declare grade int;
--
-- select s.grade into grade
-- from students s
-- where s.id = student_id;
--
-- if(grade > 8) then
--    insert into club_joinedBy_student
--    (student_id, club_id)
--    values
--    (student_id, club_id);
-- end if;
--
-- end //
-- delimiter ;
--
--
--
-- 12 Search in a list of courses that i take by its name or code.
--
-- delimiter //
-- create procedure searchCourses
-- (in student_id int unsigned, in name varchar(255), in code varchar(255))
-- BEGIN
--
-- select c.*
-- from courses c
-- inner join course_has_student chs
-- on c.id = chs.course_id and chs.student_id = student_id and
-- (c.name like concat('%', name, '%') COLLATE utf8_unicode_ci or c.code like concat('%', code, '%') COLLATE utf8_unicode_ci);
--
-- end //
-- delimiter ;
--
--
--
-- calculating students ages
-- delimiter //
-- create procedure getAge
-- (in id int unsigned)
-- BEGIN
--
-- select *, year(curdate()) - year(birth_date) as age
-- from students s
-- where s.id = id;
--
-- end //
-- delimiter ;
--
--
--
-- delimiter //
-- create procedure getAllAges
-- ()
-- BEGIN
--
-- select *, year(curdate()) - year(birth_date) as age
-- from students s;
--
-- end //
