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
		<div class="container-fluid">
		<div class="row">

		<?php if(isset($video_list) && count($video_list)>0){ ?>
		<?php foreach($video_list as $li){ ?>
				<?php if(isset($li['video_list']) && count($li['video_list'])>0){ ?>
					<?php foreach($li['video_list'] as $vl){ ?>
						<div class="col-md-4">
							<div class="card">
								<video controls width="100%">
									<source src="<?php echo base_url('assets/video/'.$vl['video']); ?>" type="video/mp4">
									<source src="<?php echo base_url('assets/video/'.$vl['video']); ?>" type="video/ogg">
								</video>
								<a href="<?php echo base_url('videos/details/'.base64_encode($vl['v_id'])); ?>">
								<div class="py-2">
									<h5 class="text-center"><?php echo isset($vl['title'])?$vl['title']:''; ?></h5>
								</div></a>
							 </div>
						</div>
					<?php } ?>
				<?php } ?>
		<?php } ?>
		<?php } ?>
		

		
		</div>
		</div>
	</section>