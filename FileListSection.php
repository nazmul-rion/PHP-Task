<?php 

   include("./Handler/config.php");
   if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
   }
    

   $userID= $_SESSION['user_id'];
   $sql = "SELECT * FROM userfile WHERE userid = $userID";
   $result = mysqli_query($con, $sql);
   
   ?>


<h3>Your Uploded File listed here</h3>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>File Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>


            <?php 
$serial = 0;
   while($fileResult = mysqli_fetch_assoc($result)){
    $serial=$serial+1;
    echo" <td>" .$serial. "</td>";
   echo "<td>" .$fileResult['filedescription']. "</td>";
   ?>
            <td>
                <div class="action-container">
                    <a onClick='viewFile("<?php echo ($fileResult['path']); ?>","<?php echo ($fileResult['filedescription']); ?>")'
                        class="view-btn">View</a>

                    <a onClick='editFieldSetting("<?php echo ($fileResult['id']); ?>","<?php echo ($fileResult['path']); ?>","<?php echo ($fileResult['filedescription']); ?>")'
                        class="edit-btn">Edit</a>

                    <a onClick='return checkDelete()' class="del-btn"
                        href='./Handler/userFileHandle.php?delId=<?php echo ($fileResult['id']); ?>&filePath=<?php echo ($fileResult['path']); ?>'>Delete</a>

                </div>
            </td>
        </tr>

        <?php
}
 ?>

    </tbody>
</table>

<?php
if($serial==0)
echo "<h4>There are now uploaded file.</h4>";
  ?>

<span id="fileName"></span>
<embed id="preview-file" width="100%">



<script>
function viewFile(filePath, name) {
    const previewFile = document.getElementById('preview-file');
    const fileName = document.getElementById('fileName');
    fileName.innerText = "Preview File: " + name;
    const file = "./userFiles/" + filePath;
    previewFile.setAttribute("src", file);
}

function checkDelete() {
    return confirm("Are you sure you want to delete this record?");
}
</script>