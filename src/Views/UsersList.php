<?php require_once "Header.php" ?>

<?

$table = "<table class='table table-striped table-sm'>";
         $table.= "<tr>
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Actions</th>
        </tr>";
foreach ($users as $user)
{
        $table.= "<tr>";
        foreach ($user as $key => $value)
        {
            if ($key !== "admin"){
                $table.= "<td>".$value."</td>";
            }else {
                $checked = $value==1 ?" checked='checked'":"";
                $table.= "<td><input type='checkbox' ".$checked." disabled></td>";
            }
        }
        $table.= "<td><a href='/delete_user/". $user['id'] ."'>Delete user</a></td>";
        $table.= "</tr>";

}
$table.= "</table>";

?>
<section class="container mt-5">
    <div class="table-responsive">
        <?php if($_SESSION["admin"]) echo $table ?>
    </div>
</section>
