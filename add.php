<?php  include('inc/header.php'); ?>
<?php  include('inc/vaildation.php'); ?>


<?php
//check of all php run code in this page
if(isset($_POST['submit']))
{
    //sanitize hna b2oloo make a check for all value i will enter
    $name = santString($_POST['name']);
    $email = santEmail($_POST['email']);
    $password = santString($_POST['password']);

    //check code is run is this line
    if(requireInput($name) && requireInput($email) && requireInput($password))
    {
        // make require input vaild from max , min of all value customer will enter
        if(minInput($name,3) && maxInput($password,20))
        {
            if(vaildEmail($email))
            {
                // this make hashed for password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // to insert new user
            $sql = "INSERT INTO `users` (`user_name`,`user_email`,`user_password`)
                        VALUES ('$name','$email','$hashed_password')  ";

                //connect to database
                $result = mysqli_query($conn ,$sql);

                if($result)
                {
                    // don't show untill have data
                    $success = "added successfully !";
                }

            } else {
                //here i talk them if all filed is null tell me this message 
                $error = "please type vaid email ";
            }

        }else {
                //second check tell me if you make filed enter but not equal requirements
            $error ="Name must Be grater than 3 character / password must be less than 20";
        }

    }else {
        // print lw mf5lsh 7aga
        $error =  "please fill all fildes";
    }
}
?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
    <!-- start code error of php  -->
    <?php if($error): ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?> </h5>
    <?php endif; ?>
    <!-- end code of error alert of php -->

 <!-- start code error of php  -->
    <?php if($success): ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?> </h5>
    <?php endif; ?>
    <!-- end code of error alert of php -->

   
   
    <div class="col-md-6 offset-md-3">
        <!-- start add php from(methods) -->
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- end of process of php POST way to run backend code -->
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" >
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
   
<?php  include('inc/footer.php'); ?>

 
  