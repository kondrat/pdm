<h3>To del</h3>
<?php debug($lala);?>

<?php
    

    
    
    // echo $treeHtml;
    
    
    function showTree($inputTree = array()){
        
        //$treeHtml = null;

        foreach ($inputTree as $k=>$v){

            $treeHtml .= '<ul><li>'.$v['Item']['name'].'</li>';

            if(isset ($v['Child'])){
                $treeHtml .= '<ul>';
                foreach ($v['Child'] as $k2=>$v2){
                    debug($v2);
                    $treeHtml .= '<li>'.$v2['Item']['name'].'</li>';
                    $treeHtml .= showTree($v2);
                }
                $treeHtml .= '</ul>';
            }

        }
        $treeHtml .= '</li></ul>'; 
        
        return $treeHtml;
        
    }
    
    echo showTree($lala);
    
?>