/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function(){
    
    var $item_Tray = $("#item-trayListAdd");

    
    $item_Tray.change(function(){
        
        $("#tem_to_change").css({"display":"block"});
        
        $("select").prop('disabled', false);

        
        var thisTray = $(this);
        
        $.ajax({
            dataType:"html",
            url: "\/items\/getAtaCode",
            type: "POST",
            data: {
                "data[ataId]":thisTray.val(),
                "data[prjId]":$("#ItemProject").val()
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

    //func_getItem(item_currentPrjId);

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


    /**
     * Item type suffix managent
     */
    
    var itemSuffixData = $("#item-suffixTip").data("itemsuffixs");
    var suffixVal = $("#item-ItemType").val();
    
    if(itemSuffixData != undefined){
        //console.log(traySuffixData);
        $.each(itemSuffixData,function(index){
            if(index == suffixVal){
                var siffixText = this+'';
                $("#titem-suffixTip").text(siffixText);
                return;
            }
        });
    
        $("#item-ItemType").change(function(){
            
            var thisVal = $(this).val();
            $.each(itemSuffixData,function(index){
            
                if(index == thisVal){
                    //alert(this);
                    var siffixText = this+'';
                    $("#item-suffixTip").text(siffixText);
                    return;
                }
            });       
        });
    }
    /*
     * tipsy code
     */
    $("#item-ataCodeTip, #item-drwNbrTip, #item-suffixTip, #item-issueTip, #item-pLetterTip, #item-resCodeTip").tipsy({
        live:true,
        gravity: 'n'
    });
//$("#item-test").tipsy();
});

