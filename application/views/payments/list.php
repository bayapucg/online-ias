<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Payments List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('payments/add'); ?>"><i class="fa fa-plus"></i> Add</a></li>
        <li class="active">Payments List</li>
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
                  <th>Title</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Promo Code</th>
                  <th>Promo Code Amount</th>
				  <th>Created Date & Time</th>				  
                  <th>Status</th>				  
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php if(isset($pay_l) && count($pay_l)>0){ ?>
					<?php foreach($pay_l as $li){ ?>
					<tr>
					  <td><?php echo isset($li['title'])?$li['title']:''; ?></td>
					  <td><?php echo isset($li['description'])?$li['description']:''; ?></td>
					  <td><?php echo isset($li['amt'])?$li['amt']:''; ?></td>
					  <td><?php echo isset($li['promo'])?$li['promo']:''; ?></td>
					  <td><?php echo isset($li['promo_amt'])?$li['promo_amt']:''; ?></td>
					  <td><?php echo isset($li['created_at'])?date("d-m-Y H:i:s", strtotime($li['created_at'])):''; ?></td>
					  <td><?php if($li['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
					 <td> 
						<a href="<?php echo base_url('payments/status/'.base64_encode($li['p_id']).'/'.base64_encode($li['status'])); ?>" class="confirmation"><i class="fa fa-pencil btn btn-success"></i></a>
						<a href="<?php echo base_url('payments/edit/'.base64_encode($li['p_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-edit btn btn-warning"></i></a>
						<a href="<?php echo base_url('payments/delete/'.base64_encode($li['p_id'])); ?>" data-toggle="tooltip" title="Delete" class="confirmation"><i class="fa fa-trash btn btn-danger"></i></a>
						
					 </td>
					</tr>
					
					<?php } ?>
				<?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
				  <th>Title</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Promo Code</th>
                  <th>Promo Code Amount</th>
				  <th>Created Date & Time</th>				  
                  <th>Status</th>				  
				  <th>Action</th>
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
