    <?php
   
    include("../Model/Consultas.php");
    //include("../View/side_var_user.php");

    ?>



<link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css?v=<?php echo (rand()); ?>">
<link rel="stylesheet" href="../css/dropzone.css" />
<!-- SCRIPTS -->
<script src="../js/doc.js?v=<?php echo (rand()); ?>"></script>
<script src="../js/control_tables.js?v=<?php echo (rand()); ?>"></script>
<script src="../js/tables.js?v=<?php echo (rand()); ?>"></script>
<script src="../js/dropzone.js"></script>
<div id="contenido_dinamico">
        <div id="iframeI" style="overflow-y: auto;">
            <div id="contenido">
                <ul class='nav nav-tabs' id="tabs_documentos">

                    <li><a data-toggle="tab" id="loadGen" href="#menu_g">Generados</a></li>
                    
                    <?php if($_SESSION['tipo_rol'] == 1){ ?>
                    <li><a data-toggle="tab" id="loadAss" href="#menu_as">Asignados</a></li>

                    <li><a data-toggle="tab" id="loadAt" href="#menu_at">Atendidos</a></li>
                    <li><a data-toggle="tab" id="loadIns" href="#menu_ins" style="display: none;">Bienvenida</a></li>
                    <?php } ?>
                </ul>
                <div class="tab-content">

                    <div id="menu_at" class="tab-pane fade in">
                        <ul class='nav nav-tabs' id="tabs_documentos2">
                                <li><a data-toggle="tab" id="loadAreasRes" href="#menu_aR">Areas</a></li>
                                <li><a data-toggle="tab" id="loadTitularRes" href="#menu_tR">Titular</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="menu_aR" class="tab-pane fade in active">
                                   <div id="secc_ares">
                                        <table id="table_ares">
                                            <thead>
                                                <th>id</th>
                                                <th>folio</th>
                                                <th>Asunto</th>
                                                <th>Folio respuesta</th>
                                                <th>Numero oficialia</th>
                                                <th>Fecha de respuesta</th>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                   </div>

                            </div>

                            <div id="menu_tR" class="tab-pane fade in">
                                   <div id="secc_tres">
                                        <table id="table_tres">
                                                <thead>
                                                    <th>id</th>
                                                    <th>folio</th>
                                                    <th>Oficialia</th>
                                                    <th>Folio respuesta</th>
                                                    <th>Fecha respuesta</th>
                                                    <th>Asunto</th>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                        </table>
                                   </div>

                            </div>
                        
                        </div>


                    </div>
                    <div id="menu_ins" class="tab-pane fade in active">
                        <img src="../img/welcome.jpg" alt="">
                    </div>
                    <div id="menu_g" class="tab-pane fade in">


                        <ul class='nav nav-tabs' id="tabs_documentos2">
                            <li><a data-toggle="tab" id="loadAreas" href="#menu_a">Areas</a></li>
                            <li><a data-toggle="tab" id="loadTitular" href="#menu_t">Titular</a></li>
                            <li><a data-toggle="tab" id="loadCopias" href="#menu_cc">Copias de conocimiento</a></li>
                            <li><a data-toggle="tab" id="loadac" href="#menu_ac">DGRDC</a></li>
                            <li><a data-toggle="tab" href="#opc" style="display: none;">selecciona una opcion</a></li>

                        </ul>

                        <div class="tab-content">
                            <div id="opc" class="tab-pane fade in active">
                                <div id="sel_opc">
                                    <img src="../img/opc_font.jpg" alt="">
                                </div>

                            </div>

                            <div id="menu_ac" class="tab-pane fade in">
                                <div id="doc_ext1">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-g-ac" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <table id="example_ac" style="cursor:pointer;"
                                        class="table table-sm table-borderedless table-hover">
                                        <thead>
                                            <tr>
                                               
                                                <th>id</th>
                                                <th>Direccion</th>
                                                <th>op_control</th>
                                                <th>N.Oficio</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha recepcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                            </div>



                            <div id="menu_a" class="tab-pane fade in">
                                <div id="doc_ext1">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-g-a" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <table id="example" style="cursor:pointer;"
                                        class="table table-sm table-borderedless table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Direccion</th>
                                                <th>op_control</th>
                                                <th>N.Oficio</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha recepcion</th>
                                                <th>estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div id="menu_t" class="tab-pane fade in">
                                <div id="doc_ext1">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-g-t" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <table id="example_titular" style="cursor:pointer;"
                                        class="table table-sm table-borderedless table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>op_control</th>
                                                <th>N.Oficio</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha recepcion</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div id="menu_cc" class="tab-pane fade in">
                                <div id="doc_ext">
                                    <table id="example_cc" style="cursor:pointer;"
                                        class="table table-sm table-borderedless table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Direccion</th>
                                                <th>op_control</th>
                                                <th>N.Oficio</th>
                                                <th>Fecha registro</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha recepcion</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="menu_as" class="tab-pane fade">
                        <ul class='nav nav-tabs' id="tabs_documentos3">
                            <li><a data-toggle="tab" id="loadtt" href="#menu_ti">Turnos titular</a></li>
                            <li><a data-toggle="tab" id="loadat" href="#menu_ar">Turnos areas</a></li>
                            <li><a data-toggle="tab" id="loadac_t" href="#menu_ac_t">Turnos DGRDC</a></li>
                            <li><a data-toggle="tab" id="loadac_2021" href="#menu_2021">Turnos titular 2021</a></li>
                            <li><a data-toggle="tab" id="loadac_2021" href="#menu_2021_a">Turnos Areas 2021</a></li>

                            <li><a data-toggle="tab" href="#opc " style="display: none;">selecciona una opcion</a></li>
                        </ul>

                        <div id="doc_ext">


                            <div class="tab-content">

                                <div id="menu_2021_a"  class="tab-pane fade in">
                                    <table id="turnos_2021_a" style="cursor:pointer;"
                                            class="table  table-sm table-borderedless table-hover">
                                            <thead>
                                            <th id="id_table_doc">Id</th>
                                                <th>Folio</th>
                                                <th>N.Oficio</th>
                                                <th>Asunto</th>
                                                <th>Numero Oficialia</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha limite</th>
                                                <th>Remitente</th>
                                            </thead>
                                            <tbody></tbody>
                                    </table>
                                </div>

                                <div id="menu_2021" class="tab-pane fade in">
                                        <table id="turnos_2021" style="cursor:pointer;"
                                            class="table  table-sm table-borderedless table-hover">
                                            <thead>
                                                <th id="id_table_doc">Id</th>
                                                <th>Folio</th>
                                                <th>N.Oficio</th>
                                                <th>Asunto</th>
                                                <th>Numero Oficialia</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha limite</th>
                                                <th>Remitente</th>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                </div>


                                <div id="menu_ac_t" class="tab-pane fade in">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-t-ac" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="example_ac_t" style="cursor:pointer;"
                                        class="table  table-sm table-borderedless table-hover">
                                        <thead>
                                            <th id="id_table_doc">Id</th>
                                            <th>Folio</th>
                                            <th>N.Oficio</th>
                                            <th>Asunto</th>
                                            <th>Numero Oficialia</th>
                                            <th>Fecha oficio</th>
                                            <th>Fecha limite</th>
                                            <th>Remitente</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>



                                <div id="opc" class="tab-pane fade in active">
                                    <div id="sel_opc2">
                                        <img src="../img/opc_font.jpg" alt="">
                                    </div>

                                </div>
                                <div id="menu_ti" class="tab-pane fade in">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-t-ti" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="example_as" style="cursor:pointer;"
                                        class="table  table-sm table-borderedless table-hover">
                                        <thead>
                                            <th id="id_table_doc">Id</th>
                                            <th>Folio</th>
                                            <th>N.Oficio</th>
                                            <th>Asunto</th>
                                            <th>Numero Oficialia</th>
                                            <th>Fecha oficio</th>
                                            <th>Fecha limite</th>
                                            <th>Remitente</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div id="menu_ar" class="tab-pane fade in">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-t-ar" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <table id="example_turnos_areas" style="cursor:pointer;"
                                        class="table  table-sm table-borderedless table-hover">
                                        <thead>
                                            <th>Id</th>
                                            <th>Folio</th>
                                            <th>N.Oficio</th>
                                            <th>Asunto</th>
                                            <th>Numero Oficialia</th>
                                            <th>Fecha oficio</th>
                                            <th>Fecha limite</th>
                                            <th>Remitente</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                            </div>



                        </div>

                    </div>


                </div>
            </div>



        </div>
        <div id="iframeD" style="overflow-y:scroll">
            <div id="resultadoBusqueda">
                <img id="img_null" src="../img/null.jpg" width="450px" height="510px" alt="">
            </div>
        </div>

        <?php if($_SESSION['tipo_rol'] == 2){ ?>                    
        <div id="btn-content">
            <div id="menu-top">
                <img src="../img/iconos/add.png" id="add" alt="">
                <!--<img src="../img/iconos/search_es.png" id="search" alt="">-->
                <img src="../img/iconos/close.png" alt="" id="close_add">
            </div>
            
          
            <div class="container">
                <div id="formu">
                    <div class="row">
                        <div class="col-md-9">
                        <div id="num_oficialia"></div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            
                                <h1 id="title_reg">Registrar documento</h1>
                            <label id="enc_reg_doc" for="">
                            </label>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Organismo:</label>
                                        <select class="form-control" name="txtorganismo" id="org" required>
                                            <option value="0">Selecciona una opcion</option>
                                            <?php foreach ($lista_organismo as $mostrar) { ?>
                                            <option value="<?php echo $mostrar['id_organismo']; ?>">
                                                <?php echo $mostrar['nombre_organismo']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Otro:</label>
                                        <div class="ui-widget">
                                            <input type="text" id="otro" class="form-control" disabled>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>No. de oficio</label>
                                        <input type="text" name="n_oficio" class="form-control" id="n_oficio">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Tipo de Documentos</label>
                                        <select name="txttipo" id="txttipo" class="form-control">
                                            <?php foreach ($lista_tipo as $mostrartipo) { ?>
                                            <option value="<?php echo $mostrartipo['id_tipo_doc']; ?>">
                                                <?php echo $mostrartipo['descripcion']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Direccion:</label>
                                        <select class="form-control" id="direccion_cat">
                                            <option value="0">Selecciona una opcion</option>
                                            <?php foreach ($lista_sp as $mostrar) { ?>
                                            <option value="<?php echo $mostrar['id_direccion'] ?>">
                                                <?php echo $mostrar['detalle']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label>Categoria</label>
                                            <select name="txtop_c" id="top_c" class="form-control">
                                                <option value="0">Selecciona una opcion</option>
                                                <option value="200">Documento para direcciones</option>
                                                <option value="20">Documento para la Titular</option>
                                                <option value="52">Documento de Resolucion a la demanda ciudadana</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">

                                            <input type="hidden" name="txtfolio2" id="txtfolio2" value="" class="form-control"
                                                disabled>

                                            <input type="hidden" name="txtfolio" id="txtfolio" value="" class="form-control">
                                        </div>
                                    </div>

                                
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Fecha del oficio</label>
                                        <input name="txtfecha_o" id="txtfecha_o" class="form-control" type="date">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Fecha de recibido</label>
                                        <input name="txtfecha_r" id="txtfecha_r" class="form-control" type="date">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="txtremitente">Remitente: </label>
                                        <div class="ui-widget">
                                            <input type="text" id="txtremitente" class="form-control">
                                        </div>
                                        <!--
                                                <label>Remitente</label>
                                                <input name="txtremitente" id="txtremitente" class="form-control" type="text">
                                                -->
                                    </div>
                                    <div class="col-md-6">
                                        <label>Cargo</label>
                                        <div class="ui-widget">
                                            <input type="text" id="txtcargo_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Anexos:</label>
                                        <textarea class="form-control" name="txtAnexos" id="txtanexos" cols="30"
                                            rows="2"></textarea>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Comentario:</label>
                                        <textarea class="form-control" name="txtcomentario" id="txtcomentario" cols="30"
                                            rows="5"></textarea>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="file-a">Adjuntar archivo</label>
                                        <input type="file" class="form-control" name="file-a" id="file">
                                    </div>         
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4">
                                        <input class="btn btn-success" value="Registrar documento" id="reg_doc" name="envia" />
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    
                    </div>

                </div>
            
          
        </div>
        <?php } ?>
        <!-- <script>
            var arrayFiles = [];
            Dropzone.options.drop2 = {

                addRemoveLinks: true,
                aceptedFile: ".pdf",
                maxFilesize: 2,
                maxFiles: 20,
                init: function() {
                    $('.dz-remove').text("Remover archivo");
                    this.on("addedfile", function(file) {
                        $('#add_file_database').show();
                        $('#clear_drop').show();
                        arrayFiles.push(file);
                        console.log("arrayFiles", arrayFiles);
                    });
                    this.on("removedfile", function(file) {
                        var index = arrayFiles.indexOf(file);
                        arrayFiles.splice(index, 1);
                        console.log("arrayFiles", arrayFiles);
                    });
                }

            }
            $('#clear_drop').click(function() {
                Dropzone.forElement("#drop2").removeAllFiles(true);
            });

            $("#up_database").click(function() {
                var cat = $('#top_c').val();
                let folio = $('#txtfolio2').val();
                //alert(folio);
                if (folio == "") {
                    swal("Por favor genera un folio para subir los archivos")
                } else {
                    //swal("Folio detectado");
                    if (arrayFiles.length > 0) {
                        var listaFiles = [];
                        var finalFor = 0;
                        for (var i = 0; i < arrayFiles.length; i++) {
                            var datosFiles = new FormData();
                            datosFiles.append("file", arrayFiles[i]);
                            datosFiles.append("folio", folio);
                            datosFiles.append("cat", cat);

                            $.ajax({
                                type: 'POST',
                                url: '../Controller/up_database.php',
                                data: datosFiles,
                                contentType: false,
                                processData: false,
                                success: function(e) {
                                    listaFiles.push({
                                        "foto": e
                                    });
                                    l_files = JSON.stringify(listaFiles);
                                    if ((finalFor + 1) == arrayFiles.length) {
                                        //addFile(l_files);
                                        finalFor = 0;
                                    }
                                    finalFor++;
                                    Dropzone.forElement("#drop2").removeAllFiles(true);
                                    // swal({
                                    //     title: 'Archivos cargados correctamente!',
                                    //     text: 'Los archivos fueron vinculados correctamente al folio seleccionado ',
                                    //     icon: 'success',
                                    //     button: 'aceptar!',
                                    // });
                                    swal(e);
                                },
                            });

                        }
                    }
                }
            });
        </script> -->


    </div>