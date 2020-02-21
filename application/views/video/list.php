<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Videos List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('video/add'); ?>"><i class="fa fa-plus"></i> Add</a></li>
        <li class="active">Videos List</li>
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
                  <th>Type</th>
                  <th>Topic</th>
                  <th>Topic</th>
                  <th>Teacher</th>
                  <th>Video</th>
				  <th>Created Date & Time</th>				  
                  <th>Status</th>				  
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php if(isset($v_list) && count($v_list)>0){ ?>
					<?php foreach($v_list as $li){ ?>
					<tr>
					  <td><?php echo isset($li['type'])?$li['type']:''; ?></td>
					  <td><?php echo isset($li['title'])?$li['title']:''; ?></td>
					  <td><?php echo isset($li['topic'])?$li['topic']:''; ?></td>
					  <td><?php echo isset($li['teacher'])?$li['teacher']:''; ?></td>
					  <td>
					  <?php if($li['video']!='') { ?>
						<video width="30%" height="10%" class="thumbnail">
							<source src="<?php echo base_url('assets/video/'.$li['video']); ?>" type="video/mp4">
						</video>
					  <?php } ?>
					  </td>
					  <td><?php echo isset($li['created_at'])?date("d-m-Y H:i:s", strtotime($li['created_at'])):''; ?></td>
					  <td><?php if($li['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
					 <td> 
						<a href="<?php echo base_url('video/status/'.base64_encode($li['v_id']).'/'.base64_encode($li['status'])); ?>" class="confirmation"><i class="fa fa-pencil btn btn-success"></i></a>
						<a href="<?php echo base_url('video/edit/'.base64_encode($li['v_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-edit btn btn-warning"></i></a>
						<a href="<?php echo base_url('video/delete/'.base64_encode($li['v_id'])); ?>" data-toggle="tooltip" title="Delete" class="confirmation"><i class="fa fa-trash btn btn-danger"></i></a>
						<a href="<?php echo base_url('video/chat/'.base64_encode($li['v_id'])); ?>" data-toggle="tooltip" title="Chat" class=""><i class="fa fa-envelope btn btn-danger"></i></a>
						
					 </td>
					</tr>
					
					<?php } ?>
				<?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
				 <th>Type</th>
				 <th>Title</th>
                  <th>Topic</th>
                  <th>Teacher</th>
                  <th>Video</th>
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
