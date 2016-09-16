<?php
    include 'header.php';
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <th>No.</th>
                <th>ID User</th>
                <th>Email</th>
                <th>password</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Registration Date</th>
                <th>Action</th>
            </tr>

            <?php
            include 'connector.php';
            
            $color1 = '#e2e2e2'; 
            $color2 = '#00ff00';
            $i = 0;

            $stmt = $sql->view();
            //$query = "SELECT * FROM users";
            //$result = mysqli_query($conn, $query);
            //if(mysqli_num_rows($result) > 0){
               // while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
             if($stmt->rowCount()>0) {
                 while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $bg_color = $i % 2 == 0 ? "#ffcc66" : "#00ff00";
                    $i++;
                    echo '<tr style=background-color:' .$bg_color .'>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $row['uid'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '<td>' . $row['firstname'] . '</td>';
                    echo '<td>' . $row['lastname'] . '</td>';
                    echo '<td>' . $row['dob'] . '</td>';
                    echo '<td>' . $row['regdate'] . '</td>';
                    echo '<td> <a href="editprofile.php?id='.$row['uid'].'">Edit</a> | <a href="delete.php?id='.$row['uid'].'">Delete</a></td>';
                    echo '</tr>';    
                }
            }
            ?>
        </table>
    </body>
</html>
