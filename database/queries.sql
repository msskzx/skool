use skool;

-- Search for any school by its name, address or its type (national/international).
-- select * from schools
-- where name = 'name' or address = 'address' or type = 'type';


--  View a list of all available schools on the system categorized by their level.
select *
from schools,elementary_levels
where id = school_id;


-- View the information of a certain school along with the reviews written about it and teachers
-- teaching in this school
select schools.name, parentt_school.review, employees.first_name
from schools, parentt_school, employees
where schools.id = parentt_school.id  schools.id = employees.school_id and school.id = '1' and employees.role = 'Teacher';
