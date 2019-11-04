<h1>Users</h1>

<?php echo (isset($result_inserted)) ? ($result_inserted) : '' ?>

<?php echo (isset($result_updated)) ? ($result_updated) : '' ?>

<?php echo (isset($result_deleted)) ? ($result_deleted) : '' ?>

<?php if(isset($selected_result)){?>
       <table>
         <thead>
                <tr>
                 <th>No.</th>
                 <th>Name</th>
                 <th>Age</th>
                 <th>Email</th>
                </tr>
         </thead>
         <tbody>
                
                 <?php 
                     foreach($selected_result as $value)
                     {?>
                            <tr>
                                   <?php foreach($value as $val){?>
                                          <td><?php echo $val?></td>
                                   <?php } ?>
                            </tr>
                     <?php } ?>
                
         </tbody>
        </table>
<?php } ?>
        