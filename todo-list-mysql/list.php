<?php require('db_connection.php'); ?>
<?php require('db_tables.php'); ?>

<table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tasks</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                
            <?php 
                $i = 1 ;
                foreach($list as $index => $task){?>
            <tr>
                <td><?php echo $i; ?></td>
                
                <td>
                <div style="
                <?php echo $task['task_status'] == 2 ? 'text-decoration: line-through;' : '' ?>">
                <?php echo $task['task_name'] ?>
                </div>
                </td>
                
                <td>
                    <a href="edit.php?task=<?php echo $index ?>"><i class="fa fa-edit"></i></a>
                    <a href="done.php?task=<?php echo $index ?>"><i class="fa fa-check-circle"></i></a>
                    <a href="remove.php?task=<?php echo $index ?>"><i class="fa fa-times-circle"></i></a>
                </td>
            </tr>
            <?php 
                    $i++;
                } ?>
            
        </tbody>
</table>