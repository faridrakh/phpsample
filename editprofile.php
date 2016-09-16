<?php 
    include 'connector.php';
    include 'header.php';
    session_start();
        
    if(!isset($_SESSION['uid'])){
        header("location: login.php");
    }
    $id = $_SESSION['uid'];
    $row = $sql->getID($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">
            <table>
                <tr>
                    <td>Email:</td> 
                    
                    <td><input type = "text" name = "email" value=<?php echo $row['email']?> /></td>
                </tr>
                
                <tr>
                    <td>Password:</td> 
                    <td><input type = "text" name = "password" value="<?php echo $row['password']?>" /></td>
                </tr>
                                
                <tr>
                    <td>First Name:</td> 
                    <td><input type = "text" name = "fname" value="<?php echo $row['firstname']?>" /></td>
                </tr>
            
                <tr>
                    <td>Last Name</td>
                    <td><input type = "text" name = "lname" value="<?php echo $row['lastname']?>" /></td>
                </tr>
            
                <tr>
                    <td>Date of Birth</td>
                    <td><input type = "date" name = "dob" value="<?php echo $row['dob']?>" /></td>
                </tr>
            
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type = "radio" name = "gender" value = "F">Female
                        <input type = "radio" name = "gender" value = "M">Male
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <input type = "submit" name = "edit" value = "Submit"> 
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $sql->processinput($_POST['email']);
        $password = $sql->processinput($_POST['password']);
        $fname = $sql->processinput($_POST['fname']);
        $lname = $sql->processinput($_POST['lname']);
        $dob = $sql->processinput($_POST['dob']);
        $row = $sql->update($email,$password,$fname,$lname,$dob,$id);
        
        if($row == true) {
            echo 'Update Success';
            header("location: profile.php");
        }
        else {
            echo 'Update Error';
        }
        /*$row = "UPDATE users set firstname = '$fname' , lastname = '$lname' , dob = '$dob' WHERE uid = '$id'";
    
        if (mysqli_query($conn, $row)) {
            echo "Updated successfully";
            header("location: profile.php");
        } else {
            echo "Error: " . $row . "<br>" . mysqli_error($conn);
        }*/
    }
?>


    

