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
