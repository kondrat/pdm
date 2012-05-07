/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function(){
    
    var $item_Tray = $("#item-trayListAdd");
    
    $item_Tray.change(function(){
        
        var thisTray = $(this);
        
        $.ajax({
            dataType:"html",
            url: "\/items\/getAtaCode",
            type: "POST",
            data: {
                "data[ataId]":thisTray.val()       
            },
            success:function (data) {               
                //console.log(data)
                if(data) {
                    
                    $("#tem").empty().append(data);
                    
                    // Countablel plugin code                   
                    $("#item-drwNbrTip").simplyCountable({
                        counter: '#item-drwNbrCounter',
                        maxCount: 5,
                        strictMax: false,
                        overClass: 'item-drwNbrTipOver'
                    });
                    
                }
                
            },
                    
            error:function(){
                alert('Problem with the server. Try again later.');
                 
            }
        });
    });
    


    var $item_Prj = $("#item-currentPrj");
    var item_currentPrjId = $item_Prj.val();
    /*
     * to chage items for selected project
     */
    
    var func_getItem = function(max){

        var $thisPrj = max;
        $.ajax({
            dataType:"html",
            url: "\/items\/getItemsForPrj",
            type: "POST",
            data: {
                "data[prjId]":$thisPrj       
            },
            success:function (data) {               
                //console.log(data)
                if(data) {

                    
            }
                
            },
                    
            error:function(){
                alert('Problem with the server. Try again later.');
                 
            }
        });;
    }

    func_getItem(item_currentPrjId);

    $item_Prj.change(function(){
        $thisCurrentPrjId = $(this).val();
        func_getItem($thisCurrentPrjId);
    })




    /**
     *tree game
     */

    
    $("span.item").click(function(e){
        var clicked = jQuery(e.target);
        console.log(clicked);
        var el = clicked.next("ul:first");
        if(el.hasClass("hideMe")){
            el.removeClass("hideMe");
        } else {
            el.addClass("hideMe");
        }
    });
    
    /*
     * tipsy code
     */
    $("#item-ataCodeTip, #item-drwNbrTip, #item-suffixTip, #item-issueTip").tipsy({
        live:true,
        gravity: 's'
    });
//$("#item-test").tipsy();
});

