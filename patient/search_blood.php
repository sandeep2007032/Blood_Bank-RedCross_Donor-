<html>
    <body>
        <div class="row">
            <div class="col-md-6 m-auto">
            <br><center><h4><u>Search Blood</u></h4><br></center>
            <table class="table">
                <thead>
                    <th>S.No</th>
                    
                   
                    <th>Blood_Group</th>
                    <th>Stock</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    // $query = "select * from stocks where patient_id = $_SESSION[uid]";
                    $query = "SELECT blood_group, stock FROM stocks";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            
                            <td><?php echo $row['blood_group']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                            
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