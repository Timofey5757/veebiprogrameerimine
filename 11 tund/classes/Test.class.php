<?php
  class Test {
	  //muutujad ehk property
	  private $privateNumber;
	  public $publicNumber;
	  //funktsioonid ehk method
	  //construktor see on funktsioon, mis kaivitub uks kord, klassi kasutusele votmisel
	  function __construct($sentNumber){
		  $this->privateNumber = 72;
		  $this->publicNumber = $sentNumber;
		  echo "Salajase ja avaliku arvu korrutis on. " . $this->privateNumber * $this->publicNumber;
		  $this->tellSecret();
	  }
	  //destructor lopetab oma tegevust
	  function __destruct(){
		  echo "Klass lopetas tegevuse! "
		
	  }
	  
	  private function tellSecret() {
		  echo "salajane number on: " .$this->privateNumber;
		  
	  }
	  
	  public function tellPublicSecret(){
		  echo "on toesti: " .$this->privateNumber;
		  
	  }
	  
  }//class lopeb