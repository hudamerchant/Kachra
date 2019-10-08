<?php
if(isset($_GET['done']))
{
    $task['done'] = 2;
    header("Location:user_profile.php");
}
var_dump($task);
?>