

  <header class="main-header">
    <!-- Logo -->
    <a href="tablero" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><i class="fa fa-envelope-o fa-2x"></i></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Mensajería</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu horaActualGrande">
            <a href="#"><i class="fa fa-calendar"></i> <?php echo $fechaActual; ?></a>
          </li>

          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span><i class="fa fa-user-o"></i> <?php echo $userData['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  <?php echo $userData['name']; ?>
                  <small>Usuario desde <?php $fechaOriginal = $userData['created_at']; echo $fecha = date("d-m-Y", strtotime($fechaOriginal)); ?></small>
                  <i class="fa fa-user-o fa-5x"></i>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="perfil" class="btn btn-warning btn-flat" id="editarBtn"><i class="fa fa-pencil"></i> Editar perfil</a>
                </div>
                <div class="pull-right">
                  <a href="users/logout" class="btn btn-danger btn-flat" id="salirBtn"><i class="fa fa-power-off"></i> Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <i class="fa fa-user-o fa-2x" id="iconoWhite"></i>
        </div>
        <div class="pull-left info">
          <p><?php echo $userData['name']; ?></p>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="<?php if($this->uri->segment(1)=="tablero"){echo "active";}?>">
          <a href="tablero">
            <i class="fa fa-dashboard"></i> <span>Tablero</span>
          </a>
        </li>
        <li class="treeview <?php if($this->uri->segment(1)=="contactos" || $this->uri->segment(1)=="grupos"){echo "active";}?>">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Agenda</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(1)=="contactos"){echo "active";}?>"><a href="contactos"><i class="fa fa-circle-o"></i> Contactos</a></li>
            <li class="<?php if($this->uri->segment(1)=="grupos"){echo "active";}?>"><a href="grupos"><i class="fa fa-circle-o"></i> Grupos</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($this->uri->segment(1)=="correos" || $this->uri->segment(1)=="correos-enviados"){echo "active";}?>">
          <a href="#">
            <i class="fa fa-envelope-o"></i>
            <span>Correo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(1)=="correos"){echo "active";}?>"><a href="correos"><i class="fa fa-circle-o"></i> Enivar Correos</a></li>
            <li class="<?php if($this->uri->segment(1)=="correos-enviados"){echo "active";}?>"><a href="correos-enviados"><i class="fa fa-circle-o"></i> Correos Enviados</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($this->uri->segment(1)=="sms" || $this->uri->segment(1)=="sms-enviados"){echo "active";}?>">
          <a href="#">
            <i class="fa fa-whatsapp"></i>
            <span>SMS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(1)=="sms"){echo "active";}?>"><a href="sms"><i class="fa fa-circle-o"></i> Enviar SMS</a></li>
            <li class="<?php if($this->uri->segment(1)=="sms-enviados"){echo "active";}?>"><a href="sms-enviados"><i class="fa fa-circle-o"></i> SMS Enviados</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($this->uri->segment(1)=="usuarios" || $this->uri->segment(1)=="perfil"){echo "active";}?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(1)=="usuarios"){echo "active";}?>"><a href="usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
            <li class="<?php if($this->uri->segment(1)=="perfil"){echo "active";}?>"><a href="perfil"><i class="fa fa-circle-o"></i> Editar perfil</a></li>
          </ul>
        </li>
        <!-- <li class="<?php if($this->uri->segment(1)=="ajustes"){echo "active";}?>">
          <a href="ajustes">
            <i class="fa fa-gears"></i> <span>Ajustes</span>
          </a>
        </li> -->
        <li>
          <a href="users/logout">
            <i class="fa fa-power-off"></i> <span>Salir</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php if ($title !== "Tablero") { ?>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?php echo $title; ?>
          <small>Ajustes de <?php echo $title; ?></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="tablero"><i class="fa fa-dashboard"></i> Mensajería</a></li>
          <li class="active"><?php echo $title; ?></li>
        </ol>
      </section>
    <?php } ?>