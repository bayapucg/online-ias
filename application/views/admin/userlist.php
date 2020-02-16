<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Users List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users List</li>
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
                  <th>Address</th>
				  <th>Created Date & Time</th>				  
                </tr>
                </thead>
                <tbody>
				<?php if(isset($u_list) && count($u_list)>0){ ?>
					<?php foreach($u_list as $li){ ?>
					<tr>
					  <td><?php echo isset($li['name'])?$li['name']:''; ?></td>
					  <td><?php echo isset($li['email'])?$li['email']:''; ?></td>
					  <td><?php echo isset($li['mobile'])?$li['mobile']:''; ?></td>
					  <td><?php echo isset($li['address'])?$li['address']:''; ?></td>
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
                  <th>Address</th>
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
