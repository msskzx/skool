-- “As a parent, I should be able to ...”
--
-- 1 Sign up by providing my name (first name and last name), contact email, mobile number(s), address,
-- home phone number, a unique username and password.
--
-- delimiter //
-- create procedure insertParent
-- (in username varchar(255), in password varchar(255), in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255), in email varchar(255), in address varchar(255), in phone_number int, in mobile_number1 int, in mobile_number2 int)
-- BEGIN
--    call insertUser(username, password, "Parent");
--
--    insert into parents
--    (first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2, username)
--    values
--    (first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2, username);
-- end //
-- delimiter ;
--
--
--
-- 2 Apply for my children in any school. For each child I should provide his/her social security number
-- (SSN), name, birthdate, and gender.
--
-- delimiter //
-- create procedure insertStudent
-- (in first_name varchar(255), in middle_name varchar(255), in last_name varchar(255),in SSN int, in birth_date date, in gender varchar(255))
-- BEGIN
-- insert into students
-- (first_name, middle_name, last_name, SSN, gender, birth_date)
-- values
-- (first_name, middle_name, last_name, SSN, gender, birth_date);
-- end //
-- delimiter ;
--
-- delimiter //
-- create procedure setParentStudent
-- (in student_id int unsigned, in parent_id int unsigned)
-- BEGIN
-- insert into parent_has_student
-- (student_id, parent_id)
-- values
-- (student_id, parent_id);
-- end //
-- delimiter ;
--
-- delimiter //
-- create procedure applyStudent
-- (in student_id int unsigned, in school_id int unsigned, in parent_id int unsigned)
-- BEGIN
-- insert into school_appliedInBy_student
-- (student_id, school_id, parent_id)
-- values
-- (student_id, school_id, parent_id);
-- end //
-- delimiter ;
--
--
--
-- 3 View a list of schools that accepted my children categorized by child.
--
-- delimiter //
-- create procedure getSchoolsAccepted
-- (in id int unsigned)
-- BEGIN
-- select *
-- from schools s
-- inner join school_appliedInBy_student sabs
-- on s.id = sabs.school_id
-- where sabs.parent_id = id and accepted = "Accepted"
-- order by sabs.student_id;
-- end //
-- delimiter ;
--
--
--
-- 4 Choose one of the schools that accepted my child to enroll him/her. The child remains unverified
-- (no username and password, refer to user story 2 for the administrator) until the admin verifies
-- him.
--
-- delimiter //
-- create procedure enrollStudent
-- (in student_id int unsigned, in school_id int unsigned)
-- BEGIN
-- update students set students.school_id = school_id
-- where students.id = student_id;
-- end //
-- delimiter ;
--
--
--
-- 5 View reports written about my children by their teachers.
--
-- delimiter //
-- create procedure getChildrenReports
-- (in parent_id int unsigned)
-- BEGIN
-- select *
-- from reports r
-- inner join parent_has_student phs
-- on r.student_id = phs.student_id and phs.parent_id = parent_id;
-- end //
-- delimiter ;
--
--
--
-- 6 Reply to reports written about my children by their teachers.
--
-- delimiter //
-- create procedure parentCommentReport
-- (in parent_id int unsigned, in report_id int unsigned, in parent_comment text)
-- BEGIN
-- insert into parent_repliesOn_report
-- (parent_id, report_id, parent_comment)
-- values
-- (parent_id, report_id, parent_comment);
-- end //
-- delimiter ;
--
--
--
-- 7 View a list of all schools of all my children ordered by its name.
--
-- delimiter //
-- create procedure getChildrenSchools
-- (in parent_id int unsigned)
-- BEGIN
-- select sc.*, st.*
-- from students st
-- inner join parent_has_student phs
-- on st.id = phs.student_id and phs.parent_id = parent_id
-- inner join schools sc
-- on sc.id = st.school_id
-- order by sc.name;
-- end //
-- delimiter ;
--
--
--
-- 8 View the announcements posted within the past 10 days about a school if one of my children is
-- enrolled in it.
--
-- delimiter //
-- create procedure getChildrenAnnouncements
-- (in parent_id int unsigned, in school_id int unsigned)
-- BEGIN
-- select a.*
-- from parent_has_student phs
-- inner join students st
-- on st.id = phs.student_id and phs.parent_id = parent_id and st.school_id = school_id
-- inner join schools sc
-- on sc.id = st.school_id
-- inner join announcements a
-- on a.school_id = sc.id and datediff(curdate(), a.date) < 10;
-- end //
-- delimiter ;
--
--
--
-- 9 Rate any teacher that teaches my children.
--
-- delimiter //
-- create procedure rateTeacher
-- (in parent_id int unsigned, in teacher_id int unsigned, in rate int)
-- BEGIN
-- insert into parent_rates_teacher
-- (parent_id, teacher_id, rate)
-- values
-- (parent_id, teacher_id, rate);
-- end //
-- delimiter ;
--
--
--
-- 10 Write reviews about my children’s school(s).
--
-- delimiter //
-- create procedure reviewSchool
-- (in parent_id int unsigned, in school_id int unsigned, in review mediumtext)
-- BEGIN
-- insert into parent_reviews_school
-- (parent_id, school_id, review)
-- values
-- (parent_id, school_id, review);
-- end //
-- delimiter ;
--
--
--
-- 11 Delete a review that i have written.
--
-- delimiter //
-- create procedure deleteReview
-- (in parent_id int unsigned, in school_id int unsigned)
-- BEGIN
-- delete from parent_reviews_school
-- where parent_reviews_school.parent_id = parent_id and parent_reviews_school.school_id = school_id;
-- end //
-- delimiter ;
--
--
--
-- 12 View the overall rating of a teacher, where the overall rating is calculated as the average of ratings
-- provided by parents to that teacher.
--
-- delimiter //
-- create procedure avgRating
-- (in id int unsigned)
-- BEGIN
-- select avg(rate)
-- from parent_rates_teacher
-- where teacher_id = id;
-- end //
-- delimiter ;
--
--
--
13 View the top 10 schools with the highest number of reviews or highest number of enrolled students.
This should exclude schools that my children are enrolled in.
--
delimiter //
create procedure topSchools
()
BEGIN
select sc.*
from schools sc
where sc.id in (
   select sc1.id
   from schools sc1
   inner join parent_reviews_school prs1
   on sc1.id = prs1.school_id and sc1.id not in(
      select sc.id
      from schools sc
      inner join students st
      on sc.id = st.school_id
      inner join parent_has_student phs
      on phs.student_id = st.id and phs.parent_id = 1
   )
group by sc1.id
order by count(*) desc
limit 10)
union
select sc.*
from schools sc
where sc.id in(
   select sc1.id
   from schools sc1
   inner join students st
   on sc1.id = st.school_id and sc1.id not in (
      select sc.id
      from schools sc
      inner join students st
      on sc.id = st.school_id
      inner join parent_has_student phs
      on phs.student_id = st.id and phs.parent_id = 1
   )
group by st.school_id
order by count(*) desc
limit 10);
end //
delimiter ;
--
--
--
-- 14 Find the international school which has a reputation higher than all national schools, i.e. has the
-- highest number of reviews.
--
-- delimiter //
-- create procedure popularInternational
-- ()
-- BEGIN
-- select sc.* from schools sc where sc.id in (
--    select sc1.id
--    from schools sc1
--    inner join parent_reviews_school prs1
--    on sc1.id = prs1.school_id
--    where sc1.type = "International"
--    group by sc1.id
--    having count(sc1.id) >
--    all(
--       select count(sc2.id)
--       from schools sc2
--       inner join parent_reviews_school prs2
--       on sc2.id = prs2.school_id
--       where sc2.type = "National"
--       group by sc2.id
--    ))
-- limit 1;
-- end //
-- delimiter ;
