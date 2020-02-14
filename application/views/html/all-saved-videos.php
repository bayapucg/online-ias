
<section style="background:#f1f1f1;" >

		
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="container-fluid">
		<div class="row">

		<?php if(isset($video_list) && count($video_list)>0){ ?>
		<?php foreach($video_list as $li){ ?>
		<div class="col-md-4">
				<div class="card">
					<video controls width="100%">
						<source src="<?php echo base_url('assets/video/'.$li['video']); ?>" type="video/mp4">
						<source src="<?php echo base_url('assets/video/'.$li['video']); ?>" type="video/ogg">
					</video>
					<div class="py-2">
						<h5 class="text-center"><?php echo isset($li['title'])?$li['title']:''; ?></h5>
					</div>
				 </div>
		</div>
		<?php } ?>
		<?php } ?>
		

		
		</div>
		</div>
	</section>