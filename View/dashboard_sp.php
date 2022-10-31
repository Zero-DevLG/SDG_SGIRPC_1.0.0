<?php
    session_start();
    include('../Model/Conexion.php');

    //Variables de session
    $id_dir_gen = $_SESSION["id_direccion"];

    //Se obtienen los datos
    
    //Se obtienen los documentos registrados a oficialia
    $sql = $pdo->prepare("SELECT COUNT(DISTINCT id_documento) FROM documento_instruccion WHERE direccion != 1 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
    $sql->execute();
    $cRegSPDir = $sql->fetchColumn();


    //Se obtienen los documentos de la titular registrados a oficialia
    $sql = $pdo->prepare("SELECT COUNT(DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 1 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
    $sql->execute();
    $cRegSPT = $sql->fetchColumn();

    $totalDocSP = $cRegSPDir + $cRegSPT;




    $sql = $pdo->prepare("SELECT COUNT(de.id_documento) FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE di.direccion = '$id_dir_gen'");
    $sql->execute();
    $cdir = $sql->fetchColumn();

    //Se obtienen los documentos en representacion 
    $sql = $pdo->prepare("SELECT COUNT(de.id_documento) FROM documentos_externos as de INNER JOIN doc_ext_res as res ON res.id_documento = de.id_documento WHERE res.id_direccion= '$id_dir_gen'");
    $sql->execute();
    $crep = $sql->fetchColumn();


    // Segundas estadisticas

        //Documentos totales recibidos para la dirección
        $sql = $pdo->prepare("SELECT COUNT(id_documento) FROM documento_instruccion WHERE direccion= '$id_dir_gen'");
        $sql->execute();
        $doc_rec_g = $sql->fetchColumn();

        // Documentos en representación
        $sql = $pdo->prepare("SELECT COUNT(di.id_documento) FROM documento_instruccion as di INNER JOIN doc_ext_res as res ON res.id_documento = di.id_documento WHERE res.id_direccion= '$id_dir_gen'");
        $sql->execute();
        $doc_rec_res = $sql->fetchColumn();    

        //Documentos en total
        $doc_total = $doc_rec_g + $doc_rec_res;

        $doc_rec_g_p = ($doc_rec_g * 100)/$doc_total;
        $doc_rec_res_p = ($doc_rec_res * 100)/$doc_total;

        //Documentos atendidos
        $sql = $pdo->prepare("SELECT COUNT(id_documento) FROM documentos_atendidos");
        $sql->execute();
        $doc_at_g = $sql->fetchColumn();

        //Documentos sin atender
        $doc_sat = $totalDocSP - $doc_at_g;

        //Documentos turnados
        $sql = $pdo->prepare("SELECT COUNT(DISTINCT id_documento) FROM documento_instruccion where fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
        $sql->execute();
        $doc_turn = $sql->fetchColumn();

        //Copias de conocimiento
        $sql = $pdo->prepare("SELECT COUNT(id_documento) FROM documentos_externos WHERE estatus = 402 ");
        $sql->execute();
        $ccT = $sql->fetchColumn();

        //Documentos DGAR
        $sql = $pdo->prepare("SELECT COUNT( DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 13 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31' ");
        $sql->execute();
        $doc_dgar = $sql->fetchColumn();

        //Documentos DGR
        $sql = $pdo->prepare("SELECT COUNT( DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 9 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
        $sql->execute();
        $doc_dgr = $sql->fetchColumn();

        //Documentos DEAF
        $sql = $pdo->prepare("SELECT COUNT( DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 15 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
        $sql->execute();
        $doc_deaf = $sql->fetchColumn();

        //Documentos DGTO
        $sql = $pdo->prepare("SELECT COUNT( DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 10 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
        $sql->execute();
        $doc_dgto = $sql->fetchColumn();

        //Documentos DGVCD
        $sql = $pdo->prepare("SELECT COUNT( DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 16 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
        $sql->execute();
        $doc_dgvcd = $sql->fetchColumn();

        //Documentos DEAJ
        $sql = $pdo->prepare("SELECT COUNT( DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 8 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
        $sql->execute();
        $doc_deaj = $sql->fetchColumn();

        //Documentos as
        $sql = $pdo->prepare("SELECT COUNT( DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 18 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
        $sql->execute();
        $doc_as = $sql->fetchColumn();

        //Documentos SPC
        $sql = $pdo->prepare("SELECT COUNT( DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 50 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
        $sql->execute();
        $doc_spc = $sql->fetchColumn();

        //Documentos DGRDC
        $sql = $pdo->prepare("SELECT COUNT( DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 51 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
        $sql->execute();
        $doc_dgrdc = $sql->fetchColumn();

        //Documentos SGIRPC
        $sql = $pdo->prepare("SELECT COUNT( DISTINCT id_documento) FROM documento_instruccion WHERE direccion = 1 AND fecha_instruccion BETWEEN '2022-01-01' AND '2022-12-31'");
        $sql->execute();
        $doc_sgirpc = $sql->fetchColumn();

?>
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/dashboard_sp.css?v=<?php echo (rand()); ?>">
    
    <!-- JS -->
    <script src="../js/plotly-latest.min.js"></script>
    <script src="../js/plotly-locale-es.js"></script>
</head>
<div id="data_dashboard">
    <div id="title_dashboard">
        <h5>Tablero de estadisticas</h5>
    </div>
    <hr class="hr_ds">
    <div id="ind">
        <h6>Los datos representados a continuación corresponden unicamento al año en curso.</h6>
    </div>
    <div id="report">
        <ul>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Generar reporte
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../Controller/getCsvDir.php">CSV Turnos Direcciones General</a>
                <a class="dropdown-item" href="../Controller/getCsvT.php">CSV Turnos Titular de la Secretaria</a>
                <a class="dropdown-item" href="../Controller/getCsvT_2021.php">CSV Turnos Titular de la Secretaria - 2021</a>
                <div class="dropdown-divider"></div>
                <!--<a class="dropdown-item" href="#">Something else here</a>-->
                </div>
            </li>
        </ul>
    </div>
    <div>
        <div id="graph_1">
            <img id="loading_graph" src="../img/loading2.gif" alt="">
        </div>
        <div id="stats">
            <div id="table_stats">
                <table class="table table-border table-striped table-sm">
                    <thead class="table-danger">
                        <th>Concepto</th>
                        <th>Cantidad</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Documentos recibidos para direcciones</td>
                            <td><input type="text" id="doc_g" value="<?php echo $cRegSPDir; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Documentos recibidos para titular</td>
                            <td><input type="text" id="doc_rep" value="<?php echo $cRegSPT; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Documentos recibidos totales</td>
                            <td><input type="text" id="doc_t" value="<?php echo $totalDocSP; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Copias de conocimiento</td>
                            <td><input type="text" id="doc_cc" value="<?php echo $ccT; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Documentos atendidos</td>
                            <td><input type="text" id="doc_at" value="<?php echo $doc_at_g; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Documentos sin atender</td>
                            <td><input type="text" id="doc_sat" value="<?php echo $doc_sat; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Documentos turnados</td>
                            <td><input type="text" id="doc_tr" value="<?php echo $doc_turn; ?>" disabled></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="graph_doc_reg"></div>
            <div id="graph_doc_stat">
            <div id="table_stats">      
            </div>
            </div>
            
        </div>
        <div id="stats_dir">
            <table id="table_dir_stat" class="table table-border table-striped table-sm">
                    <thead class="table-danger">
                        <th>Dirección</th>
                        <th>Documentos recibidos</th>
                        <th>Documentos atendidos</th>
                        <th>Documentos desfasados</th>
                    </thead>
                    <tbody>
                    <tr>
                            <td>SGIRPC</td>
                            <td><input type="text" id="doc_sgirpc" value="<?php echo $doc_sgirpc; ?>" disabled></td>
                            <td><?php echo "0"; ?></td>
                            <td><?php echo "0"; ?></td>
                        </tr>
                        <tr>
                            <td>DGAR</td>
                            <td><input type="text" id="doc_dgar" value="<?php echo $doc_dgar; ?>" disabled></td>
                            <td><?php echo "0"; ?></td>
                            <td><?php echo "0"; ?></td>
                        </tr>
                        <tr>
                            <td>DGVCD</td>
                            <td><input type="text" id="doc_dgvcd" value="<?php echo $doc_dgvcd; ?>" disabled></td>
                            <td><?php echo "0"; ?></td>
                            <td><?php echo "0"; ?></td>
                        </tr>
                        <tr>
                            <td>DEAF</td>
                            <td><input type="text" id="doc_deaf" value="<?php echo $doc_deaf; ?>" disabled></td>
                            <td><?php echo "0"; ?></td>
                            <td><?php echo "0"; ?></td>
                        </tr>
                        <tr>
                            <td>DGTO</td>
                            <td><input type="text" id="doc_dgto" value="<?php echo $doc_dgto; ?>" disabled></td>
                            <td><?php echo "0"; ?></td>
                            <td><?php echo "0"; ?></td>
                        </tr>
                        <tr>
                            <td>DGR</td>
                            <td><input type="text" id="doc_dgr" value="<?php echo $doc_dgr; ?>" disabled></td>
                            <td><?php echo "0"; ?></td>
                            <td><?php echo "0"; ?></td>
                        </tr>
                        <tr>
                            <td>DEAJ</td>
                            <td><input type="text" id="doc_deaj" value="<?php echo $doc_deaj; ?>" disabled></td>
                            <td><?php echo "0"; ?></td>
                            <td><?php echo "0"; ?></td>
                        </tr>
                        <tr>
                            <td>SPC</td>
                            <td><input type="text" id="doc_spc" value="<?php echo $doc_spc; ?>" disabled></td>
                            <td><?php echo "0"; ?></td>
                            <td><?php echo "0"; ?></td>
                        </tr>
                        <tr>
                            <td>AS</td>
                            <td><input type="text" id="doc_as" value="<?php echo $doc_as; ?>" disabled></td>
                            <td><?php echo "0"; ?></td>
                            <td><?php echo "0"; ?></td>
                        </tr>
                    </tbody>
            </table>
             <div id="graph_doc_dir_stat"></div>
        </div>
    </div>
</div>




<script>
function ObtenerJson(json) {
    //json = JSON.stringify(json)
    var parsed = JSON.parse(json, 0, 1, 2);
    var arr = [];
    for (var x in parsed) {
        arr.push(parsed[x]);
    }
    return arr;
    //console.log(arr);
}

function get_data_paint() {
    console.log('Obteninedo grafica');
                let active = 1
                $.ajax({
                    type: 'POST',
                    url: '../Controller/getDataGraphsSP.php',
                    success: function(res) {
                        console.log('RES');
                        console.log(res);
                    // console.log(JSON.stringify(res[1]));
                        /*datosX = crearCadenaLineal(json);
                        datosY = crearCadenaLineal(r);
                        datosY2 = crearCadenaLineal(f);
                        */
                        data = ObtenerJson(res);
                        datosX = data[0];
                        datosY = data[1];
                        datosY2 = data[2];
                        datosY_trace3 = data[3];
                        datosY_trace4 = data[4];
                        //console.log(datosX)
                        //console.log(data);
                        //console.log(datosY);
                        //console.log(data[0]);
                        //datosY = crearCadenaLineal(res2);
                    

                        var trace1 = {
                            x: datosX,
                            y: datosY,
                            type: 'scatter',
                            line:
                            {
                                color: '#55C5EE'
                            },
                            name: 'Documentos registrados'
                        }

                        var trace2 = {
                            x: datosX,
                            y: datosY2,
                            type: 'scatter',
                            line: {
                                color: '#f6c14f'
                            },
                            name: 'Documentos turnados'
                        };

                        var trace3 = {
                            x: datosX,
                            y: datosY_trace3,
                            type: 'scatter',
                            line: {
                                color: '#34f01a'
                            },
                            name: 'Documentos atendidos'
                        };
                        var trace4 = {
                            x: datosX,
                            y: datosY_trace4,
                            type: 'scatter',
                            line: {
                                color: '#e04914'
                            },
                            name: 'Documentos con fecha limite vencida'
                        };


                        var data = [ trace1, trace2, trace3, trace4];


                        var layout = {
                            title: 'Documentos Registrados / Documentos Turnados',
                            showlegend: true
                        };



                        $('#graph_1').empty();

                        Plotly.newPlot('graph_1', data, layout, {
                            displayModeBar: false
                        }, {
                            locale: 'es'
                        });

                    },
                });
}



function get_graph_2()
{
    var doc_g = $('#doc_g').val();
    var doc_rep = $('#doc_rep').val();

    var data = [{

        values: [doc_g, doc_rep],

        labels: ['Documentos direcciones', 'Documentos titular'],

        type: 'pie'

        }];


        var layout = {

        height: 400,

        width: 600

        };


    Plotly.newPlot('graph_doc_reg', data, layout, {
                        displayModeBar: false
                        }, {
                            locale: 'es'});

}

function get_graph_3()
{
    var doc_at = $('#doc_at').val();
    var doc_sat = $('#doc_sat').val();
    var doc_tr = $('#doc_tr').val();

    var data = [{

        values: [doc_at, doc_sat,doc_tr],

        labels: ['Documentos atendidos', 'Documentos sin atender','Documentos turnados'],

        type: 'pie'

        }];


        var layout = {

        height: 400,

        width: 600

        };


    Plotly.newPlot('graph_doc_stat', data, layout, {
                        displayModeBar: false
                        }, {
                            locale: 'es'});

}

function get_graph_4()
{
    var doc_dgar = $('#doc_dgar').val();
    var doc_deaf = $('#doc_deaf').val();
    var doc_dgr = $('#doc_dgr').val();
    var doc_deaj = $('#doc_deaj').val();
    var doc_sgirpc = $('#doc_sgirpc').val();
    var doc_as = $('#doc_as').val();
    var doc_deaf = $('#doc_spc').val();
    var doc_dgvcd = $('#doc_dgvcd').val();
    var doc_dgrdc = $('#doc_dgrdc').val();

    var data = [{

        values: [ doc_dgar, doc_deaf,doc_dgr,doc_deaj,doc_sgirpc,doc_as,doc_dgvcd,doc_dgrdc],

        labels: ['DGAR', 'DEAF','DRG','DEAJ','SGIRPC','AS','DGVCD','DGRDC'],

        type: 'pie'

        }];


        var layout = {

        height: 400,

        width: 600

        };


    Plotly.newPlot('graph_doc_dir_stat', data, layout, {
                        displayModeBar: false
                        }, {
                            locale: 'es'});

}

    $(document).ready(()=>{
        console.log('init');
        get_data_paint();
        get_graph_2();
        get_graph_3();
        get_graph_4();




    });


</script>