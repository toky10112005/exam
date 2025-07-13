CREATE OR REPLACE VIEW V_list_dept AS
    SELECT * FROM departments;

CREATE OR REPLACE VIEW V_dept_manager AS
SELECT v.dept_name, e.first_name, v.dept_no, d.emp_no, COUNT(de.dept_no) as nbr_employees
FROM departments v
JOIN dept_manager d ON v.dept_no = d.dept_no
JOIN employees e ON d.emp_no = e.emp_no
LEFT JOIN dept_emp de ON v.dept_no = de.dept_no
WHERE d.to_date = (
    SELECT MAX(dm.to_date)
    FROM dept_manager dm
    WHERE dm.dept_no = v.dept_no
)
GROUP BY v.dept_name, e.first_name, v.dept_no, d.emp_no;






      
