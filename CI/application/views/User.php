<h1>Users</h1>
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
                 foreach($result as $value)
                 {?>
                        <tr>
                        <?php foreach($value as $val){?>
                            <td><?php echo $val ?></td>    
                        <?php } ?>
                        </tr>
                 <?php } ?>
                
         </tbody>
        </table>