<meta charset="utf-8">
<?php

abstract class Inheritance{
    
      private $inheritances = array();
      

    public function __call($method, array $arguments = array()) {

        foreach ($this->inheritances as $inheritance) {
            $inheritance->invoke($method, $arguments);
        }


    }
 
    public function invoke($method, $arguments) {
        if (is_callable(array($this, $method))) {
            return call_user_func_array(array($this, $method), $arguments);
        }
    }
 
    protected function addInheritance(Inheritance $inheritance) {
        $this->inheritances[get_class($inheritance)] = $inheritance;
    }
    
}



// 1-й базовый класс
class Mother extends Inheritance {
 
    public function eyes() {
        echo "<br/>у меня мамины глаза";
    }
 
    public function nose() {
        echo "<br/>нос";
    }
 
    protected function ear() {
        echo "<br/>и уши";
    }
}
 
// 2-й базовый класс
class Father extends Inheritance {
    protected function biceps() {
        echo "<br/>Зато от папы бицепс";
    }
 
    protected function strike() {
        echo "<br/>и удар с правой!";
    }
}

class Son extends Inheritance{
    public function __construct() {
        $this->addInheritance(new Mother);
        $this->addInheritance(new Father);
        

        
    }
    
    
    

    
}


$son = new Son;
$son->eyes();
$son->nose();
$son->ear();
$son->biceps();
$son->strike();



class A {
    
    protected function __construct(){
       echo "jgkjhkhkj";
       
    }
    
    function Methods(){
        method();
        sda();
    }
    


}

class B extends A{

   function __construct(){
       parent::__construct();
   }
   
   function Method($b){
       $b=0;
       $b = $b + 1;
   }
   
   function sda($a){
       $a=1;
       $a= $a + 1;
       $a = $a + 2;
   }
   
}

$a = new B();
echo $a;
 
$b = new B();
echo $b;






?>