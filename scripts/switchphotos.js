			var curIndexStudy=0;
			var curIndexLiving=0;
			
			var timeIntervalStudy=4000;
			var timeIntervalLiving=5000;
			
			var schoolPhotoset = new Array();
			schoolPhotoset[0]="images/BCIT/bcit.jpg";
			schoolPhotoset[1]="images/UBC/ubc.jpg";
			schoolPhotoset[2]="images/SFU/sfu.jpg";
			schoolPhotoset[3]="images/Langara/langara.jpg";
			
			var livingPhotoset = new Array();
			livingPhotoset[0]="images/Entertainment/entertainment.jpg";
			livingPhotoset[1]="images/ImmigrationAndTax/tax.jpg";
			livingPhotoset[2]="images/health.jpg";
			livingPhotoset[3]="images/sightview.jpg";
			
			
			setInterval(changePhotoStudy, timeIntervalStudy);
			setInterval(changePhotoLiving, timeIntervalLiving);

			
			function changePhotoStudy () {
				var schoolGallery = document.getElementById("schoolPhotos");
				if (curIndexStudy == schoolPhotoset.length-1) {
				curIndexStudy = 0;
				} else {
				curIndexStudy++;
				}
				schoolGallery.src = schoolPhotoset[curIndexStudy];
			}
			
			function changePhotoLiving () {
				var livingGallery = document.getElementById("livingPhotos");
				if (curIndexLiving == livingPhotoset.length-1) {
				curIndexLiving = 0;
				} else {
				curIndexLiving++;
				}
				livingGallery.src = livingPhotoset[curIndexLiving];
			}