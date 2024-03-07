<?php
    $checker = $_POST['checker'];
    $puller = $_POST['puller'];
    $orderNum = $_POST['orderNum'];
    $errors = $_POST['errors'];
    $date = $_POST['date'];

    $conn = new mysqli('localhost', 'root', '', 'errors');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into errors(checker,puller,orderNum,errors,date) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssis", $checker, $puller, $orderNum, $errors, $date);
		$execval = $stmt->execute();
		echo $execval;
		echo "Sumbitted";
		$stmt->close();
		$conn->close();
    }
?>
