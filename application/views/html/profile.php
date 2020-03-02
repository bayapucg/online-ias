<head>
	<title>Online IAS Academy | By Kiran Anishetti </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="onlineiasacademy, online-ias-academy, online ias academy in hyderabad, political science, upsc mains, civil services" name="keywords"/>
  <meta content="Online IAS Academy - The vision to reach millions of Civil Service aspirants all over India especially with optional subjects Political Science and International Relations." name="description"/>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158852895-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158852895-1');
</script>
</head>
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
				  <div class=" text-center mb-4"> 
						<?php if($cdata['p_pic']!=''){ ?>
						<img style="width:150px;border-radius:50%;border:1px solid #ddd;margin:0 auto;" alt="User Pic" src="<?php echo base_url('assets/profile_pic/'.$cdata['p_pic']); ?>" >
						<?php }else{ ?>
						<img style="width:150px;border-radius:50%;border:1px solid #ddd;margin:0 auto;" alt="User Pic" src="<?php echo base_url('assets/profile_pic/user.jpg'); ?>">
						<?php } ?>						
				 </div>
                  <table class="table table-user-information">
				  
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><?php echo isset($cdata['name'])?$cdata['name']:''; ?></td>
                      </tr>
					  <tr>
                        <td>Desgination:</td>
                        <td><?php echo isset($cdata['rname'])?$cdata['rname']:''; ?></td>
                      </tr>
                      <tr>
                        <td>Email Id</td>
                        <td><?php echo isset($cdata['email'])?$cdata['email']:''; ?></td>
                      </tr>
                      <tr>
                        <td>Mobile No</td>
                        <td><?php echo isset($cdata['mobile'])?$cdata['mobile']:''; ?></td>
                      </tr>
					 <tr>
                        <td>Address</td>
                        <td><?php echo isset($cdata['address'])?$cdata['address']:''; ?></td>
                     </tr>          
                     
                    </tbody>
					 <a class="btn btn-primary" href="<?php echo base_url('profile/edit'); ?>">Edit</a>
                  </table>
                  
                </div>
              </div>
            </div>
                
            
          </div>
       </main>
  <!-- page-content" -->

</section>
