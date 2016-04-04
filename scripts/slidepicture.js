    
    var currentPicture = 0;

    $(document).ready(function () {
    	$("#switchLeft").click(function(){
    		moveLeft();
    		setPicturePosition();
    	});
    	$("#switchRight").click(function(){
    		moveRight();
    		setPicturePosition();
    		
    	});

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
    	setInterval(moveLeft, 3000); 
    	}



