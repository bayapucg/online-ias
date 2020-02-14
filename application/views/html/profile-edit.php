<section style="background:#f1f1f1;" >

		
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
<main class="page-content">

   
   
          <div class="panel panel-info">
          
            <div class="panel-body">
              <div class="row justify-content-center d-flex">
			  
               <div class=" col-md-8 card py-4 "> 
				  <h2 class="text-center">Edit Profile</h2>

	<div class="container-fluid">
	<form id="defaultForm" method="post"  action="<?php echo base_url('profile/editpost'); ?>" enctype="multipart/form-data">
      <div class="row ">
			<div class="form-group col-md-6">
				<label class="">Name of the customer</label>
				<div class="">
					<input type="text" class="form-control" name="name" value="<?php echo isset($cdata['name'])?$cdata['name']:""; ?>" placeholder="Enter Name" />
				</div>
			</div>
			<div class="form-group col-md-6">
				<label class="">Mobile No</label>
				<div class="">
					<input type="text" class="form-control" name="mobile" value="<?php echo isset($cdata['mobile'])?$cdata['mobile']:""; ?>" placeholder="Enter Mobile" />
				</div>
			</div>
			<div class="form-group col-md-6">
				<label class="">Email Id</label>
				<div class="">
					<input type="text" class="form-control" name="email" value="<?php echo isset($cdata['email'])?$cdata['email']:""; ?>" placeholder="Enter Emil id" />
				</div>
			</div>
			<div class="form-group col-md-6">
				<label class="">Address</label>
				<div class="">
					<input type="text" class="form-control" name="address" value="<?php echo isset($cdata['address'])?$cdata['address']:""; ?>" placeholder="Enter Address" />
				</div>
			</div>
			<div class="form-group col-md-6">
				<label class="">Profile Pic</label>
				<div class="">
					<input type="file" class="form-control" name="image" />
				</div>
			</div>
			
			<div class="form-group col-lg-12">
				<div class="justify-content-center d-flex">
					<button type="submit" class="btn btn-primary" name="signup" > Update </button>
				  
				</div>
			</div>
                    
		
      </div>
     </form>
        
    </div>
                  
                </div>
              </div>
            </div>
                
            
          </div>
       </main>
  <!-- page-content" -->

</section>
