function mostrarTabla_t() {

    var id_dir = $('#id_dir').val();

    table_t = $('#table-at-dir').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax: {
            "type":"POST",
            "url":"../helpers/getDataAtSp.php",
            "data":id_dir
            // error: function(){
            //      $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
            // }
        
        },
        
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "op_control"
            },
            {
                "data": "oficio"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_recibido"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "bis",
                "visible": false
            }

        ],
        rowCallback: function(row, data) {



            
            if (data['bis'] == 1) {
                $($(row).find("td")[1]).css("color", "blue");
                $($(row).find("td")[2]).css("color", "blue");
                $($(row).find("td")[3]).css("color", "blue");
                $($(row).find("td")[4]).css("color", "blue");
                $($(row).find("td")[5]).css("color", "blue");
                $($(row).find("td")[6]).css("color", "blue");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "blue");

            }

      


        }


    });


    // it_t = setInterval(function() {
    //     table_t.api().ajax.reload(function() {
    //         $(".paginate_button > a").on("focus", function() {
    //             $(this).blur();
    //         });
    //     }, false);
    // }, 10000);

}






$(document).ready(()=>{

});