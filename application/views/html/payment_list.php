<section style="background:#f1f1f1;" >

		
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
<main class="page-content">

   
   
          <div class="panel panel-info">
          
            <div class="panel-body">
              <div class="row justify-content-center d-flex">
			  <?php if(isset($p_list) && count($p_list)>0){ ?>
			  <?php foreach($p_list as $li){ ?>
               <div class=" col-md-8 card py-4"> 
				 <table class="table table-user-information">
					<tbody>
                      <tr>
                        <td>Title:</td>
                        <td><?php echo isset($li['title'])?$li['title']:''; ?></td>
                      </tr>
					  <tr>
                        <td>Description:</td>
                        <td><?php echo isset($li['description'])?$li['description']:''; ?></td>
                      </tr>
                      <tr>
                        <td>Amount</td>
                        <td><?php echo isset($li['amt'])?$li['amt']:''; ?></td>
                      </tr>
					  <tr>
                        <td>&nbsp;</td>
                        <td>
						<a class="btn btn-primary" href="<?php echo base_url('payment/details/'.base64_encode($li['p_id'])); ?>">Pay</a>
						</td>
                      </tr>
                    </tbody>
                  </table>
                  
                </div>
				<div class="clearfix">&nbsp;</div>
			  <?php } ?>
			  <?php } ?>
              </div>
            </div>
                
            
          </div>
       </main>
  <!-- page-content" -->

</section>
