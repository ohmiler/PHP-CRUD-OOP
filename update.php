<?php 

    include_once('functions.php');

    $updatedata = new DB_con();

    if (isset($_POST['update'])) {

        $userid = $_GET['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];

        $sql = $updatedata->update($fname, $lname, $email, $phonenumber, $address, $userid);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='update.php'</script>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1 class="mt-5">Update Page</h1>
        <hr>
        <?php 

            $userid = $_GET['id'];
            $updateuser = new DB_con();
            $sql = $updateuser->fetchonerecord($userid);
            while($row = mysqli_fetch_array($sql)) {
        ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstname" 
                    value="<?php echo $row['firstname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastname"
                    value="<?php echo $row['lastname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" 
                    value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phonenumber">Phone Number</label>
                <input type="text" class="form-control" name="phonenumber"
                    value="<?php echo $row['phonenumber']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <textarea name="address"cols="30" rows="10" class="form-control" required><?php echo $row['address']; ?></textarea>
            </div>
            <?php } ?>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    
</body>
</html>