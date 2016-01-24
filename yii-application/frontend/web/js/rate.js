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

function getRate( obj ){
    console.log( $(obj).attr('id') + " selected: " + $(obj).val() );
    var from_currency_id = $('#from_currency').val();
    var to_currency_id = $('#to_currency').val();
    console.log( "selected pare: " + from_currency_id + ' to ' + to_currency_id );

    if( from_currency_id && to_currency_id ){
        $.post( 'rate/get-rate', { 'from_currency_id': from_currency_id, 'to_currency_id': to_currency_id },
            function( data ){
                if( data ){
                    console.log( 'Ответ сервера: ');
                    console.log( data.result );
                    //console.log( data.rate.from_amount );
                    //console.log( data.rate.to_amount );

                    if( data.result == 'success' ){
                        $("#result-rate").text( data.rate.from_amount + ' : ' + data.rate.to_amount );
                        $("#result-response").text( '' );
                    }else{
                        $("#result-response").text( data.result );
                        $("#result-rate").text( '' );
                    }
                }else{
                    console.log( 'Ответ сервера пустой, наверное не выбрана вторая валюта' )
                }
            }
        );
    }


}