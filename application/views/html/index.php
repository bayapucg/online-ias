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
          <h3> Why Online IAS Academy?</h3>
        </header>
		<p>To impact quality IAS coaching for the aspirants residing at any nook and corner of the country. To empower the aspirant to have access to quality IAS coaching from the comfort of home. To emancipate the aspirant from Socio- Economic-Job-Family constrains, so that he/she can have access to quality IAS coaching at flexible time from home. Effective and Quality IAS coaching at affordable and competitive prize.  </p>
        <div class="row about-cols">

          <div class="col-md-12 wow fadeInUp">
            <div class="about-col">
              <div class="img">
               <!-- <img src="<?php echo base_url(); ?>assets/design/img/about-mission.jpg" alt="" class="img-fluid"> 
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div> -->
              </div>
			  <br> 
              <h2 class="title">UPSC classes at your doorstep</h2>
			  <br>
              <p> The mission of this online IAS academy platform is to empower every aspirant who is residing at any corner of the country to have access to quality UPSC coaching. No aspirant should be deprived of access to quality UPSC coaching, just because of his/her disadvantaged geographical location. </p> 
			   <p> All the regions of the nation should have adequate representation in All India Services and Central services. Women; especially house wives should be empowered to have access to quality UPSC coaching, so that they can over come the constrains of time and house hold responsibilities, hence can have access to quality UPSC coaching at online IAS academy at their convinient time, from the comfort of their home. </p>  
            </div>
          </div>

          <div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
               <!-- <img src="<?php echo base_url(); ?>assets/design/img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div> -->
              </div>
			  <br>
              <h2 class="title">Online classes played at your convience</h2> 
			  <br>
              <p>
                The aspirant can have access to UPSC coaching from any part of the country through the online IAS academy platform. The aspirant can have access to UPSC coaching classes at his/her convenient time; even if he or she missed the class, the same class will be uploaded on our website named "Online IAS Academy.com", so that the aspirant can access every missed class  through the website any number of times.  </p> 
				<p> The aspirants who are persueing their higher education: can have access to UPSC coaching simultaneously.  The classes are designed in such a way that the the Job–holder aspirants can have access to UPSC coaching in simulated live classes after his/her office hours. </p>
            </div>
          </div>

          <div class="col-md-12 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
               <!-- <img src="<?php echo base_url(); ?>assets/design/img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div> -->
              </div>
			  <br>
              <h2 class="title">Cost effective Course </h2>
			  <br>
              <p>The mission of this online IAS academy platform is to impart quality UPSC coaching for every aspirant irrespective his/her geographical location. To provide effective UPSC coaching at affordable and competitive prizes, around 1/4th less than the offline courses, with ought to compromising the quality of the course. To improve socio – economically week aspirants to have access to cost effective quality UPSC coaching at affordable prizes. </p> 
			  <p> Aspirants need not to shift to metro policies for UPSC coaching, which is financially very cumbersome. The aspirants need not refrain from during Job for UPSC coaching, which will be a big financial burden on the family, the aspirant can have access to qualify UPSC coaching even while doing his/her Job. </p>
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
