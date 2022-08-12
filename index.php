
<?php 

 
// Include and initialize JSON class 

use App\Models\User;

require __DIR__ . '/vendor/autoload.php';

 
// Fetch the member's data 
$user = new User();
$members = $user->getAll(); 

 

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrudOOP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <main class="container mt-4">



        <div class="row">
            <div class="col-md-12 head">
                <!-- Add link -->
                <div class="float-right">
                    <a href="addEdit.php" class="btn btn-success"><i class="fa fa-plus"></i> New Member</a>
                </div>
                <h5>Members</h5> <hr>
            </div>
        
            <!-- List the users -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($members) and $members->num_rows > 0){ 
                        $count = 0; 
                        while($row = $members->fetch_assoc()){ $count++; ?>
                    <tr>

                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td>
                            <a href="addEdit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">edit</a>
                            <a href="userAction.php?action_type=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');">delete</a>
                        </td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="6">No member(s) found...</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- .row -->




    </main>
</body>
</html>