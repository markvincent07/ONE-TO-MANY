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
	<h1>Are you sure you want to delete this tutor?</h1>
	<?php $getTutorByID = getTutorByID($pdo, $_GET['tutor_id']); ?>
	<form action="core/handleForms.php?tutor_id=<?php echo $_GET['tutor_id']; ?>" method="POST">

		<div class="studentContainer" style="border-style: solid; 
		font-family: 'Arial'; font-size: 1.5em;">
			<p>First Name: <?php echo $getTutorByID['first_name']; ?></p>
			<p>Last Name: <?php echo $getTutorByID['last_name']; ?></p>
			<p>Email: <?php echo $getTutorByID['email']; ?></p>
			<p>Specialization: <?php echo $getTutorByID['specialization']; ?></p>
			<p>Date Added: <?php echo $getTutorByID['date_added']; ?></p>
			<input type="submit" name="deleteTutorBtn" value="Delete">
		</div>
	</form>
</body>
</html>