let modal;
let modalImg;
let captionText;
let photoId
let photoDir = "../picuploadw600h400/";

window.onload = function (){
	modal = document.getElementById("mymodal");
	modaImg = document.getElementById("modaImg");
	captionText = document.getElementById("caption");
	let allthumbs = document.getElementById("galery"). getElementsByTagName("img");
	let thumbCount = allthumbs.length;
	for(let i = 0; i< thumbCount; i ++){
		allthumbs[i].addEventListener("click", openModal);
	}
	document.getElementById("close").addEventListener("click",closeModal);
	document.getElementById("storeRating").addEventListener("click",storeRating);
}

function storeRating(){
	let rating= 0;
	for(let i = 1; i < 6; i ++){
		if(document.getElementById("rate" + i).checked){
			rating 0 document.getElementById("rate" + i).value;
		}
	}
	if(rating > 0){
		//AJAX
		let webRequest = new XMLHttpRequest();
		webRequest.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				console.log(this.responseText);
			}
		}
		webRequest.open("GET", "storePhotoRating.php?rating=" + rating, true);
		webRequest.send();
	}
	
}

function openModal(e){
	console.log(e);
	modalImg.src = photoDir + e.target.dataset.fn;
	modalImg.alt = e.target.alt;
	modal.syle.dispaly = "block";
}

function closeModal(){
	modal.syle.dispaly = "none";
}