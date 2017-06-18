
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
$('.clockpicker').clockpicker()
	.find('input').change(function(){
		console.log(this.value);
	});
var input = $('#single-input').clockpicker({
	placement: 'top',
	align: 'left',
	autoclose: true,
	'default': 'now'
});

// Manually toggle to the minutes view
$('#check-minutes').click(function(e){
	// Have to stop propagation here
	e.stopPropagation();
	input.clockpicker('show')
			.clockpicker('toggleView', 'minutes');
});
if (/mobile/i.test(navigator.userAgent)) {
	$('input').prop('readOnly', true);
}
</script>
<script type="text/javascript" src="assets/js/highlight.min.js"></script>
<script type="text/javascript">
hljs.configure({tabReplace: '    '});
hljs.initHighlightingOnLoad();
</script>


	</div><!-- /st-content-inner -->
				</div><!-- /st-content -->
			</div><!-- /st-pusher -->
		</div><!-- /st-container -->
		<script src="js/classie.js"></script>
		<script src="js/sidebarEffects.js"></script>
        
        <script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
   	<script>
$(function(){
  $.datepicker.setDefaults($.extend($.datepicker.regional[""])
  );
  $("#datepicker").datepicker({
    changeMonth: true,
    changeYear: true
});
   $("#datepicker2").datepicker({
    changeMonth: true,
    changeYear: true
});
      $("#datepicker3").datepicker({
    changeMonth: true,
    changeYear: true
});
	     $("#datepicker4").datepicker({
    changeMonth: true,
    changeYear: true
});
		       $("#datepicker5").datepicker({
    changeMonth: true,
    changeYear: true
});
	     $("#datepicker6").datepicker({
    changeMonth: true,
    changeYear: true
});
});
	</script>
    <div></div>  
	</body>
</html>
