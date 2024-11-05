<!-- Functions for interacting with the database -->

<?php 

require_once 'dbConfig.php';

function insertIntoTutor($pdo,$first_name, $last_name, $email, $specialization, $date_added) {

	$sql = "INSERT INTO tutor_records (first_name,last_name,email,specialization,date_added) VALUES (?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name,
		$email, $specialization, $date_added]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllTutor($pdo) {
	$sql = "SELECT * FROM tutor_records";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getTutorByID($pdo, $tutor_id) {
	$sql = "SELECT * FROM tutor_records WHERE tutor_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$tutor_id])) {
		return $stmt->fetch();
	}
}

function updateTutor($pdo, $tutor_id, $first_name, $last_name, 
	$email, $specialization, $date_added) {

	$sql = "UPDATE tutor_records 
				SET first_name = ?, 
					last_name = ?, 
					email = ?, 
					specialization = ?, 
					date_added = ? 
			WHERE tutor_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $email, $specialization, $date_added, $tutor_id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteTutor($pdo, $tutor_id) {

	$sql = "DELETE FROM tutor_records WHERE tutor_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$tutor_id]);

	if ($executeQuery) {
		return true;
	}

}
function insertIntoStudent($pdo,$first_name, $last_name, $email, $preferred_subject, $date_added, $tutor_id) {

	$sql = "INSERT INTO student_records (first_name,last_name,email,preferred_subject,date_added,tutor_id) VALUES (?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name,
		$email, $preferred_subject, $date_added, $tutor_id]);

	if ($executeQuery) {
		return true;	
	}
}

function getInfoByTutorID($pdo, $tutor_id) {
	$sql = "SELECT * FROM tutor_records WHERE tutor_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$tutor_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}



function getStudentsByTutor($pdo, $tutor_id) {
	
	$sql = "SELECT 
				student_records.student_id,
				student_records.first_name,
				student_records.last_name,
				student_records.email,
				student_records.preferred_subject,
				student_records.date_added,
				CONCAT(tutor_records.first_name,' ',tutor_records.last_name) AS tutor_name
			FROM student_records
			JOIN tutor_records ON student_records.tutor_id = tutor_records.tutor_id
			WHERE student_records.tutor_id = ? 
			
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$tutor_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getStudentByID($pdo, $student_id) {
	$sql = "SELECT 
				student_records.student_id as student_id,
				student_records.first_name as first_name,
				student_records.last_name as last_name,
				student_records.email as email,
				student_records.preferred_subject as preferred_subject,
				student_records.date_added as date_added,
				CONCAT(tutor_records.first_name,' ',tutor_records.last_name) AS student_tutor
			FROM student_records
			JOIN tutor_records ON student_records.tutor_id = tutor_records.tutor_id
			WHERE student_records.student_id  = ?
			";
			
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$student_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateStudent($pdo, $first_name, $last_name, $email, $preferred_subject, $date_added, $student_id,) {
    $sql = "UPDATE student_records 
                SET first_name = ?, 
                    last_name = ?, 
                    email = ?, 
                    preferred_subject = ?, 
                    date_added = ? 
            WHERE student_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $email, $preferred_subject, $date_added, $student_id,]);

	if ($executeQuery) {
		return true;
	}
}


function deleteStudent($pdo, $student_id) {
	$sql = "DELETE FROM student_records WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$student_id]);
	if ($executeQuery) {
		return true;
	}
}
?>