/**
 * Created by maksim on 24.01.16.
 */
'use strict';
jQuery(function($){
    var drop_down_from = $("#from_billing");
    var drop_down_to = $("#to_billing");
    var select_from = $('#from_currency');
    var select_to = $('#to_currency');

    drop_down_from.on("change", function(){
        var billing_id = drop_down_from.val();
        var billing_name = drop_down_from.find( "option:selected").text();

        $.post( "rate/get-currencies", { "billing_id": billing_id }, function( data ){
            select_from.empty();
            var options = select_from.prop('options');

            $.each(data, function(val, text) {
                options[options.length] = new Option( billing_name + ' - ' + text, val );
            });
        } );
    });

    drop_down_to.on("change", function(){
        var billing_id = drop_down_to.val();
        var billing_name = drop_down_to.find( "option:selected").text();

        $.post( "rate/get-currencies", { "billing_id": billing_id }, function( data ){
            select_to.empty();
            var options = select_to.prop('options');

            $.each(data, function(val, text) {
                options[options.length] = new Option( billing_name + ' - ' + text, val );
            });
        } );
    });
});