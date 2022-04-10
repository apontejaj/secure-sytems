<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>


<h1>Add your comment to the forum</h1>

<form action="newEntry.php" method="post">
    Name: <input type="text" name="name"><br>
    Content: <input type="text" name="content"><br>
    <input type="submit">
</form>


<table>
    <tr>
        <th>Date</th>
        <th>Author</th>
        <th>Post</th>
    </tr>
<?php 
    include '../../vars.php';

    if(isset($_GET['name'])){

        try {
            $host = $SS_DB_HOST;
            $dbname = $SS_DB_NAME;
            $dbuser = $SS_DB_USER;
            $pass = $SS_DB_PASSWORD;
            # MySQL with PDO_MYSQL
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);
    
            
            
            foreach ($DBH->query("SELECT * FROM forum WHERE author LIKE '%" . $_GET['name'] . "%' OR post LIKE '%" . $_GET['content'] ."%';") as $row){
                echo '<tr>';            
                echo '<td>' . $row['date_posted'] . '</td>';
                echo '<td>' . $row['author'] . '</td>';
                echo '<td>' . $row['post'] . '</td>';
                echo '</tr>';
            }
            
    
            $DBH = null;
    
        } catch(PDOException $e) {echo $e->getMessage();}  

    }
    else{
        try {
            $host = $SS_DB_HOST;
            $dbname = $SS_DB_NAME;
            $dbuser = $SS_DB_USER;
            $pass = $SS_DB_PASSWORD;
            # MySQL with PDO_MYSQL
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);
    
            
            foreach ($DBH->query('SELECT * FROM forum;') as $row){
                echo '<tr>';            
                echo '<td>' . $row['date_posted'] . '</td>';
                echo '<td>' . $row['author'] . '</td>';
                echo '<td>' . $row['post'] . '</td>';
                echo '</tr>';
            }
            
    
            $DBH = null;
    
        } catch(PDOException $e) {echo $e->getMessage();}  

    }
    
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
</table>

<h1>Filter post by author or content by inserting key words</h1>

<form action="index.php" method="get">
    Name: <input type="text" name="name"><br>
    Content: <input type="text" name="content"><br>
    <input type="submit">
</form>