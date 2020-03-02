<head>
	<title>Online IAS Academy | By Kiran Anishetti </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="onlineiasacademy, online-ias-academy, online ias academy in hyderabad, political science, upsc mains, civil services" name="keywords"/>
  <meta content="Online IAS Academy - The vision to reach millions of Civil Service aspirants all over India especially with optional subjects Political Science and International Relations." name="description"/>
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
			  
               <div class=" col-md-8 card py-4"> 
				 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Total Amount</th>
                  <th>Paid Amount</th>
                  <th>Promo code Amount</th>
				  <th>Created Date & Time</th>				  
                </tr>
                </thead>
                <tbody>
				<?php if(isset($p_u_list) && count($p_u_list)>0){ ?>
					<?php foreach($p_u_list as $li){ ?>
					<tr>
						<td><?php echo isset($li['title'])?$li['title']:''; ?></td>
					  <td><?php echo isset($li['description'])?$li['description']:''; ?></td>
					  <td><?php echo isset($li['total_amt'])?$li['total_amt']:''; ?></td>
					  <td><?php echo isset($li['paid_amt'])?$li['paid_amt']:''; ?></td>
					  <td><?php echo isset($li['coupon_code'])?$li['coupon_code']:''; ?></td>
					  <td><?php echo isset($li['created_at'])?date("d-m-Y H:i:s", strtotime($li['created_at'])):''; ?></td>
					</tr>					
					<?php } ?>
				<?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Total Amount</th>
                  <th>Paid Amount</th>
                  <th>Promo code Amount</th>
				  <th>Created Date & Time</th>			  
                </tr>
                </tfoot>
              </table>
                  
                </div>
				<div class="clearfix">&nbsp;</div>
			  
			  
              </div>
            </div>
                
            
          </div>
       </main>
  <!-- page-content" -->

</section>
 <script>

		$('#example1').DataTable( {
			
		} );
	
  </script>