/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function(){
    var itemTray = $("#ItemTray");
    
    itemTray.change(function(){
        var thisTray = $(this);
        alert(thisTray.val());
    });
});

