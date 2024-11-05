<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Computer Science Online Tutoring Platform</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.2em;
			height: 50px;
			width: 200px;
		}
		select {
			font-size: 1em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>    
</head>
<body>
	<a href="studentsOverview.php?tutor_id=<?php echo $_GET['tutor_id']; ?>">Students Overview</a>
	<?php $getStudentByID = getStudentByID($pdo, $_GET['student_id']); ?>
	<form action="core/handleForms.php?student_id=<?php echo $_GET['student_id']; ?>&tutor_id=<?php echo $_GET['tutor_id']; ?>" method="POST">

		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getStudentByID['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getStudentByID['last_name']; ?>">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $getStudentByID['email']; ?>"></p>
		<p>
		<p>
			<label for="preferredSubject">Preferred Subject</label> 
			<select name="preferredSubject" id="preferredSubject">
				<option value="Computer Networks and Security"<?php echo ($getStudentByID['preferred_subject'] == 'Computer Networks and Security') ? 'selected' : ''; ?>>Computer Networks and Security</option>
				<option value="Data Analysis"<?php echo ($getStudentByID['preferred_subject'] == 'Data Analysis') ? 'selected' : ''; ?>>Data Analysis</option>
				<option value="Discrete Structures"<?php echo ($getStudentByID['preferred_subject'] == 'Discrete Structures') ? 'selected' : ''; ?>>Discrete Structures</option>
				<option value="Human Computer Interaction"<?php echo ($getStudentByID['preferred_subject'] == 'Human Computer Interaction') ? 'selected' : ''; ?>>Human Computer Interaction</option>
				<option value="Multimedia Development"<?php echo ($getStudentByID['preferred_subject'] == 'Multimedia Development') ? 'selected' : ''; ?>>Multimedia Development</option>
				<option value="Networks and Communications"<?php echo ($getStudentByID['preferred_subject'] == 'Networks and Communications') ? 'selected' : ''; ?>>Networks and Communications</option>
				<option value="Professional Elective"<?php echo ($getStudentByID['preferred_subject'] == 'Professional Elective') ? 'selected' : ''; ?>>Professional Elective</option>
				<option value="Software Engineering"<?php echo ($getStudentByID['preferred_subject'] == 'Software Engineering') ? 'selected' : ''; ?>>Software Engineering</option>
				<option value="Social Issues and Professional Practice"<?php echo ($getStudentByID['preferred_subject'] == 'Social Issues and Professional Practice') ? 'selected' : ''; ?>>Social Issues and Professional Practice</option>
				<option value="Automata Theory and Formal Languages"<?php echo ($getStudentByID['preferred_subject'] == 'Automata Theory and Formal Languages') ? 'selected' : ''; ?>>Automata Theory and Formal Languages</option>
				<option value="Data and Digital Communications"<?php echo ($getStudentByID['preferred_subject'] == 'Data and Digital Communications') ? 'selected' : ''; ?>>Data and Digital Communications</option>
				<option value="Modeling and Simulation"<?php echo ($getStudentByID['preferred_subject'] == 'Modeling and Simulation') ? 'selected' : ''; ?>>Modeling and Simulation</option>
				<option value="Information Assurance and Security"<?php echo ($getStudentByID['preferred_subject'] == 'Information Assurance and Security') ? 'selected' : ''; ?>>Information Assurance and Security</option>
				<option value="Operating Systems"<?php echo ($getStudentByID['preferred_subject'] == 'Operating Systems') ? 'selected' : ''; ?>>Operating Systems</option>
				<option value="Object-Oriented Programming"<?php echo ($getStudentByID['preferred_subject'] == 'Object-Oriented Programming') ? 'selected' : ''; ?>>Object-Oriented Programming</option>
				<option value="Data Structures and Algorithms"<?php echo ($getStudentByID['preferred_subject'] == 'Data Structures and Algorithms') ? 'selected' : ''; ?>>Data Structures and Algorithms</option>
				<option value="Programming Languages"<?php echo ($getStudentByID['preferred_subject'] == 'Programming Languages') ? 'selected' : ''; ?>>Programming Languages</option>
			</select>
		</p>
		<p>
			<label for="dateAdded">Date Added</label>
			<input type="datetime-local" name="dateAdded" value="<?php echo $getStudentByID['date_added']; ?>">
	
			<input type="submit" name="editStudentBtn">
		</p>
	</form>
</body>
</html>