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
			font-size: 1.5em;
		}
		input, select {
			font-size: 0.8em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		  
		}
	</style>
</head>
<body>
	<h3>Welcome to the Computer Science Online Tutoring Platform. Input your details here to register.</h3>
	<form action="core/handleForms.php" method="POST">
		<p><label for="firstName">First Name</label> <input type="text" name="firstName"></p>
		<p><label for="lastName">Last Name</label> <input type="text" name="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="email"></p>
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
			</select>
			</p>
			<p><label for="dateAdded">Date Added</label> <input type="datetime-local" name="dateAdded">
			<input type="submit" name="insertTutorBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px; font-size: 0.8em;">
	  <tr>
	    <th>Tutor ID</th>
	    <th>First Name</th>
	    <th>Last Name</th>
		<th>Email</th>
	    <th>Specialization</th>
		<th>Date Added</th>
	    <th>Action</th>
	  </tr>

	  <?php $seeAllTutor = seeAllTutor($pdo); ?>
	  <?php foreach ($seeAllTutor as $row) { ?>
	  <tr>
	  	<td><?php echo $row['tutor_id']; ?></td>
	  	<td><?php echo $row['first_name']; ?></td>
	  	<td><?php echo $row['last_name']; ?></td>
		<td><?php echo $row['email']; ?></td>
	  	<td><?php echo $row['specialization']; ?></td>
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editTutor.php?tutor_id=<?php echo $row['tutor_id'];?>">Edit</a>
	  		<a href="deleteTutor.php?tutor_id=<?php echo $row['tutor_id'];?>">Delete</a>
			<a href="studentsOverview.php?tutor_id=<?php echo $row['tutor_id'];?>">Students Overview</a>
	  	</td>
	  </tr>
	  <?php } ?>
	</table>



</body>
</html>