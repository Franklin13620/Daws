       <link href="admin/estilos/styles.css" rel="stylesheet" media="screen">
	   <!--librerias-->
        <link href="admin/librerias/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <script src="admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="admin/librerias/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="admin/estilos/scripts.js"></script>
				<script>
				$(function() {
				<!-----------------------Graficos circulares---------------------------------->
					$('.chart').easyPieChart({animate: 1000});
				});
				</script>

		<!-- jgrowl -->
		<script src="admin/librerias/jGrowl/jquery.jgrowl.js"></script>
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
				</script>
			<link href="admin/librerias/datepicker.css" rel="stylesheet" media="screen">
			<link href="admin/librerias/uniform.default.css" rel="stylesheet" media="screen">
			<link href="admin/librerias/chosen.min.css" rel="stylesheet" media="screen">
		<!--  -->
		<script src="admin/librerias/jquery.uniform.min.js"></script>
        <script src="admin/librerias/chosen.jquery.min.js"></script>
        <script src="admin/librerias/bootstrap-datepicker.js"></script>
		<!--  -->
			<script src="admin/librerias/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
			<script src="admin/librerias/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
			<script src="admin/librerias/ckeditor/ckeditor.js"></script>
			<script src="admin/librerias/ckeditor/adapters/jquery.js"></script>
			<script type="text/javascript" src="admin/librerias/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
        $(function() {
           <!-----------------Ckeditor standard para editar la subida de archivos tipo word--------->
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
				{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
			]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });
        </script>

		<script src="admin/estilos/jquery.hoverdir.js"></script>
		<link rel="stylesheet" type="text/css" href="admin/estilos//style.css" />
			<script type="text/javascript">
			$(function() {
				$('#da-thumbs > li').hoverdir();
			});
			</script>
			<script src="admin/librerias/fullcalendar/fullcalendar.js"></script>
			<script src="admin/librerias/fullcalendar/gcal.js"></script>
			<link href="admin/librerias/datepicker.css" rel="stylesheet" media="screen">
			<script src="admin/librerias/bootstrap-datepicker.js"></script>
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
