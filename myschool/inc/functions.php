<?php

/******************
@Helper Functions
*******************/

function display($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function createRecord($table, $data, $conn){

	$columns = "";
	$values = "";
	foreach($data as $key=>$val){
		$columns .= "{$key},";
		$values .= "'{$val}',";
	}
	$columns = substr($columns, 0,-1);
	$values = substr($values, 0,-1);


	$sql = "INSERT INTO {$table} ({$columns}) 
	VALUES ({$values})";



	if ($conn->query($sql) === TRUE) {
	  //$last_id = $conn->insert_id;
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}

function updateRecord($table, $data, $id, $conn){

	$set = "";
	foreach($data as $k=>$v){
		$set .= "`".$k."`='".$v."',";
	}
	$set = substr($set, 0,-1);


	$sql = "UPDATE {$table} set {$set} WHERE id={$id}";
	$result = $conn->query($sql);

	if ($result) {
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;die();
	  return false;
	}
}

function deleteRecord($table, $id, $conn){
	$sql = "DELETE FROM {$table} WHERE id={$id}";	
	$result = $conn->query($sql);

	if ($result) {
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;die();
	  return false;
	}	
}


function redirectTo($url){
	header("Location:".$url);
}

/******************
@Appointments
*******************/
function getAppointments($conn){	
	$sql = "SELECT * FROM appointments as a, doctors as d WHERE a.doctor_id = d.id";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 
	return $data;
}

function getAppointmentsByDateAndDoctorId($date, $doctor_id, $conn){	
	$sql = "SELECT * FROM appointments as a, doctors as d WHERE a.doctor_id = d.id AND a.appointment_date = '{$date}' AND a.doctor_id = $doctor_id";

	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 
	return $data;
}



/******************
@check user
*******************/

function checkUser($table, $email, $password, $conn){	
	$sql = "SELECT * FROM $table WHERE email='{$email}' AND password = '{$password}'";

	$result = $conn->query($sql);
	
	$data = array();
	if ($result->num_rows > 0) { 
	   $row = $result->fetch_assoc();
	   $data = $row; 
	   return $data;
	} 

	return false;	
}

function isAdminLogin(){
	if(!isset($_SESSION['username']) && $_SESSION['role'] !== 'admin'){
		return false;
	}else{
		return true;
	}
}


function isLogin(){
	if(!isset($_SESSION['username'])){
		return false;
	}else{
		return true;
	}
}

/******************
@Students
*******************/
function getCourses($conn){	
	$sql = "SELECT * FROM courses";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 

	return $data;
}

function getCoursesByStudentId($student_id, $conn){	
	$sql = "SELECT c.id, c.title, c.description FROM courses as c, enrolments as e WHERE c.id=e.course_id AND e.student_id={$student_id} ";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 

	return $data;
}

function getCoursesByTeacherId($teacher_id, $conn){	
	$sql = "SELECT c.id, c.title, c.description FROM courses as c WHERE c.teacher_id={$teacher_id} ";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 

	return $data;
}

function getCourseById($id, $conn){
	$sql = "SELECT c.id, c.title, c.description, t.username as teacher_name FROM courses as c, teachers as t WHERE c.teacher_id = t.id AND c.id={$id}";
	$result = $conn->query($sql);
	
	$data = array();
	if ($result->num_rows > 0) { 
	  $row = $result->fetch_assoc();
	   $data = $row;	
	} 
	return $data;	
}

/******************
@Students
*******************/
function getStudents($conn){	
	$sql = "SELECT * FROM students";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 

	return $data;
}

function getStudentById($id, $conn){
	$sql = "SELECT s.id, s.username, s.email as teacher_name FROM students as s WHERE s.id={$id}";
	$result = $conn->query($sql);
	
	$data = array();
	if ($result->num_rows > 0) { 
	  $row = $result->fetch_assoc();
	   $data = $row;	
	} 
	return $data;	
}


/******************
@Teachers
*******************/

function getTeachers($conn){	
	$sql = "SELECT * FROM teachers";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 

	return $data;
}

function getTeacherById($id, $conn){
	$sql = "SELECT * FROM teachers WHERE id={$id}";
	$result = $conn->query($sql);
	
	$data = array();
	if ($result->num_rows > 0) { 
	  $row = $result->fetch_assoc();
	   $data = $row;	
	} 
	return $data;	
}

function getTeacherNameById($id, $conn){
	$sql = "SELECT name FROM teachers WHERE id={$id}";
	$result = $conn->query($sql);
	
	$data = "";
	if ($result->num_rows > 0) { 
	  $row = $result->fetch_assoc();
	   $data = $row['name'];	
	} 
	return $data;	
}

/******************
@User
*******************/

function getUserById($id, $conn){
	$sql = "SELECT id,username,phone,address FROM users WHERE id={$id}";
	$result = $conn->query($sql);
	
	$data = array();
	if ($result->num_rows > 0) { 
	  $row = $result->fetch_assoc();
	   $data = $row;	
	} 
	return $data;	
}

/******************
@Enrolment
*******************/
function isEnrolled($student_id, $course_id, $conn){
	$sql = "SELECT id FROM enrolments WHERE student_id={$student_id} AND course_id={$course_id}";
	
	$result = $conn->query($sql);	

	if ($result->num_rows > 0) { 
	   return  true;
	} 
	return false;	
}

function getEnrolledStudentsByCourseId($course_id, $conn){
	$sql = "SELECT s.id, s.username, s.email FROM enrolments as e, students as s WHERE e.student_id=s.id AND e.course_id={$course_id}";
	$result = $conn->query($sql);
 
	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	}
	return $data;
}

/******************
@Resources
*******************/
function getResourcesByCourseId($course_id, $conn){	
	$sql = "SELECT * FROM resources WHERE course_id={$course_id}";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 

	return $data;
}

/******************
@Classes
*******************/
function getClassesByCourseId($course_id, $conn){	
	$sql = "SELECT * FROM classes WHERE course_id={$course_id}";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 

	return $data;
}

function getClassByClassId($id, $conn){
	$sql = "SELECT * FROM classes WHERE id={$id}";
	$result = $conn->query($sql);
	
	$data = array();
	if ($result->num_rows > 0) { 
	  $row = $result->fetch_assoc();
	   $data = $row;	
	} 
	return $data;	
}

/******************
@Attendance
*******************/

function getAttendancesByClassId($id, $conn){
	$sql = "SELECT c.date, cr.title, s.username, a.status FROM attendances as a, students as s, classes as c, courses as cr WHERE a.student_id = s.id AND a.class_id = c.id AND c.course_id = cr.id AND class_id={$id}";

	
	$result = $conn->query($sql);
	
	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 


	return $data;
}

