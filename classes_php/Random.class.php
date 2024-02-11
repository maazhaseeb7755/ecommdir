<?php 
class Random { 
private $token; 
private $id; 

public function getToken() 
{ 
$this->token = md5(uniqid(rand(), TRUE)); 
return $this->token; 
}

 public function random_code($limit)
{
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}
public function randLetter()
{
    $int = rand(0,25);
    $a_z = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $rand_letter = $a_z[$int];
    return $rand_letter;
}

public function getCaptcha()
{
$r=$this->random_code(4);
$lt= $this->randLetter();
$c=$lt.$r;
$lt2= $this->randLetter();
$r2=$this->random_code(2);
$c2=$c.$lt2.$r2;
return $c2;
}

}

?>
