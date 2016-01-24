/**
 * Created by maksim on 24.01.16.
 */
'use strict';
jQuery(function($){
    $("#currency-billing_id").on("change", function(){
        var drop_down_base = $("#currency-billing_id");
        var billing_id = drop_down_base.val();
        var billing_name = drop_down_base.find( "option:selected").text();
        var data1 = '';
        var select_base = $('#rate-from_currency_id');
        $.post( "rate/get-currencies", { "billing_id": billing_id }, function( data ){

            select_base.empty();
            var options = select_base.prop('options');
            $.each(data, function(val, text) {
                options[options.length] = new Option( billing_name + ' - ' + text, val );
            });
        } );

    });
});