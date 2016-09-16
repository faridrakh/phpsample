<?php
include 'connector.php';
include 'header.php';


session_start();
if(!isset($_SESSION['uid'])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Upload</title>
    </head>
    <body>
        <table>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
            <tr>
                <td>Image File</td>
                <td>:</td>
                <td><input type="file" name="userimg" accept="image/*"/></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Upload"/></td>
            </tr>
            </form>
        </table>
    </body>
</html>
<?php

$now = new DateTime();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['uid'];
    $img = $_FILES['userimg']['name'];
    $tmp_dir = $_FILES['userimg']['tmp_name'];
    $imgSize = $_FILES['userimg']['size'];
    $imgExt = strtolower(pathinfo($img,PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
    $userpic = $now->format('YmdHis').$now->getTimestamp().rand(1,1000).".".$imgExt;
    $udir= "members/".$id."/";
    
    if(!is_dir($udir)){
        mkdir("members/".$id, 0777);
        if(in_array($imgExt, $valid_extensions)) {   
            if($imgSize < 5000000) {
                move_uploaded_file($tmp_dir,$udir.$userpic);
                $sql->imgupload($id,$userpic);
            }
        }
    }
    else {
        if(in_array($imgExt, $valid_extensions)) {   
            if($imgSize < 5000000) {
                move_uploaded_file($tmp_dir,$udir.$userpic);
                $sql->imgupload($id,$userpic);
            }
        }
    }
    
}
?>