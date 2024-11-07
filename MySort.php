<?php
class MySort{
    
    private $num_array = array();
    private $count_array = 0;
    
    public function __construct($nos){
        $this->num_array = $nos;
        $this->count_array = count($nos);
    }
    
    public function sortAsc(){

        for ($i = 0 ; $i < $this->count_array - 1; $i++)
        {
            for ($j = 0 ; $j < $this->count_array - $i - 1; $j++)
            {
                if ($this->num_array[$j] > $this->num_array[$j+1])
                {
                    $temp = $this->num_array[$j];
                    $this->num_array[$j] = $this->num_array[$j+1];
                    $this->num_array[$j+1] = $temp;
                }
            }
        }
        
        return $this->num_array;
    }
    
    public function sortDesc(){

        for ($i = 0 ; $i < $this->count_array - 1; $i++)
        {
            for ($j = 0 ; $j < $this->count_array - $i - 1; $j++)
            {
                if ($this->num_array[$j] < $this->num_array[$j+1])
                {
                    $temp = $this->num_array[$j];
                    $this->num_array[$j] = $this->num_array[$j+1];
                    $this->num_array[$j+1] = $temp;
                }
            }
        }
        
        return $this->num_array;
    }
}

$userinput = array();
askagain:
$no_of_elements = readline("No of elements needed: ");
if($no_of_elements > 1) {
    for($i=0; $i<$no_of_elements; $i++){
        $userinput[$i] = readline("Element ".$i.": ");
    }
}
else{
    goto askagain;
}

// $userinput = array(9,2,5,1,7,4,8);
$mysort = new MySort($userinput);

startover:
$choice = readline("Enter your choice (asc or desc): ");
switch($choice){
    case 'asc':
        $asc = $mysort->sortAsc();
        print_r($asc);
        break;
    case 'desc':
        $desc = $mysort->sortDesc();
        print_r($desc);
        break;
    default:
        echo "Invalid choice".PHP_EOL; 
        goto startover;
        break;
}
?>