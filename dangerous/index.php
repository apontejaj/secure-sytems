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
            // MySQL with PDO_MYSQL
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);
    
            // VULNERABILTIY: The user input and the query should be sanitised before sending the request to the DB.
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
    // In case that no particular request is present, display the full content of the table.
    else{
        try {
            // MySQL with PDO_MYSQL
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
    
?>
</table>

<!-- Form to filter the results of the table by user specification-->
<h1>Filter post by author or content by inserting key words</h1>

<form action="index.php" method="get">
    Name: <input type="text" name="name"><br>
    Content: <input type="text" name="content"><br>
    <input type="submit">
</form>