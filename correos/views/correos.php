<!-- Main content -->
<section class="content">
  
  <div class="messages"></div>

  <div class="row">
    <div class="col-md-4 col-md-push-8">

      <div class="box box-default">
        <div class="box-header with-border">
          <i class="fa fa-bullhorn"></i>

          <h3 class="box-title">Información sobre la sección</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="callout callout-info">
            <h4>Sección de Correos</h4>

            <p>En esta sección puedes enviar correos electrónicos de forma simple como masivos a tus contactos.</p>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </div>
    <!-- /.col -->

    <div class="col-md-8 col-md-pull-4">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-xs-8">
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active">
                <a href="#tab_1-1" data-toggle="tab">Simples</a>
              </li>
              <li>
                <a href="#tab_2-2" data-toggle="tab">Masivos</a>
              </li>
              <li class="pull-left header">
                <i class="fa fa-envelope-o fa-2x"></i> Sevicio de Correo Electrónico</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1-1">
                <!--  correo simple -->
                <form role="form" method="post" action="correos/simple" id="correoSimpleForm">
                  <div id="loading" class="text-center"></div>
                  <div class="modal-body">
                    <div class="box-body">
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                          </span>
                          <select class="form-control" name="correoSimple" id="correoSimple">
                            <option value="0">Seleccionar correo</option>
                            <?php
                                  $grupo = $this->db->order_by('nombre', 'ASC')->get('estudiantes')->result_array();
                                  foreach($grupo as $row):																	
                                ?>

                              <option value="<?php echo $row['id'];?>">
                                <?php echo $row['nombre']." ".$row['apellido']." | ".$row['correo'];?>
                              </option>

                              <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-user-o"></i>
                          </span>
                          <input type="text" class="form-control" id="asuntoSimple" name="asuntoSimple" placeholder="Asunto">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-comment-o"></i>
                          </span>
                          <textarea class="form-control" placeholder="Mensaje" id="mensajeSimple" name="mensajeSimple"></textarea>
                        </div>
                      </div>
                      <button type="submit" id="enviarSimpleBtn" class="btn btn-success btn-flat pull-right" onclick="enviarCorreoSimple()">
                        <i class="fa fa-paper-plane-o"></i> Enviar Correo</button>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                <!-- correo masivo -->
                <form role="form" method="post" action="correos/masivos" id="correoMasivoForm">
                  <div id="loading2" class="text-center"></div>
                  <div class="modal-body">
                    <div class="box-body">
                      <div class="form-group" id="form-group-correoMasivo">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                          </span>
                          <select class="form-control" name="correoMasivo" id="correoMasivo">
                            <option value="0">Seleccionar grupo</option>
                            <?php
                                  $grupo = $this->db->order_by('grupo', 'ASC')->get('grupos')->result_array();
                                  foreach($grupo as $row):																	
                                ?>

                              <option value="<?php echo $row['grupo_id'];?>">
                                <?php echo $row['grupo'];?>
                              </option>

                              <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-user-o"></i>
                          </span>
                          <input type="text" class="form-control" id="asuntoMasivo" name="asuntoMasivo" placeholder="Asunto">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-comment-o"></i>
                          </span>
                          <textarea class="form-control" placeholder="Mensaje" id="mensajeMasivo" name="mensajeMasivo"></textarea>
                        </div>
                      </div>
                      <button type="submit" id="enviarMasivoBtn" class="btn btn-success btn-flat pull-right" onclick="enviarCorreoMasivo()">
                        <i class="fa fa-paper-plane-o"></i> Enviar Correo</button>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Custom -->
<script src="assets/custom/js/correos.js"></script>