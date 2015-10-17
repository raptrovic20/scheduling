
			<script type="text/javascript" charset="utf-8">
			jQuery(document).ready(function() {
			$('.btn-primary').qtip({
			content: 'Click Here to LogOut',
			position: {
            my: 'top left',
            target: 'mouse',
			show: { ready: true },
            viewport: $(window), // Keep it on-screen at all times if possible
            adjust: {
                x: 10,  y: 10
            }
        },
        hide: {
            fixed: true // Helps to prevent the tooltip from hiding ocassionally when tracking!
        },
        style: 'ui-tooltip-shadow'
    });					
	});		
		</script>	
		
			
		
			
		