-- “As a parent, I should be able to ...”
--
-- 1 Sign up by providing my name (first name and last name), contact email, mobile number(s), address,
-- home phone number, a unique username and password.
--
-- insert into users
-- (username, password, role)
-- values
-- ('dad', 'secret', 'Parent');
--
-- insert into parents
-- (first_name, middle_name, last_name, email, address, phone_number, mobile_number1, mobile_number2, username)
-- values
-- ('TheGodFather', 'Darth', 'Vader', 'vader@vader.com', 'milky way st.', '09999', '09990','09991','vader');
--
--
--
-- 2 Apply for my children in any school. For each child I should provide his/her social security number
-- (SSN), name, birthdate, and gender.
--
-- insert into students
-- (first_name, middle_name, last_name, SSN, gender, birth_date)
-- values
-- ('Goku', 'Dad', 'Vader', 83289, 'Male', '2005-12-12');
--
--
--
-- 3 View a list of schools that accepted my children categorized by child.
-- select *
-- from schools s
-- inner join school_appliedInBy_student sabs
-- on s.id = sabs.school_id
-- where sabs.parent_id = 1 and accepted = True
-- order by sabs.student_id;
--
--
--
-- 4 Choose one of the schools that accepted my child to enroll him/her. The child remains unverified
-- (no username and password, refer to user story 2 for the administrator) until the admin verifies
-- him.
-- update students set school_id = 1
-- where id = 3;
--
--
--
-- 5 View reports written about my children by their teachers.
--
-- select r.*
-- from reports r
-- inner join parent_has_student phs
-- on r.student_id = phs.student_id and phs.parent_id = 1;
--
--
--
-- 6 Reply to reports written about my children by their teachers.
--
-- insert into parent_repliesOn_report
-- (parent_id, report_id, parent_comment)
-- values
-- (1, 1, "That is true.");
--
--
--
-- 7 View a list of all schools of all my children ordered by its name.
--
-- select *
-- from schools sc
-- inner join students st
-- on sc.id = st.school_id
-- inner join parent_has_student phs
-- on st.id = phs.student_id and phs.parent_id = 1
-- order by sc.name;
--
--
--
-- 8 View the announcements posted within the past 10 days about a school if one of my children is
-- enrolled in it.
--
-- select st.first_name, a.*
-- from parent_has_student phs
-- inner join students st
-- on st.id = phs.student_id and phs.parent_id = 1
-- inner join schools sc
-- on sc.id = st.school_id
-- inner join announcements a
-- on a.school_id = sc.id and datediff(curdate(), a.date) < 10;
--
--
--
-- 9 Rate any teacher that teaches my children.
--
-- insert into parent_rates_teacher
-- (parent_id, teacher_id, rate)
-- values
-- (1, 2, 9);
--
--
--
-- 10 Write reviews about my children’s school(s).
--
-- insert into parent_reviews_school
-- (parent_id, school_id, review)
-- values
-- (1, 1, "Nice play ground you have");
--
--
--
-- 11 Delete a review that i have written.
--
-- delete from parent_reviews_school
-- where id = 1;
--
--
--
-- 12 View the overall rating of a teacher, where the overall rating is calculated as the average of ratings
-- provided by parents to that teacher.
--
-- select avg(rate)
-- from parent_rates_teacher
-- where teacher_id = 2;
--
--
--
13 View the top 10 schools with the highest number of reviews or highest number of enrolled students.
This should exclude schools that my children are enrolled in.
--
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
--
--
--
-- 14 Find the international school which has a reputation higher than all national schools, i.e. has the
-- highest number of reviews.
--
-- select sc.* from schools sc where sc.id in (
--    select sc1.id
--    from schools sc1
--    inner join parent_reviews_school prs1
--    on sc1.id = prs1.school_id
--    where sc1.type = "International"
--    group by sc1.id
--    having count(sc1.id) >=
--    all(
--       select count(sc2.id)
--       from schools sc2
--       inner join parent_reviews_school prs2
--       on sc2.id = prs2.school_id
--       where sc2.type = "National"
--       group by sc2.id
--    ))
-- limit 1;