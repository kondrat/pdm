<h3>To del</h3>
<?php //debug($lala);?>
<?php
//    $hoho = json_encode($lala);
//    echo $hoho;

    function muT2($arr = array()){
        $toShow = '';
        
        foreach ($arr as $k=>$v){
            
            $toShow .= '<li ><a href="some data">'.$v['Item']['name'].'</a>';
            
            if(isset ($v['Child']) ){

                                   
                    $toShow .= '<ul>';
                    $toShow .= muT2($v['Child']);
                    $toShow .= '</ul>';

            } 
            $toShow .= '</li>';
        }   
        return $toShow;
    }

?>

<div id="demo1">
    <?php echo muT2($lala);?>
</div>


<?php
    
    function muT($arr = array()){
        $toShow = '';
        
        foreach ($arr as $k=>$v){
            
 
            if(isset ($v['Child']) ){

                    $toShow .= '<li class="item-treeNode"><span class="item hasChildNode">'.$v['Item']['name'].'</span>';               
                    $toShow .= '<ul>';
                    $toShow .= muT($v['Child']);
                    $toShow .= '</ul>';

            } else {
                $toShow .= '<li class="item-treeNode"><span class="item">'.$v['Item']['name'].'</span>';
            }
            $toShow .= '</li>';
        }   
        return $toShow;
    }
    
    
?>
<div><?php echo '<ul id="pdm-listItems">'.muT($lala).'</ul>';?></div>