<?php 
    include '../vars.php';

    

    // echo $_POST['name'];
    // echo $_POST['content'];

    header("Location: index.php");
    die();
    
    
    // try {
    //     $host = $SS_DB_HOST;
    //     $dbname = $SS_DB_NAME;
    //     $dbuser = $SS_DB_USER;
    //     $pass = $SS_DB_PASSWORD;
    //     # MySQL with PDO_MYSQL
    //     $DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);

        
    //     foreach ($DBH->query('SELECT * FROM forum;') as $row){
    //         echo '<tr>';            
    //         echo '<td>' . $row['date_posted'] . '</td>';
    //         echo '<td>' . $row['author'] . '</td>';
    //         echo '<td>' . $row['post'] . '</td>';
    //         echo '</tr>';
    //     }
        

    //     $DBH = null;

    // } catch(PDOException $e) {echo $e->getMessage();}  

    // $sql = "SELECT * FROM `switch` WHERE `user` = ?;";
    // $sth = $DBH->prepare($sql);

    // $sth->bindParam(1, $user, PDO::PARAM_INT);

    // $sth->execute();

    // $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // $allPorts = '{';
    // foreach($result as $item){
    //     $allPorts = $allPorts . '"port' . $item['port'] . '":"' . $item['status'] . '",';
    // }
    // $allPorts = $allPorts . '"coder":"amilcar"}';
    // echo $allPorts;

    // //$status = $result['status'];
?>