<?php include('include/header.php'); ?>

        <div class="container sign-in-up">
          <div class="row">
            <div class="col-md-6">
              <h1>Furniture Studio</h1>
              <p>Welcome to Furniture Studio, your number one source for all things.
                Online Furniture Studio is a process in which we can order 
                various furniture items online. <br>
                We're dedicated to providing you the very best of product, with an emphasis
                on bed set, dining set, chairs, table, sofas, and cupboard.<br><br>
                   
                Supply and Installation Service :<br><br>
				
				Office Furniture<br>
				Bedroom Furniture<br>
				Kitchen Furniture<br>
				Hostel Furniture<br>
				Institutions Furniture<br><br>
                
                Project Completed :<br>
				AIIMS Guntur<br>
				AIIMS Nagpur<br>
				IIM Visakhapatnam<br>
				Tribal Department, Nagpur<br><br>
				
				Team Members :<br>
				Harsha Ingulkar - Director<br>
				Manoj Ingulkar - Vice President<br>
				Mohan Atalkar - Project Manager<br>
				Vikrant Kapse - Head Finanace and account department<br>
				Snehal Kapse - Manager Supply Chain<br>
				Nikhil Choudhary - Executive<br><br>
                  
                  
                Sincerely,<br>
                Harsha Ingulkar<br>
				Director<br></p>
            </div>
            
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h1 class="text-center mt-5">Register Account</h1>
                  
                  <script>
					function validate()
					{
						var email=document.myform.email.value
						var atpos=email.indexOf("@");
						var dotpos=email.lastIndexOf(".");
						if(atpos<1 || dotpos<atpos+2 || dotpos+2>email.length)
						{
							alert("Please enter valid email address");
							return false
						}
						var mobile=document.myform.phone_number.value
						if(isNaN(mobile))
						{
							alert("Please enter numerical valid mobile number");
							return false
						}
						if(mobile.length<10 || mobile.length>10 || mobile.startsWith("0"))
						{
							alert("Please enter valid 10 digit mobile number");
							return false
						}
						var pass=document.myform.password.value
						if(pass.length<8)
						{
							alert("Please enter at least 8 character password")
							return false
						}
						var postal=document.myform.code.value
						if(postal.length<6 || postal.length>6)
						{
							alert("Please enter valid 6 digit postal code");
							return false
						}
						return true;
					}
					  </script>
                  <form method="post" class="mt-5 p-3" action="" name="myform" onsubmit="return validate()">
                    
                    <?php 
                      if(isset($_POST['register'])){
                          
                          $fullname = $_POST['fullname'];
                          $email = $_POST['email'];
                          $password = $_POST['password'];
                          $conf_pass = $_POST['confirm-password'];
                          $address = $_POST['address'];
                          $city = $_POST['city'];
                          $postal_code = $_POST['code'];
                          $number = $_POST['phone_number'];
                          
                          if(!empty($fullname) or !empty($email) or !empty($password) or !empty($conf_pass) or !empty($address) or !empty($city) or !empty($postal_code) or !empty($number)){

                            if($password === $conf_pass){

                              $cust_query="INSERT INTO customer(`cust_name`,`cust_email`,`cust_pass`,`cust_add`,`cust_city`,`cust_postalcode`,`cust_number`) VALUES('$fullname','$email','$password','$address','$city','$postal_code','$number')";


                              if(mysqli_query($con,$cust_query)){
                                  $message="You Are Registered Successfully!";
                              }
                              
                              
                              
                            } 
                            else{
                                $error="Passwords do not Match";
                            }
                          }
                            else{
                          $error="All (*) Fields Required";
                      }
                      }
                    
                      ?>
                      <?php
                      if(isset($error)){
                      
                        echo "<div class='alert bg-danger' role='alert'>
                                <span class='text-white text-center'> $error</span>
                              </div>";
                    
                        }
                      else if(isset($message)){
                      
                        echo "<div class='alert bg-success' role='alert'>
                                <span class='text-white text-center'> $message</span>
                              </div>";
                    
                        }
                      
                      ?>
					  
                    <div class="form-group">
                    
                      <input type="text" name="fullname" placeholder="Full Name" class="form-control" >
                     </div>

                    <div class="form-group">
                      <input type="text" name="email" placeholder="Email" class="form-control" >
                     </div>

                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <input type="password" name="password" placeholder="password" class="form-control" >
                          </div>
                        </div>
                        <div class="col-sm-6 col-12 col-md-6 ">
                          <div class="form-group">
                            <input type="password" name="confirm-password" placeholder="Confirm password" class="form-control" >
                          </div>
                        </div>
                      </div>
                  

                      <div class="form-group">
                        <input type="text" name="address" placeholder="Address" class="form-control" >
                    </div>
                     
                    <div class="row">
                      <div class="col-md-6 col-6">
                        <div class="form-group">
                          <input type="text" name="city" placeholder="City" class="form-control" >
                       </div>
                      </div>
                      
                      <div class="col-md-6 col-6">
                        <div class="form-group">
                          <input type="number" name="code" placeholder="Postal code" class="form-control" >
                       </div>
                      </div>

                    </div>

                    <div class="form-group">
                      <input type="number" name="phone_number" placeholder="Phone Number" class="form-control" >
                   </div>

                      <div class="form-group text-center mt-4">
                        <input type="submit" name="register" class="btn btn-primary" value="Register">
                      </div>

                      <div class="text-center mt-4"> Already a Member? <a href="sign-in.php"> Sign in </a></div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
   
        <?php include('include/footer.php');?>