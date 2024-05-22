<?php
include "conn.php";
function fetch_table(){

    include "conn.php";
    $select = "SELECT * FROM `second_page`";
    $result = $conn->query($select);
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $i ?></P>
            </td>
            <td><?php echo $row['bookname'] ?></td>
            <td><?php echo $row['authorname'] ?></td>
            <td><?php echo $row['available'] ?></td>
            <td><button onclick="editRow(<?php echo $row['sno'] ?>)" id="<?php echo 'edit' . $row['sno'] ?>">Edit</button><button onclick="deleteRow(this)">Delete</button>
            </td>
        </tr>
        <?php
        $i++;
    }
    return; 
}
if(isset($_GET["add_row"])){
    if($_GET["add_row"]== "true"){
        $insert = "INSERT INTO `second_page`(`bookname`, `authorname`, `available`) VALUES ('bookname','authorname','available')";
        $result = $conn->query($insert);

        fetch_table();
    }

}
if(isset($_GET['fetch_table'])){
    fetch_table();
}
?>
