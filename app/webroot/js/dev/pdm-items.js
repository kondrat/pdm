/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function(){
    
    var $item_Tray = $("#item-trayListAdd");


    if(!$("#tem_to_change").hasClass("formAnb") && !$("#tem_to_change").hasClass("item-formDis")){
        $("#tem_to_change").find("select,input").prop('disabled', false);
    } 

    $item_Tray.change(function(){
        
        var mm = null;
        
        
        
        $("#item-itemResp").val('mm');

        
        var thisTray = $(this);
        if(thisTray.val() != ''){
            //if we selected tray, not "choose tray" - we display fields
            //$("#tem_to_change").css({"display":"block"});
            $("#tem_to_change").removeClass("item-formDis");
            $.ajax({
                dataType:"html",
                url: "\/items\/getAtaCode",
                type: "POST",
                data: {
                    "data[ataId]":thisTray.val(),
                    "data[prjId]":$("#ItemProject").val(),
                    "data[prjLet]":$("#ItemPletter").val(),
                    "data[prjRes]":$("#ItemResponscode").val()
                },
                success:function (data) {               
                    //console.log(data)

                    if(data) {

                        $("#item-upperAssyWrp").empty().append(data);

                        mm = $("#item-upperAssyList").data("at");

                        $("#item-ataCodeTip").text(mm.ataCache);   
                        $("#item-ataCode").val(mm.ataCache);
                        if(mm.form == 1){
                            $("#tem_to_change").find("select,input").prop('disabled', false);

                        } else {

                            $("#tem_to_change").find("select,input").prop('disabled', true);
                        }

                        $("#item-drwNbrTip").val(mm.nbr);
                        $("#ItemName").val("");


                    }

                },

                error:function(){
                    alert('Problem with the server. Try again later.');

                }
            });
        } else {
            $("#tem_to_change").addClass("item-formDis");
            $("#tem_to_change").find("select,input").prop('disabled', true);
        }
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
        gravity: 's'
    });
//$("#item-test").tipsy();
});

