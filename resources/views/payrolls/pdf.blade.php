<!DOCTYPE html>
<html>
<head>
    <title>Nomina de {{ $employee->name }} {{ $employee->surname }}</title>
</head>
<body>
    <h1>Nomina de {{ $employee->name }} {{ $employee->surname }}</h1>
    <p><strong>Horas Trabajadas:</strong> {{ $hours_worked }}</p>
    <p><strong>Deducciones:</strong> {{ $deductions }}</p>
    <p><strong>Turno:</strong> {{ $shift }}</p>
    <p><strong>Sueldo Total:</strong> {{ $total_salary }}</p>
</body>
</html>
