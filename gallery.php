<?php
include 'connector.php';
include 'header.php';


session_start();
if(!isset($_SESSION['uid'])){
    header("location: login.php");
}

$id = $_SESSION['uid'];

$stmt = $sql->getImg($id);
if($stmt->rowCount() > 0){
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <img src="members/<?php echo $id?>/<?php echo $row['file_name']; ?>" height="100" width="70"/>
<?php
    }
}
?>