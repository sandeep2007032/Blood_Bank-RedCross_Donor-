<html>
    <body>
        <div class="row">
            <div class="col-md-6 m-auto">
            <br><center><h4><u>List of our Store</u></h4><br></center>
            <table class="table">
                <thead>
                    <th>S.No</th>
                    <th>ID</th>
                    
                    <th>State</th>
                    
                    <th>City</th>
                    <th>Address</th>
                    <th>Action</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from city_data";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['id']; ?></td>

                            
                            <td><?php echo $row['state']; ?></td>
                            <td><?php echo $row['city_name']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><a class="btn btn-sm btn-success" href="edit_city.php?did=<?php echo $row['id']; ?>">Edit</a> <a class="btn btn-sm btn-danger" href="city_delete.php?did=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                        <?php
                        $sno++;
                    }
                ?>
            </table> 
            </div>
        </div>  
    </body>
</html>