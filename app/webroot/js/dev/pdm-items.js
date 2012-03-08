/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function(){
    var itemTray = $("#item-trayListAdd");
    
    itemTray.change(function(){
        
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
    

    
    
    /*
     * tipsy code
     */
    $("#item-ataCodeTip, #item-drwNbrTip, #item-suffixTip, #item-issueTip").tipsy({
        live:true,
        gravity: 's'
    });
//$("#item-test").tipsy();
});

