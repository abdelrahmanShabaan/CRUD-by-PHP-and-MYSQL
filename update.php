<?php  include('inc/header.php'); ?>   
<?php  include('inc/header.php'); ?>
<?php  include('inc/vaildation.php'); ?>


<?php
//check of all php run code in this page
if(isset($_POST['submit']))
{
    //sanitize hna b2oloo make a check for all value i will enter
    $name = santString($_POST['name']);
    $email = santEmail($_POST['email']);

    //check code is run is this line
    if(requireInput($name) && requireInput($email))
    {
        // make require input vaild from max , min of all value customer will enter
        if(minInput($name,3))
        {
            if(vaildEmail($email))
            {
            	$id =$_POST['id'];
            	if($password)
            	{
            		// first i will make santizing
            		$password = santizing($_POST['password']);
            		//make an hashing too
            		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
            		// if password found make update
            		$sql = "UPDATE `users` SET `user_name`='$name' , `user_email`='$email', `password`='$hashed_password'
            		WHERE `user_id`='$id'";
            	}else{
            		$sql = "UPDATE `users` SET `user_name`='$name' , `user_email`='$email'
            		WHERE `user_id`='$id'";
            	}
                //connect to database
                $result = mysqli_query($conn ,$sql);

                if($result)
                {
                    // don't show untill have data
                    $success = "Updated successfully !";
                     header("refresh:3;url=index.php");
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

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About User</h1>


      <!-- start code error of php  -->
    <?php if($error): ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
        <!-- simple javascript to make history or back page -->
                <a href="javascript:history.go(-1)" class="btn btn-primary"><< Go Back</a>

    <?php endif; ?>
    <!-- end code of error alert of php -->

 <!-- start code error of php  -->
    <?php if($success): ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif; ?>
    <!-- end code of error alert of php -->

   



<?php  include('inc/footer.php'); ?>

 


  