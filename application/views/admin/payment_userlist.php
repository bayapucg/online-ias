<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Payment Users List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payment Users List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email Id</th>
                  <th>Mobile</th>
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
					  <td><?php echo isset($li['name'])?$li['name']:''; ?></td>
					  <td><?php echo isset($li['email'])?$li['email']:''; ?></td>
					  <td><?php echo isset($li['mobile'])?$li['mobile']:''; ?></td>
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
				  <th>Name</th>
                  <th>Email Id</th>
                  <th>Mobile</th>
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
            <!-- /.box-body -->
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <script>

		$('#example1').DataTable( {
			
		} );
	
  </script>
  </script>
