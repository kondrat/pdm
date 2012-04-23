<h3>To del</h3>
<?php //debug($lala);?>

<?php
    
    function muT($arr = array()){
        $toShow = '';
        
        foreach ($arr as $k=>$v){
            
            $toShow .= '<li class="item-treeNode"><span class="item">'.$v['Item']['name'];
            //debug($v);
            if(isset ($v['Child']) ){
                //foreach ($v['Child'] as $k2=>$v2){
                    //debug($v);
                    $toShow .= '<ul>';
                    //$toShow .= muT($v2['Child']);
                    $toShow .= muT($v['Child']);
                    $toShow .= '</ul>';
                //}
            }
            $toShow .= '</span></li>';
        }   
        return $toShow;
    }
    
    echo '<ul id="pdm-listItems">'.muT($lala).'</ul>';
?>