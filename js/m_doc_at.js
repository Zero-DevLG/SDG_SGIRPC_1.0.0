$(document).ready(()=>
{

    $('body').on('click','.lista-dir p',function(){
        
        var dir = $(this).attr('id');
        $.ajax({
            type:       'POST',
            url:        '../View/documentos-atendidos-sp.php',
            data:       {'id_dir':dir },
            success:    function(e)
            {
                $('#data-load-at').empty();
                $('#data-load-at').html(e);
            }
        });
    });

});