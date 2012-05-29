<h3>To del</h3>
<?php //debug($itmesInTree);?>
<?php
//    $hoho = json_encode($itmesInTree);
//    echo $hoho;
?>



<?php
    
    function makeGoodTree($arr = array(), $count = 0){
        $toShow = '';
        $count++;
        
        foreach ($arr as $k=>$v){
            
            $itemData = $v['Item']['name'].' - '.$v['Item']['drwnbr'];
 
            if(isset ($v['Child']) ){

                    $toShow .= '<li class="item-treeNode"><span class="item hasChildNode">'.$itemData.'</span>';
                    if($count >= 3){
                        $showClass = "hideMe";
                    }else{
                        $showClass = "showNode";
                    }
                    $toShow .= '<ul class="'.$showClass.'">';
                    $toShow .= makeGoodTree($v['Child'],$count);
                    $toShow .= '</ul>';

            } else {
                $toShow .= '<li class="item-treeNode"><span class="item">'.$itemData.'</span>';
            }
            $toShow .= '</li>';
        }   
        return $toShow;
    }
    
    
?>
<div><?php echo '<ul id="pdm-listItems">'.makeGoodTree($itmesInTree).'</ul>';?></div>