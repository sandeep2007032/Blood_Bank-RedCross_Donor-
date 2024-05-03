<html>
    <body>
        <div class="row">
            <div class="col-md-6 m-auto">
            <br><center><h4><u>Query</u></h4><br></center>
            <table class="table">
                <thead>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>query</th>
                    <th>Mobile No</th>
                    <th>submission_datetime</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from contact_form";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                           --
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['query']; ?></td>


                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['submission_datetime']; ?></td>

                            <td><a class="btn btn-sm btn-danger" href="delete_query.php?did=<?php echo $row['id']; ?>">Delete</a></td>
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