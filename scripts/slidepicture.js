    
    var currentPicture = 0;
    var autoAddjustment = 1;

    $(document).ready(function () {
    	$("#switchLeft").click(function(){
    		moveLeft();
    		setPicturePosition();
    	});
    	$("#switchRight").click(function(){
    		moveRight();
    		setPicturePosition();
    		
    	});

    	setInterval(autoSlide, 4000);

    });


    function moveLeft() {
    	currentPicture ++;
    	if(currentPicture == 3) {
    		currentPicture = 0;
    	} 
    }

        function moveRight() {
    	currentPicture --;
    	if (currentPicture == -1) {
    		currentPicture = 2;
    	}

    }

    function setPicturePosition(){
	    var offset = currentPicture * 100;
		$("#pictureContainner").css("left", "-" + offset + "%");
    }

    function autoSlide() {
    	if (currentPicture == 2){
    		autoAddjustment = -1;
    	}
    		
    	if (currentPicture == 0) {
    		autoAddjustment = 1;
    	}

    	currentPicture += autoAddjustment;
    	setPicturePosition();

    	}






