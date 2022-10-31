function getHeight()
{
    var h = 0;
    h = $(window).height() + 15;
    $('.sidebar-p').css('height',h);
}


$(document).ready(()=>{
    
    // SIDEBARP



    $('#option-be').click(()=>{
        $.ajax({
            type:   'POST',
            url:    '../View/view-add-doc.php',
            data:   '',
            success:    function(e)
            {
               
                $('#data-content').empty();
                $('#data-content').html(e);
            }
        });
    });

    $('#option-t').click(()=>{
        $.ajax({
            type:   'POST',
            url:    '../View/dashboard_sp.php',
            data:   '',
            success:    function(e)
            {
                
                $('#data-content').empty();
                $('#data-content').html(e);
            }
        });
    });

    $('#option-at').click(()=>{
        $.ajax({
            type:   'POST',
            url:    '../View/doc_at_sp.php',
            data:   '',
            success:    function(e)
            {
              
                $('#data-content').empty();
                $('#data-content').html(e);
            }
        });
    })

   





    getHeight();

    $('.sidebar-p').hover(()=>{
        $('.sidebar-p').css('width','250px');
        // $('.img-side').hide();
        $('.title-option').show(300);
    },()=>
    {
        $('.title-option').hide();
        $('.sidebar-p').css('width','40px');
        // $('.img-side').show();
    });

    //END
});