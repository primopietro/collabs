var contents =[];

var list = document.querySelectorAll(".column-content.tooltip");

var counter =0;
var artistName = "Wiz Khalifa";
list.forEach(function(element) {

	if(counter==0){
		if(element.innerText.includes("(feat.") ||  element.innerText.includes("[feat.")){
			if(!element.innerText.includes("(feat. " + artistName ) &&  !element.innerText.includes("[feat. "+ artistName)){
				var songName = "";
				var artistList ="";
				var temp = [];
				if(element.innerText.includes("(feat.")){
					 temp = element.innerText.split("(feat."); 
				}
				else{
					 temp = element.innerText.split("[feat."); 
				}
				
				songName =  temp[0];
				artistList.replace(' (Explicit Album Version)','');
				artistList  =  temp[1].slice(0, -1).slice(1); 
				if(artistList.includes("and") ||  artistList.includes("&") ||  artistList.includes(",")){
					if(artistList.includes("and")){
						artistList = artistList.split("and"); 
					}
					else if(artistList.includes("&")){
						artistList = artistList.split("&"); 
					}
					else if( artistList.includes(",")){
						artistList = artistList.split(","); 
					}
				}
				var localContent = {"songName":songName,"artistList":artistList};
				contents.push(localContent);
			}
		}
	}
	
	counter++;
	
	if(counter==3){
		counter =0;
	}
	
});
JSON.stringify(contents);