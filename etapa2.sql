select departments.dept_name departamento,
	   concat(employees.first_name , ' ', employees.last_name) nome_completo,
	   datediff(to_date, from_date) as dias_trabalhados
from dept_emp inner join departments on (departments.dept_no = dept_emp.dept_no)
			  inner join employees on (employees.emp_no = dept_emp.emp_no)
where to_date is not null
order by datediff(to_date, from_date) desc
limit 10
;