<section style="background:#f1f1f1;" >

		
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
<main class="page-content">

   
   
          <div class="panel panel-info">
          
            <div class="panel-body ">
              <div class="row justify-content-center d-flex">
			  
               <div class=" col-md-6 card py-4 mt-5 mb-5">
			<div style="margin:0 auto;">			   
			   <img style="width:80px;height:80px;" src="<?php echo base_url(); ?>assets/design/img/suc.gif">
			</div>
				  <h2 class="text-center text-success">Payment successfully completed </h2>
	<div class="container-fluid">

	<table class="table table-user-information">
					<tbody>
						<tr>
                        <td>Title:</td>
                        <td><?php echo isset($p_d['title'])?$p_d['title']:''; ?></td>
                      </tr>
					  <tr>
                        <td>Description:</td>
                        <td><?php echo isset($p_d['description'])?$p_d['description']:''; ?></td>
                      </tr>
                      <tr>
                        <td>Paid Amount</td>
                        <td><?php echo isset($p_d['paid_amt'])?$p_d['paid_amt']:''; ?></td>
                      </tr>
					   </tbody>
                  </table>
        
    </div>
                  
                </div>
              </div>
            </div>
                
            
          </div>
       </main>
  <!-- page-content" -->

</section>
