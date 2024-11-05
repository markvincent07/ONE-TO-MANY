<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';  

if (isset($_POST['insertTutorBtn'])) {
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$email = trim($_POST['email']);
	$specialization = trim($_POST['specialization']);
	$dateAdded = trim($_POST['dateAdded']);

	if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($specialization) && !empty($dateAdded)) {
			$query = insertIntoTutor($pdo, $firstName, $lastName, 
			$email, $specialization, $dateAdded);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editTutorBtn'])) {
	$tutor_id = $_GET['tutor_id'];
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$email = trim($_POST['email']);
	$specialization= trim($_POST['specialization']);
	$dateAdded= trim($_POST['dateAdded']);

	if (!empty($tutor_id) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($specialization) && !empty($dateAdded)) {

		$query = updateTutor($pdo, $tutor_id, $firstName, $lastName, $email, $specialization, $dateAdded);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteTutorBtn'])) {

	$query = deleteTutor($pdo, $_GET['tutor_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertStudentBtn'])) {
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$email = trim($_POST['email']);
	$preferredSubject = trim($_POST['preferredSubject']);
	$dateAdded = trim($_POST['dateAdded']);
	

	if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($preferredSubject) && !empty($dateAdded)) {
			$query = insertIntoStudent($pdo, $firstName, $lastName, 
			$email, $preferredSubject, $dateAdded, $_GET['tutor_id']);

		if ($query) {
			header("Location: ../studentsOverview.php?tutor_id=" .$_GET['tutor_id']);
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}

if (isset($_POST['editStudentBtn'])) {
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$email = trim($_POST['email']);
	$preferredSubject = trim($_POST['preferredSubject']);
	$dateAdded = trim($_POST['dateAdded']);
	
	$query = updateStudent($pdo, $firstName, $lastName, 
	$email, $preferredSubject, $dateAdded, $_GET['student_id']);

	if ($query) {
		header("Location: ../studentsOverview.php?tutor_id=" .$_GET['tutor_id']);
	}
	else {
		echo "Update failed";
	}
}



if (isset($_POST['deleteStudentBtn'])) {

	$query = deleteStudent($pdo, $_GET['student_id']);

	if ($query) {
		header("Location: ../studentsOverview.php?tutor_id=" . $_GET['tutor_id']);
	}
	else {
		echo "Deletion failed";
	}
}


?>