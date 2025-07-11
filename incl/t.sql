CREATE OR REPLACE VIEW V_list_dept AS
    SELECT * FROM departments;

CREATE OR REPLACE VIEW V_dept_manager AS
   SELECT v.dept_name,e.first_name,v.dept_no,COUNT(e.emp_no) as nbr_employees
    FROM departments as v 
    JOIN dept_manager as d ON v.dept_no=d.dept_no
    JOIN employees as e 
    WHERE e.emp_no=d.emp_no;



      
