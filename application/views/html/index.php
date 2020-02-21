<section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
		<?php if(isset($b_list) && count($b_list)>0){ ?>
				<?php $cnt=1;foreach($b_list as $li){ ?>
					<?php if($cnt==1){ ?>
					  <div class="carousel-item active">
						<div class="carousel-background"><img src="<?php echo base_url('assets/home_banners/'.$li['image']); ?>" alt=""></div>
						<div class="carousel-container">
						  
						  <div class="carousel-content">
							<h2><?php echo isset($li['title'])?$li['title']:''; ?></h2>
							<h2><?php echo isset($li['subtitle'])?$li['subtitle']:''; ?></h2>
						  </div>
						</div>
					  </div>
					<?php }else{ ?>
					<div class="carousel-item">
						<div class="carousel-background"><img src="<?php echo base_url('assets/home_banners/'.$li['image']); ?>" alt=""></div>
						<div class="carousel-container">
						   <div class="carousel-content">
							<h2><?php echo isset($li['title'])?$li['title']:''; ?></h2>
							<h2><?php echo isset($li['subtitle'])?$li['subtitle']:''; ?></h2>
						  </div>
						</div>
					  </div>
					<?php } ?>
			<?php $cnt++;} ?>
		  <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url(); ?>assets/design/img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Unparalleled usability </a></h2>
              <p>
               Enable quick adoption with meeting capabilities that make it easy to start, join, and collaborate across any device.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url(); ?>assets/design/img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Join anywhere, on any device</a></h2>
              <p>
                Meetings syncs with your calendar system and delivers streamlined enterprise-grade video conferencing from desktop and mobile.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url(); ?>assets/design/img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Video for every need </a></h2>
              <p>
                Enable internal and external communications, all-hands meetings, and trainings through one communications platform.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

   
	<?php if(isset($dem_video) && count($dem_video)>0){ ?>
	<section class="saved-videos">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Online IAS academy videos</h3>
          
        </header>

        <div class="row">
	<?php foreach($dem_video as $li){ ?>
         <div class="col-md-3">
			 <div class="card">
				<video controls width="100%">
					<source src="<?php echo base_url('assets/video/'.$li['video']); ?>" type="video/mp4">
					<source src="<?php echo base_url('assets/video/'.$li['video']); ?>" type="video/ogg">
				</video>
				<a href="<?php echo base_url('videos/details/'.base64_encode($li['v_id'])); ?>">
				<div class="py-2">
					<h5 class="text-center"><?php echo isset($li['title'])?$li['title']:''; ?></h5>
				</div></a>
			 </div>
		 </div>
	<?php } ?>
		  
		 <div class="col-md-12 text-right mt-3">
			 <a href="<?php echo base_url('videos'); ?>" class="btn btn-primary"> See More Videos</a>
		 </div>
		 

        </div>

      </div>
    </section>
	<?php } ?>
	<!--
	<section class="saved-videos">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Saved Videos</h3>
          
        </header>

        <div class="row">

         <div class="col-md-3">
			 <div class="card">
			
				<a href="#">
				<img src="<?php echo base_url(); ?>assets/design/img/cat1.jpg" alt="" class="img-fluid">
				 <h4 class="title text-center"><a href="">Class 1</a></h4>
				</a>
			 </div>
		 </div>
		 <div class="col-md-3">
			 <div class="card">
			
				<a href="#">
				<img src="<?php echo base_url(); ?>assets/design/img/cat1.jpg" alt="" class="img-fluid">
				 <h4 class="title text-center"><a href="">Class 1</a></h4>
				</a>
			 </div>
		 </div>
		 <div class="col-md-3">
			 <div class="card">
			
				<a href="#">
				<img src="<?php echo base_url(); ?>assets/design/img/cat1.jpg" alt="" class="img-fluid">
				 <h4 class="title text-center"><a href="">Class 1</a></h4>
				</a>
			 </div>
		 </div>
		 <div class="col-md-3">
			 <div class="card">
			
				<a href="#">
				<img src="<?php echo base_url(); ?>assets/design/img/cat1.jpg" alt="" class="img-fluid">
				 <h4 class="title text-center"><a href="">Class 1</a></h4>
				</a>
			 </div>
		 </div>
		
		 
		
		 <div class="col-md-12 text-right mt-3">
			 <a href="<?php echo base_url('videos'); ?>" class="btn btn-primary"> See More Videos</a>
		 </div>
		 

        </div>

      </div>
    </section>-->
    
    
    
   
	
    
  </main>
