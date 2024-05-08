<body>
	<div id='wrapper'>
		
		<div >
			<div id="bigPic">
				<img src="images/1.png" alt="" />
				<img src="images/2.png" alt="" />
				<img src="images/3.png" alt="" />
				<img src="images/4.png" alt="" />
				<img src="images/5.png" alt="" />
				<img src="images/6.png" alt="" />
				<img src="images/7.png" alt="" />
				
			</div>
			
			
			<ul id="thumbs">
				<li class='active' rel='1'><img src="images/1_thumbs.png" alt="" /></li>
				<li rel='2'><img src="images/2_thumbs.png" alt="" /></li>
				<li rel='3'><img src="images/3_thumbs.png" alt="" /></li>
				<li rel='4'><img src="images/4_thumbs.png" alt="" /></li>
				<li rel='5'><img src="images/5_thumbs.png" alt="" /></li>
				<li rel='6'><img src="images/6_thumbs.png" alt="" /></li>
				<li rel='7'><img src="images/7_thumbs.png" alt="" /></li>
			</ul>
		
		</div>
		
	</div>
	
	</div>

	<script type="text/javascript">
	var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
        if(index < $('#bigPic img').length){
        	var indexImage = $('#bigPic img')[index]
            if(currentImage){   
            	if(currentImage != indexImage ){
                    $(currentImage).css('z-index',2);
                    clearTimeout(myTimer);
                    $(currentImage).fadeOut(250, function() {
					    myTimer = setTimeout("showNext()", 3000);
					    $(this).css({'display':'none','z-index':1})
					});
                }
            }
            $(indexImage).css({'display':'block', 'opacity':1});
            currentImage = indexImage;
            currentIndex = index;
            $('#thumbs li').removeClass('active');
            $($('#thumbs li')[index]).addClass('active');
        }
    }
    
    function showNext(){
        var len = $('#bigPic img').length;
        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
        showImage(next);
    }
    
    var myTimer;
    
    $(document).ready(function() {
	    myTimer = setTimeout("showNext()", 3000);
		showNext(); //loads first image
        $('#thumbs li').bind('click',function(e){
        	var count = $(this).attr('rel');
        	showImage(parseInt(count)-1);
        });
	});
    
	
	</script>	
</body>	
