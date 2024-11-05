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
	<?php $getTutorByID = getTutorByID($pdo, $_GET['tutor_id']); ?>
	<form action="core/handleForms.php?tutor_id=<?php echo $_GET['tutor_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getTutorByID['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getTutorByID['last_name']; ?>">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $getTutorByID['email']; ?>"></p>
		<p>
		<p>
			<label for="specialization">Specialization</label> 
			<select name="specialization" id="specialization">
				<option value="Computer Networks and Security">Computer Networks and Security</option>
				<option value="Data Analysis">Data Analysis</option>
				<option value="Discrete Structures">Discrete Structures</option>
				<option value="Human Computer Interaction">Human Computer Interaction</option>
				<option value="Multimedia Development">Multimedia Development</option>
				<option value="Networks and Communications">Networks and Communications</option>
				<option value="Professional Elective">Professional Elective</option>
				<option value="Software Engineering">Software Engineering</option>
				<option value="Social Issues and Professional Practice">Social Issues and Professional Practice</option>
				<option value="Automata Theory and Formal Languages">Automata Theory and Formal Languages</option>
				<option value="Data and Digital Communications">Data and Digital Communications</option>
				<option value="Modeling and Simulation">Modeling and Simulation</option>
				<option value="Information Assurance and Security">Information Assurance and Security</option>
				<option value="Operating Systems">Operating Systems</option>
				<option value="Object-Oriented Programming">Object-Oriented Programming</option>
				<option value="Data Structures and Algorithms">Data Structures and Algorithms</option>
				<option value="Programming Languages">Programming Languages</option>
				value="<?php echo $getTutorByID['email']; ?>">
			</select>
		</p>
		<p>
			<label for="dateAdded">Date Added</label>
			<input type="datetime-local" name="dateAdded" value="<?php echo $getTutorByID['date_added']; ?>">
			<input type="submit" name="editTutorBtn">
		</p>
	</form>
</body>
</html>