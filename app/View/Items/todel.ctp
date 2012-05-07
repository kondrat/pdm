<h3>To del</h3>
<?php //debug($lala);?>
<?php
//    $hoho = json_encode($lala);
//    echo $hoho;
?>



<?php
    
    function muT($arr = array(), $count = 0){
        $toShow = '';
        $count++;
        
        foreach ($arr as $k=>$v){
            
 
            if(isset ($v['Child']) ){

                    $toShow .= '<li class="item-treeNode"><span class="item hasChildNode">'.$v['Item']['name'].'</span>';
                    if($count >= 3){
                        $showClass = "hideMe";
                    }else{
                        $showClass = "showNode";
                    }
                    $toShow .= '<ul class="'.$showClass.'">';
                    $toShow .= muT($v['Child'],$count);
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