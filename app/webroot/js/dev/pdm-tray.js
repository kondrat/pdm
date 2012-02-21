/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function(){
    // ATA suffix managent
    var traySuffixData = $("#tray-suffix").data("itemsuffixs");
    var suffixVal = $("#TrayItemType").val();
    
    if(traySuffixData != undefined){
        //console.log(traySuffixData);
        $.each(traySuffixData,function(index){
            if(index == suffixVal){
                var siffixText = this+'';
                $("#tray-suffix").text(siffixText);
                return;
            }
        });
    
        $("#TrayItemType").change(function(){
            var thisVal = $(this).val();
            $.each(traySuffixData,function(index){
            
                if(index == thisVal){
                    //alert(this);
                    var siffixText = this+'';
                    $("#tray-suffix").text(siffixText);
                    return;
                }
            });       
        });
    }
    
    
});

