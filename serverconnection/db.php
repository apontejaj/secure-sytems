<?php
header('Access-Control-Allow-Origin: *');

if(isset($_GET['type'])){

	$type = $_GET['type'];

	// GET STATUS OF A SWITCH
	if($type == 'check'){
		$user = $_GET['user'];

		try {
			$host = 'aao0h21ouhnyfg.cqbveh1pp27z.us-west-2.rds.amazonaws.com';
			$dbname = 'switch';
			$dbuser = 'root';
			$pass = 'Pass1234!';
			# MySQL with PDO_MYSQL
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);
		} catch(PDOException $e) {echo 'Error';}  

		$sql = "SELECT * FROM `switch` WHERE `user` = ?;";
		$sth = $DBH->prepare($sql);
		
		$sth->bindParam(1, $user, PDO::PARAM_INT);
		
		$sth->execute();

		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		$allPorts = '{';
		foreach($result as $item){
			$allPorts = $allPorts . '"port' . $item['port'] . '":"' . $item['status'] . '",';
		}
		$allPorts = $allPorts . '"coder":"amilcar"}';
		echo $allPorts;
		
		//$status = $result['status'];

	}
	
	else if($type == 'change'){

		$user = $_GET['user'];
		$port = $_GET['port'];
		$newstatus = $_GET['newstatus'];

		try {
			$host = 'aao0h21ouhnyfg.cqbveh1pp27z.us-west-2.rds.amazonaws.com';
			$dbname = 'switch';
			$dbuser = 'root';
			$pass = 'Pass1234!';
			# MySQL with PDO_MYSQL
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);
		} catch(PDOException $e) {echo 'Error';}  

		$sql = "UPDATE `switch`.`switch` SET `status` = ? WHERE `user` = ? AND `port` = ?;";
		$sth = $DBH->prepare($sql);
			
		$sth->bindParam(1, $newstatus, PDO::PARAM_STR);
		$sth->bindParam(2, $user, PDO::PARAM_STR);
		$sth->bindParam(3, $port, PDO::PARAM_STR);

		$sth->execute();
		
	}
	


}

if(isset($_GET['type']) == False){
echo 'Looks like your missing the type parameter from the URL try change the URL to db.php?type=top10stories';
}