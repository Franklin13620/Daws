       <script src="bootstrap/js/jquery-1.11.0.js"></script>
	   <!--/.librerias y estilos-->	    
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="librerias/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="estilos/scripts.js"></script>		
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>		
		
		<!-- data table -->
		<script src="librerias/datatables/js/jquery.dataTables.min.js"></script>
        <script src="estilos/DT_bootstrap.js"></script>
        <script>
        $(function() {            
        });
        
        //notioficaciones y alertas
        </script>
		
	   <script src="librerias/jGrowl/jquery.jgrowl.js"></script>			   
	   <script>
        $(function() {
            $('.tooltip').tooltip();	
			$('.tooltip-left').tooltip({ placement: 'left' });	
			$('.tooltip-right').tooltip({ placement: 'right' });	
			$('.tooltip-top').tooltip({ placement: 'top' });	
			$('.tooltip-bottom').tooltip({ placement: 'bottom' });

			$('.popover-left').popover({placement: 'left', trigger: 'hover'});
			$('.popover-right').popover({placement: 'right', trigger: 'hover'});
			$('.popover-top').popover({placement: 'top', trigger: 'hover'});
			$('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});

			$('.notification').click(function() {
				var $id = $(this).attr('id');
				switch($id) {
					case 'notification-sticky':
						$.jGrowl("Stick this!", { sticky: true });
					break;

					case 'notification-header':
						$.jGrowl("A message with a header", { header: 'Important' });
					break;

					default:
						$.jGrowl("Hello world!");
					break;
				}
			});
        });
        // Bootstrap
        </script>
		
		<link href="librerias/datepicker.css" rel="stylesheet" media="screen">
        <link href="librerias/uniform.default.css" rel="stylesheet" media="screen">
        <link href="librerias/chosen.min.css" rel="stylesheet" media="screen">		
        <script src="librerias/jquery.uniform.min.js"></script>
        <script src="librerias/chosen.jquery.min.js"></script>
        <script src="librerias/bootstrap-datepicker.js"></script>			
		<script src="librerias/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>  
		<script src="librerias/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
		<script src="librerias/ckeditor/ckeditor.js"></script>
		<script src="librerias/ckeditor/adapters/jquery.js"></script>
		<script type="text/javascript" src="librerias/tinymce/js/tinymce/tinymce.min.js"></script>

        <script>
        $(function() {
            
         

            // Ckeditor editor de texto
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			
				{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
			]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });



		

        </script>
		
		<script src="librerias/fullcalendar/fullcalendar.js"></script>
        <script src="librerias/fullcalendar/gcal.js"></script>	
		<link href="librerias/datepicker.css" rel="stylesheet" media="screen">
		<script src="librerias/bootstrap-datepicker.js"></script>				
		<script>
        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();               
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>				