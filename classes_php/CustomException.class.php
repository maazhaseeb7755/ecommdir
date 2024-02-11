<?php 
class customException extends Exception {
  public function errorMessage() {
    
    return $this->getMessage();
  }
}
?>
