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
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
    <?php $getStudentByID = getStudentByID($pdo, $_GET['student_id']); ?>
	<h1>Are you sure you want to delete this student?</h1>
	
	<form action="core/handleForms.php?student_id=<?php echo $_GET['student_id']; ?>&tutor_id=<?php echo $_GET['tutor_id']; ?>" method="POST">

		<div class="container" style="border-style: solid; 
		font-family: 'Arial'; font-size: 1.5em;">
			<p>First Name: <?php echo $getStudentByID['first_name'] ?></p>
			<p>Last Name: <?php echo $getStudentByID['last_name']; ?></p>
			<p>Email: <?php echo $getStudentByID['email']; ?></p>
			<p>Preferred Subject: <?php echo $getStudentByID['preferred_subject']; ?></p>
            <p>Student's Tutor: <?php echo $getStudentByID['student_tutor']; ?></p>
			<p>Date Added: <?php echo $getStudentByID['date_added']; ?></p>
			<input type="submit" name="deleteStudentBtn" value="Delete">
		</div>
	</form>
</body>
</html>