<?php
    $this->load->view('admin/templates/header2');
?>

<!--DISABLED TELEPHONE PATTERN LATER FOR EASIER TESTING-->
<section class="Form my-4 mx-5 w-100 mx-auto text-white">
		<div class="container">
			<div class="row">
                <div class="col-lg-6 p-4 mt-4">
                    <h1 class="text-center">PC BUILDER</h1>
                    <h5 class="text-center">Want a Custom PC Without the Expensive Price tag?</h5>
                    <img src="<?php echo base_url('styles/PCB_SamplePic.png'); ?>" alt="" class="col-12 pt-5 mx-auto d-block">
                </div>

				<div class="col-lg-5 bg-dark bg-opacity-50 p-3 mt-5 mx-auto">
					<h3 class="pb-4 text-center">Edit Your Account</h3>
               
                <form action="<?php echo base_url().'admin/updateuserdetails/'?>" method="POST" class="form-container mx-auto  shadow-container" id="myForm" style="width:80%" enctype="multipart/form-data">
                <input type="hidden" name="userid" value="<?php echo $row->usersId; ?>">
          <?php { ?>
                        <!-- First Name -->
                        <div class="form-row">
							<div class="col-9 mx-auto">
								<input type="text" required name="firstName"  value="<?php echo $row->firstName;?>" placeholder="First Name"  class="form-control my-3 p-2">
							</div>
						</div>
						
                        <!-- Last Name -->
                        <div class="form-row">
							<div class="col-9 mx-auto">
								<input type="text" required name="lastName"  value="<?php echo $row->lastName;?>" placeholder="Surname"  class="form-control my-3 p-2" >
							</div>
						</div>

                        <!-- UserName -->
                        <div class="form-row">
							<div class="col-9 mx-auto">
								<input type="text" required name="usersUid"  value="<?php echo $row->usersUid;?>" placeholder="Username"  class="form-control my-3 p-2" >
							</div>
						</div>

                        <!-- Telephone -->
                        <div class="form-row">
							<div class="col-9 mx-auto">
								<input type="tel" required name="phone"  value="<?php echo $row->phone;?>" placeholder="Phone Number (09XX-XXX-XXXX)"  class="form-control my-3 p-2" <?php /*pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}"*/?>>
							</div>
						</div>

                        <!-- Email -->
						<div class="form-row">
							<div class="col-9 mx-auto">
								<input type="email" required name="usersEmail"  value="<?php echo $row->usersEmail;?>" placeholder="Email"  class="form-control my-3 p-2">
							</div>
						</div>

                        <!-- Address -->
                        <div class="form-row">
							<div class="col-9 mx-auto">
								<input type="text" required name="address"  value="<?php echo $row->address;?>" placeholder="Address"  class="form-control my-3 p-2">
							</div>
						</div>

                        <!-- Password -->
						<div class="form-row">
							<div class="col-9 mx-auto">
								<input type="password" required name="usersPwd"   placeholder="Password" class="form-control my-3 p-2" >
							</div>
						</div>

                        <!-- Password Repeat -->
                        <div class="form-row">
							<div class="col-9 mx-auto">
								<input type="password" required name="pwdRepeat"  placeholder="Confirm Password" class="form-control my-3 p-2" >
							</div>
						</div>
                       
                        <!-- Submit -->
						<div class="form-row">
							<div class="col-lg-12 text-center">
                                <input type="submit" class="mt-3 mb-4 col-7" value="Submit" name="updateuser"></input>
							</div>
						</div>
                         <?php } ?>
					</form>
				</div>
			</div>
		</div>
	</section>
    <!-- HTML End -->


