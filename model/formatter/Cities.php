<?php

require $_SERVER['DOCUMENT_ROOT'].'\world\model\formatter\AdditionalTd.php';


class Cities implements AdditionalTd {
    private $tdCount;
    private $row;
    
    public function setRow($row) {
        $this->row = $row;
    }

    public function getTdCount() {
        return $this->tdCount;
    }
            
    function __construct($tdCount) {
        $this->tdCount = $tdCount;
    }

    public function addHeaderTd($tdCount) {
        $tdCount= $this->tdCount;
        $output="";
        for($i=0;$i<$tdCount;$i++){
            $output.="<td>".'Icon'."</td>";
        }
        return $output;
    }

    public function addTd($tdCount) {
        $tdCount= $this->tdCount;
        $output="";
        for($i=0;$i<$tdCount;$i++){
            if($this->row['Population']<=100000){
                $output.="<td class=town></td>";
            }
            else if(100000<$this->row['Population']&&$this->row['Population']<=1000000){
                $output.="<td class=city></td>";
            }
            else{
                $output.="<td class=bigCity></td>";
            }
        }
        return $output;
    }

}
