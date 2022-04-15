<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<!-- Form to add a new entry into the DB-->
<h1>Add your comment to the forum</h1>

<form action="newEntry.php" method="post">
    Name: <input type="text" name="name"><br>
    Content: <input type="text" name="content"><br>
    <input type="submit">
</form>

<!-- Displaying data from the DB -->
<table>
    <tr>
        <th>Date</th>
        <th>Author</th>
        <th>Post</th>
    </tr>
<?php 
    include '../../vars.php';
    $host = $SS_DB_HOST;
    $dbname = $SS_DB_NAME;
    $dbuser = $SS_DB_USER;
    $pass = $SS_DB_PASSWORD;

    // In case there is a particular request, display the result for it
    if(isset($_GET['name'])){

        try {
            # MySQL with PDO_MYSQL
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);
    
            // FIXING VULNERABILITY: Using prepared statements
            $sql = "SELECT * FROM forum WHERE author LIKE ? OR post LIKE ?;";
            $sth = $DBH->prepare($sql);

            $name = '%'.$_GET['name'].'%';
            $sth->bindParam(1, $name, PDO::PARAM_STR);

            $content = '%'.$_GET['content'].'%';
            $sth->bindParam(2, $content, PDO::PARAM_STR);

            $sth->execute();

            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($result as $row){
                echo '<tr>';            
                echo '<td>' . $row['date_posted'] . '</td>';
                echo '<td>' . $row['author'] . '</td>';
                echo '<td>' . $row['post'] . '</td>';
                echo '</tr>';
            }
            
            $sth = null;
            $DBH = null;
    
        } catch(PDOException $e) {echo $e->getMessage();}  

    }
    // In case that no particular request is present, display the full content of the table.
    else{
        try {
            $host = $SS_DB_HOST;
            $dbname = $SS_DB_NAME;
            $dbuser = $SS_DB_USER;
            $pass = $SS_DB_PASSWORD;
            # MySQL with PDO_MYSQL
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);
    
            // There is no need to prepare this statement as it doesn't use user input.
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
    
?>
</table>

<!-- Form to filter the results of the table by user specification-->
<h1>Filter post by author or content by inserting key words</h1>

<form action="index.php" method="get">
    Name: <input type="text" name="name"><br>
    Content: <input type="text" name="content"><br>
    <input type="submit">
</form>