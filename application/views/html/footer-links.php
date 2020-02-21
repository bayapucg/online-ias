	<script>
		jQuery(function ($) {

		$(".sidebar-dropdown > a").click(function() {
	  $(".sidebar-submenu").slideUp(200);
	  if (
		$(this)
		  .parent()
		  .hasClass("active")
	  ) {
		$(".sidebar-dropdown").removeClass("active");
		$(this)
		  .parent()
		  .removeClass("active");
	  } else {
		$(".sidebar-dropdown").removeClass("active");
		$(this)
		  .next(".sidebar-submenu")
		  .slideDown(200);
		$(this)
		  .parent()
		  .addClass("active");
	  }
	});

	$("#close-sidebar").click(function() {
	  $(".page-wrapper").removeClass("toggled");
	});
	$("#show-sidebar").click(function() {
	  $(".page-wrapper").addClass("toggled");
	});


	   
	   
	});
		scrollToBottom('div0');

	function scrollToBottom(id) {
        var div = document.getElementById(id);
        div.scrollTop = div.scrollHeight - div.clientHeight;
    }
	</script>
  <script src="<?php echo base_url(); ?>assets/design/lib/easing/easing.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/superfish/superfish.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/wow/wow.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/waypoints/waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url(); ?>assets/design/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url(); ?>assets/design/js/main.js"></script>

</body>
</html>
