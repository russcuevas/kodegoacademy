Admin Panel:

CRUD - Instructor
CRUD - Course
CRUD - Users

Instructor Panel:
Modify the number enrollees of the course they offer

User Panel:
Can enroll the course

`tbl_users` -> id profile_picture email password contact user_role
`tbl_course` -> course_id foreign key tbl_users for user_role Instructor
`tbl_enroll` -> enroll_id foreign key tbl_course to check the number of enrollees of each course no_enrollees