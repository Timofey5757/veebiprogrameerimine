<?php
  class Picupload {
	  private $imageFileType;
	  private $tempPic;
	  private $myTempImage;
	  private $myNewImage;
	  
	  function __construct($tempPic], $imageFileType) {
			$this->imageFileType = $imageFileType;
			$this->tempPic = $tempPic;
			$this->createImageFromFile;
		}//constructor lõppeb
		
		function __construct($tempName, $imageFileType){
			imagedestroy($this->myTempImage);
		}
		
		
		private function createImageFromFile() {
			//loome ajutise "pildiobjekti" - image
			if($this->imageFileType == "jpg" or $this->imageFileType == "jpeg"){
				$this->myTempImage = imagecreatefromjpeg($this->tempName);
			}
			if($this->imageFileType == "png"){
				$this->myTempImage = imagecreatefrompng($this->tempName);
			}
			if($this->imageFileType == "gif"){
				$this->myTempImage = imagecreatefromgif($this->tempName);
			}
		}
	}//createImageFromFile lõppeb
		
		public function resizeImage($maxPicW, $maxPicH){
			//pildi originaalmõõt
			$imageW = imagesx($this->myTempImage);
			$imageH = imagesy($this->myTempImage);
			//kui on liiga suur
			if($imageW > $maxPicW or $imageH > $maxPicH){
				//muudame suurust
				if($imageW / $maxPicW > $imageH / $maxPicH){
					$picSizeRatio = $imageW / $maxPicW;
				} else {
					$picSizeRatio = $imageH / $maxPicH;
				}
				//loome uue "pildiobjekti" juba uute mõõtudega
				$newW = round($imageW / $picSizeRatio, 0);
				$newH = round($imageH / $picSizeRatio, 0);
				$this->myNewImage = $this->setPicSize($this->myTempImage, $imageW, $imageH, $newW, $newH);
				
			}//resizeImage lõppeb
			
			public functions addWatermaark($wmFile){
				$waterMark = imagecreatefrompng($wmFile);
				$waterMarkW = imagesx(waterMark);
				$waterMarkH = imagesy(waterMark);
				$waterMarkX = imagesx($this->myNewImage) - $waterMarkW - 10;
				$waterMarkY = imagesy($this->myNewImage) - $waterMarkH - 10;
				imagecopy($this->myNewImage, $waterMark, $waterMarkX, $waterMarkY, 0, 0, $waterMarkW, $waterMarkH);
			}//addWatermaark loppeb
			
		}//resizeImage lõppeb

	private function setPicSize($myTempImage, $imageW, $imageH, $imageNewW, $imageNewH){
		$myNewImage = imagecreatetruecolor($imageNewW, $imageNewH);
		imagecopyresampled($myNewImage, $myTempImage, 0, 0, 0, 0, $imageNewW, $imageNewH, $imageW, $imageH);
		return $myNewImage;
	}//setPicSize loppeb
	
	public function savePicFile(fileName){
		$notice = null;
			//salvestan vähendatud pildi faili
			if($this->imageFileType == "jpg" or $this->imageFileType == "jpeg"){
				if(imagejpeg($this->myNewImage, $fileName, 90)){
					$notice = "Vähendatud pildi salvestamine õnnestus! ";
				} else {
					$notice = "Vähendatud pildi salvestamine ebaõnnestus! ";
				}
			}
			if($this->imageFileType == "png"){
				if(imagepng($this->myNewImage, $fileName, 6)){
					$notice = "Vähendatud pildi salvestamine õnnestus! ";
				} else {
					$notice = "Vähendatud pildi salvestamine ebaõnnestus! ";
				}
			}
			if($this->imageFileType == "gif"){
				if(imagegif($this->myNewImage, $fileName)){
					$notice = "Vähendatud pildi salvestamine õnnestus! ";
				} else {
					$notice = "Vähendatud pildi salvestamine ebaõnnestus! ";
				}
			}
			imagedestroy($this->myNewImage);
			return $notice;
		}//savePicFile lõppeb
	}//class lopeb
		
		
		