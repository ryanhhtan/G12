    
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
    	if(currentPicture < 2) {
    		currentPicture ++;
    	} 


    }

        function moveRight() {
    	if(currentPicture > 0) {
    		currentPicture --;
    	} 

    }

    function setPicturePosition(){
    	    var offset = currentPicture * 100;
    		$("#pictureContainner").css("left", "-" + offset + "%");
    }