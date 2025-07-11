<?php
    require('connect.php');

    function list_dept(){
        $sql="SELECT * FROM V_dept_manager";
        $result=mysqli_query(dbconnect(),$sql);
        $valiny=array();
        while($row=(mysqli_fetch_assoc($result))){
            $valiny[]=$row;
        }
        return $valiny;
   }

   function list_emp($no){
    $sql="SELECT employees.first_name,employees.emp_no
        FROM departments
        JOIN dept_emp ON departments.dept_no='$no' AND departments.dept_no=dept_emp.dept_no 
        JOIN employees ON dept_emp.emp_no=employees.emp_no";
 
    $result=mysqli_query(dbconnect(),$sql);
     $valiny=array();
    while($row=mysqli_fetch_assoc($result)){
         $valiny[]=$row;
    }

    return $valiny;
}

    function fiche($emp_no){
        $sql="SELECT e.first_name,e.last_name,e.gender,MAX(s.salary) as max
        FROM employees e 
        JOIN salaries s ON s.emp_no=e.emp_no 
        WHERE e.emp_no='$emp_no'";
        $result=mysqli_query(dbconnect(),$sql);
        return mysqli_fetch_assoc($result);
    }   

    function nom_dept($dept_no){
        $sql="SELECT dept_name FROM departments WHERE dept_no='$dept_no'";
        $result=mysqli_query(dbconnect(),$sql);
        return mysqli_fetch_assoc($result);
    }
    function titre_emp($emp_no){
        $sql="SELECT title FROM titles WHERE emp_no='$emp_no'";
        $result=mysqli_query(dbconnect(),$sql);
        return mysqli_fetch_assoc($result);
    }
    function histo_salaire($emp_no){
        $sql="SELECT salary FROM salaries WHERE emp_no='$emp_no'";
        $result=mysqli_query(dbconnect(),$sql);
        $valiny=array();
        while($row=mysqli_fetch_assoc($result)){
            $valiny[]=$row;
        }
        return $valiny;
    }
   
    function recherche($dep, $emp, $min, $max, $limit = 20, $offset = 0){
    $sql = "SELECT departments.dept_name, employees.first_name, employees.last_name, employees.emp_no, employees.birth_date
            FROM departments
            JOIN dept_emp ON departments.dept_no = dept_emp.dept_no
            JOIN employees ON dept_emp.emp_no = employees.emp_no
            WHERE departments.dept_name LIKE '%$dep%'
              AND employees.first_name LIKE '%$emp%'
              AND TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) BETWEEN $min AND $max
            LIMIT $limit OFFSET $offset";
    $result = mysqli_query(dbconnect(), $sql);
    $valiny = array();
    while($row = mysqli_fetch_assoc($result)){
        $valiny[] = $row; 
    }
    return $valiny;
}

function count_employees($dept_no) {
    $sql = "SELECT COUNT(e.emp_no) as count
     FROM departments as d
     JOIN dept_emp as de ON d.dept_no =de.dept_no
     JOIN employees as e ON de.emp_no = e.emp_no
     WHERE d.dept_no = '$dept_no'";
    $result = mysqli_query(dbconnect(), $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}
?>  `