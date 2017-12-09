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
            <h4>Sección de Correos Enviados</h4>

            <p>En esta sección puedes <b>ver</b> y <b>eliminar</b> todos los correos enviados simples y masivos.</p>
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
              <h3 class="box-title">Listado de
                <?php echo $title; ?>
              </h3>
            </div>
            <div class="col-xs-4">
              <a href="correos" class="btn btn-primary btn-flat pull pull-right registrarEstudiante">
                <i class="fa fa-paper-plane-o"></i>
                <span class="quitarTexto">Enviar Correo</span>
              </a>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tablaCorreosEnviados" class="table table-bordered table-striped table-hover dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
              <tr>
                <th>Destinatario</th>
                <th>Asunto</th>
                <th>tipo</th>
                <th>Fecha de envío</th>
                <th>Opciones</th>
              </tr>
            </thead>
          </table>
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

<!-- Ver contacto modal -->
<div class="modal fade" id="verEstudiante">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modalCabeceraInfo">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">
          <i class="fa fa-envelope-o"></i> Ver Mensaje</h4>
      </div>
      <div class="modal-body">
        <div class="box-body text-center">
          <!-- Profile Image -->
          <div class="">
            <div class="box-body box-profile">
              <i class="fa fa-envelope fa-5x"></i>

              <h3 class="profile-username text-center" id="destinatarioCorreoSimple"></h3>

              <p class="text-muted text-center" id="fechaCorreoSimple"></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item" id="list-group-item">
                  <b id="asuntoCorreoSimple"></b>
                </li>
                <li class="list-group-item" id="list-group-item">
                  <b id="mensajeCorreoSimple"></b>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.box-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">
          <i class="fa fa-times"></i> Cerrar</button>
        <button type="submit" class="btn btn-success btn-flat">
          <i class="fa fa-envelope-o"></i> Reenviar Correo</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- ./Ver contacto modal -->

<!-- Eliminar contacto modal -->
<div class="modal fade" id="eliminarEstudiante">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modalCabeceraPeligro">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">
          <i class="fa fa-envelope-o"></i> Eliminar Contacto</h4>
      </div>
      <div class="modal-body">
        <p>Estas seguro que deseas eliminar a este estudiante?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">
          <i class="fa fa-times"></i> Cancelar</button>
        <button type="button" id="eliminarEstudianteBtn" class="btn btn-danger btn-flat">
          <i class="fa fa-trash-o"></i> Eliminar Contacto</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.Eliminar contacto modal -->

<!-- Custom -->
<script src="assets/custom/js/correos.js"></script>