<script src="<?php echo base_url(); ?>assets/back/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
		"order": [[ 0, "desc" ]],
        buttons: [
            'print'
        ]
    } );
} );
</script>