<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Correos extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		// form_validation
		$this->load->library('form_validation');

		// Model
		$this->load->model('model_correos');
	}

	public function simple1()
	{
		$this->load->library('email');
    
    $subject = $this->input->post('asuntoSimple');
    $message = $this->input->post('mensajeSimple');
    
    // Get full html:
    $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
        <title>' . html_escape($subject) . '</title>
        <style type="text/css">
            body {
                font-family: Arial, Verdana, Helvetica, sans-serif;
                font-size: 100px;
                color: red;
            }
        </style>
    </head>
    <body>
    ' . $message . '
    </body>
    </html>';
    // Also, for getting full html you may use the following internal method:
    //$body = $this->email->full_html($subject, $message);
    //Cambia el $mail->addAddress() por lo siguiente:
    $array = array($this->input->post('correoSimple'));
    $result = $this->email
        ->from('kedry014@gmail.com', 'Kedry Rodriguez')
        // ->reply_to('kedry014@gmail.com')    // Optional, an account where a human being reads.
        ->to($array)
        ->subject($subject)
        ->message($body)
        ->send();

    var_dump($result);
    echo '<br />';
    echo $this->email->print_debugger();
    
    exit;
  }
  
  public function simple()
	{

		$validator = array('success' => false, 'messages' => array());

		$config = array(
			array(
				'field' => 'correoSimple',
				'label' => 'correo',
				'rules' => 'trim|required|callback_check_default|xss_clean'
      ),
      array(
				'field' => 'asuntoSimple',
				'label' => 'asunto',
				'rules' => 'trim|required|xss_clean'
      ),
      array(
				'field' => 'mensajeSimple',
				'label' => 'mensaje',
				'rules' => 'trim|required|xss_clean'
			)
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('check_default', 'Debe seleccionar algo distinto al predeterminado.');
		$this->form_validation->set_message('xss_clean', 'Mensaje de error: su xss no está limpio.');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() === true) {

      $registrarCorreo = $this->model_correos->registrarSimple();
      
      $this->load->library('email');
      
      $subject = $this->input->post('asuntoSimple');
      $message = $this->input->post('mensajeSimple');
      
      // Get full html:
      $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
          <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
          <title>' . html_escape($subject) . '</title>
          <style type="text/css">
            body {
              margin: 0;
              padding: 0;
              min-width: 100%!important;
            }
        
            img {
              height: auto;
            }
        
            .content {
              width: 100%;
              max-width: 600px;
            }
        
            .header {
              padding: 40px 30px 20px 30px;
            }
        
            .innerpadding {
              padding: 30px 30px 30px 30px;
            }
        
            .borderbottom {
              border-bottom: 1px solid #f2eeed;
            }
        
            .subhead {
              font-size: 15px;
              color: #ffffff;
              font-family: sans-serif;
              letter-spacing: 10px;
            }
        
            .h1,
            .h2,
            .bodycopy {
              color: #153643;
              font-family: sans-serif;
            }
        
            .h1 {
              font-size: 33px;
              line-height: 38px;
              font-weight: bold;
            }
        
            .h2 {
              padding: 0 0 15px 0;
              font-size: 24px;
              line-height: 28px;
              font-weight: bold;
            }
        
            .bodycopy {
              font-size: 16px;
              line-height: 22px;
            }
        
            .button {
              text-align: center;
              font-size: 18px;
              font-family: sans-serif;
              font-weight: bold;
              padding: 0 30px 0 30px;
            }
        
            .button a {
              color: #ffffff;
              text-decoration: none;
            }
        
            .footer {
              padding: 20px 30px 15px 30px;
            }
        
            .footercopy {
              font-family: sans-serif;
              font-size: 14px;
              color: #ffffff;
            }
        
            .footercopy a {
              color: #ffffff;
              text-decoration: underline;
            }
        
            @media only screen and (max-width: 550px),
            screen and (max-device-width: 550px) {
              body[yahoo] .hide {
                display: none!important;
              }
              body[yahoo] .buttonwrapper {
                background-color: transparent!important;
              }
              body[yahoo] .button {
                padding: 0px!important;
              }
              body[yahoo] .button a {
                background-color: #e05443;
                padding: 15px 15px 13px!important;
              }
              body[yahoo] .unsubscribe {
                display: block;
                margin-top: 20px;
                padding: 10px 50px;
                background: #2f3942;
                border-radius: 5px;
                text-decoration: none!important;
                font-weight: bold;
              }
            }
        
            /*@media only screen and (min-device-width: 601px) {
            .content {width: 600px !important;}
            .col425 {width: 425px!important;}
            .col380 {width: 380px!important;}
            }*/
          </style>
      </head>
      <body yahoo bgcolor="#f6f8f1">
        <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <!--[if (gte mso 9)|(IE)]>
          <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td>
        <![endif]-->
            <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td bgcolor="#c7d8a7" class="header">
                  <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="70" style="padding: 0 20px 20px 0;">
                        <img class="fix" src="http://localhost/correo_sms/assets/custom/img/icon.gif" width="70" height="70" border="0" alt="" />
                      </td>
                    </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
              <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td>
            <![endif]-->
                <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">
                  <tr>
                    <td height="70">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <!-- <tr>
                          <td class="subhead" style="padding: 0 0 0 3px;">
                            CREATING
                          </td>
                        </tr> -->
                        <tr>
                          <td class="h1" style="padding: 5px 0 0 0;">
                            Nombre de la Empresa
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                  </td>
                </tr>
            </table>
            <![endif]-->
              </td>
            </tr>
            <tr>
              <td class="innerpadding borderbottom">
                <table width="115" align="left" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="115" style="padding: 0 20px 20px 0;">
                      <img class="fix" src="http://localhost/correo_sms/assets/custom/img/article1.png" width="115" height="115" border="0" alt="" />
                    </td>
                  </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
              <table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td>
            <![endif]-->
                <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 380px;">
                  <tr>
                    <td>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="bodycopy">
                            ' . $message . '
                          </td>
                        </tr>
                        <tr>
                          <td style="padding: 20px 0 0 0;">
                            <table class="buttonwrapper" bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td class="button" height="45">
                                  <a href="#">Link de mensaje, opcional!</a>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                  </td>
                </tr>
            </table>
            <![endif]-->
              </td>
            </tr>
            <tr>
              <td class="innerpadding borderbottom">
                <img class="fix" src="http://localhost/correo_sms/assets/custom/img/wide.png" width="100%" border="0" alt="" />
              </td>
            </tr>
            <tr>
              <td class="innerpadding bodycopy">
                Este mensaje esta sujeto a normas de segurita etc, este texto va segun algunas seguridades de la empresa.
              </td>
            </tr>
            <tr>
              <td class="footer" bgcolor="#44525f">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center" class="footercopy">
                      &reg; Derechos reservados, Empresa 2017
                      <br/>
                      <span class="hide">Nuestras redes sociales</span>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" style="padding: 20px 0 0 0;">
                      <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                            <a href="http://www.facebook.com/">
                              <img src="http://localhost/correo_sms/assets/custom/img/facebook.png" width="37" height="37" alt="Facebook" border="0" />
                            </a>
                          </td>
                          <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                            <a href="http://www.twitter.com/">
                              <img src="http://localhost/correo_sms/assets/custom/img/twitter.png" width="37" height="37" alt="Twitter" border="0" />
                            </a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
            </td>
          </tr>
      </table>
      <![endif]-->
        </td>
      </tr>
    </table>
      </body>
      </html>';

      $contacto_id = $this->input->post('correoSimple');

      $destinatario = $this->db->get_where('estudiantes' , array('id' => $contacto_id))->row()->correo;

      $result = $this->email
          ->from('kedry014@gmail.com', 'Kedry Rodriguez')
          // ->reply_to('kedry014@gmail.com')    // Optional, an account where a human being reads.
          ->to($destinatario)
          ->subject($subject)
          ->message($body)
          ->send();
  
      // var_dump($result);
      // echo '<br />';
      // echo $this->email->print_debugger();
      
      // exit;

			if ($registrarCorreo === true) {
				$validator['success'] = true;
				$validator['messages'] = "Correo enviado correctamente";
			}
			else{
				$validator['success'] = false;
				$validator['messages'] = "Error al enviar el correo";
			}
		}
		else{
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);
  }
  
  // Validar que el select no este vacio
	public function check_default($select)
	{
		return $select == '0' ? FALSE : TRUE;
  }

  // Validar que el grupo no este vacio en correos masivos
  public function grupo_vacio($correoMasivo)
  {
    // Traemos todos los registros que pertenescan a ese grupo
    $query = $this->db->query("SELECT correo FROM estudiantes WHERE grupo_id = $correoMasivo");
    
    // Contamos la cantidad de registros que nos trae la consulta
    $correoMasivo = count($query->result());

    if ($correoMasivo == 0)
    {
      $this->form_validation->set_message('grupo_vacio', 'El grupo que seleccionaste no contiene contactos.');
      return FALSE;
    }
    else
    {
      return TRUE;
    }
  }
  
  
  public function masivos()
  {
    $validator = array('success' => false, 'messages' => array());
    
    $config = array(
      array(
        'field' => 'correoMasivo',
        'label' => 'correo',
        'rules' => 'trim|required|callback_check_default|callback_grupo_vacio|xss_clean'
      ),
      array(
        'field' => 'asuntoMasivo',
        'label' => 'asunto',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'mensajeMasivo',
        'label' => 'mensaje',
        'rules' => 'trim|required|xss_clean'
      )
    );

    $this->form_validation->set_rules($config);
    $this->form_validation->set_message('check_default', 'Debe seleccionar algo distinto al predeterminado.');
    $this->form_validation->set_message('xss_clean', 'Mensaje de error: su xss no está limpio.');
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

    if ($this->form_validation->run() === true) {

      $registrarCorreo = $this->model_correos->registrarMasivos();
      
      $this->load->library('email');
      
      $subject = $this->input->post('asuntoMasivo');
      $message = $this->input->post('mensajeMasivo');
      
      // Get full html:
      $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
          <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
          <title>' . html_escape($subject) . '</title>
          <style type="text/css">
            body {
              margin: 0;
              padding: 0;
              min-width: 100%!important;
            }
        
            img {
              height: auto;
            }
        
            .content {
              width: 100%;
              max-width: 600px;
            }
        
            .header {
              padding: 40px 30px 20px 30px;
            }
        
            .innerpadding {
              padding: 30px 30px 30px 30px;
            }
        
            .borderbottom {
              border-bottom: 1px solid #f2eeed;
            }
        
            .subhead {
              font-size: 15px;
              color: #ffffff;
              font-family: sans-serif;
              letter-spacing: 10px;
            }
        
            .h1,
            .h2,
            .bodycopy {
              color: #153643;
              font-family: sans-serif;
            }
        
            .h1 {
              font-size: 33px;
              line-height: 38px;
              font-weight: bold;
            }
        
            .h2 {
              padding: 0 0 15px 0;
              font-size: 24px;
              line-height: 28px;
              font-weight: bold;
            }
        
            .bodycopy {
              font-size: 16px;
              line-height: 22px;
            }
        
            .button {
              text-align: center;
              font-size: 18px;
              font-family: sans-serif;
              font-weight: bold;
              padding: 0 30px 0 30px;
            }
        
            .button a {
              color: #ffffff;
              text-decoration: none;
            }
        
            .footer {
              padding: 20px 30px 15px 30px;
            }
        
            .footercopy {
              font-family: sans-serif;
              font-size: 14px;
              color: #ffffff;
            }
        
            .footercopy a {
              color: #ffffff;
              text-decoration: underline;
            }
        
            @media only screen and (max-width: 550px),
            screen and (max-device-width: 550px) {
              body[yahoo] .hide {
                display: none!important;
              }
              body[yahoo] .buttonwrapper {
                background-color: transparent!important;
              }
              body[yahoo] .button {
                padding: 0px!important;
              }
              body[yahoo] .button a {
                background-color: #e05443;
                padding: 15px 15px 13px!important;
              }
              body[yahoo] .unsubscribe {
                display: block;
                margin-top: 20px;
                padding: 10px 50px;
                background: #2f3942;
                border-radius: 5px;
                text-decoration: none!important;
                font-weight: bold;
              }
            }
        
            /*@media only screen and (min-device-width: 601px) {
            .content {width: 600px !important;}
            .col425 {width: 425px!important;}
            .col380 {width: 380px!important;}
            }*/
          </style>
      </head>
      <body yahoo bgcolor="#f6f8f1">
        <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <!--[if (gte mso 9)|(IE)]>
          <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td>
        <![endif]-->
            <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td bgcolor="#c7d8a7" class="header">
                  <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="70" style="padding: 0 20px 20px 0;">
                        <img class="fix" src="http://localhost/correo_sms/assets/custom/img/icon.gif" width="70" height="70" border="0" alt="" />
                      </td>
                    </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
              <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td>
            <![endif]-->
                <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">
                  <tr>
                    <td height="70">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <!-- <tr>
                          <td class="subhead" style="padding: 0 0 0 3px;">
                            CREATING
                          </td>
                        </tr> -->
                        <tr>
                          <td class="h1" style="padding: 5px 0 0 0;">
                            Nombre de la Empresa
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                  </td>
                </tr>
            </table>
            <![endif]-->
              </td>
            </tr>
            <tr>
              <td class="innerpadding borderbottom">
                <table width="115" align="left" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="115" style="padding: 0 20px 20px 0;">
                      <img class="fix" src="http://localhost/correo_sms/assets/custom/img/article1.png" width="115" height="115" border="0" alt="" />
                    </td>
                  </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
              <table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td>
            <![endif]-->
                <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 380px;">
                  <tr>
                    <td>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="bodycopy">
                            ' . $message . '
                          </td>
                        </tr>
                        <tr>
                          <td style="padding: 20px 0 0 0;">
                            <table class="buttonwrapper" bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td class="button" height="45">
                                  <a href="#">Link de mensaje, opcional!</a>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                  </td>
                </tr>
            </table>
            <![endif]-->
              </td>
            </tr>
            <tr>
              <td class="innerpadding borderbottom">
                <img class="fix" src="http://localhost/correo_sms/assets/custom/img/wide.png" width="100%" border="0" alt="" />
              </td>
            </tr>
            <tr>
              <td class="innerpadding bodycopy">
                Este mensaje esta sujeto a normas de segurita etc, este texto va segun algunas seguridades de la empresa.
              </td>
            </tr>
            <tr>
              <td class="footer" bgcolor="#44525f">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center" class="footercopy">
                      &reg; Derechos reservados, Empresa 2017
                      <br/>
                      <span class="hide">Nuestras redes sociales</span>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" style="padding: 20px 0 0 0;">
                      <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                            <a href="http://www.facebook.com/">
                              <img src="http://localhost/correo_sms/assets/custom/img/facebook.png" width="37" height="37" alt="Facebook" border="0" />
                            </a>
                          </td>
                          <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                            <a href="http://www.twitter.com/">
                              <img src="http://localhost/correo_sms/assets/custom/img/twitter.png" width="37" height="37" alt="Twitter" border="0" />
                            </a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
            </td>
          </tr>
      </table>
      <![endif]-->
        </td>
      </tr>
    </table>
      </body>
      </html>';

      // Obtenemos el id del grupo
      $to = $this->input->post('correoMasivo');

      // Seleccionamos los contactos con el id del grupo obtenido
      $query = $this->db->query("SELECT correo FROM estudiantes WHERE grupo_id = $to");
      
      // // Contamos cuantos registros trae
      // $countar = count($query->result());
      
      // // Validamos de que venga con registros
      // if($counta > 0) {
      //   // Hacemos el ciclo para el envio masivo de correos
      //   foreach ($query->result() as $row)
      //   {
      //     $result = $this->email
      //         ->from('kedry014@gmail.com', 'Kedry Rodriguez')
      //         ->to($row->correo)
      //         ->subject($subject)
      //         ->message($body)
      //         ->send();
      //   }
      // }
      // else {
      //   $validator['success'] = false;
      //   $validator['messages'] = "Este grupo no contiene contactos";
      // }

      // Hacemos el ciclo para el envio masivo de correos
      foreach ($query->result() as $row)
      {
        $result = $this->email
            ->from('kedry014@gmail.com', 'Kedry Rodríguez')
            ->to($row->correo)
            ->subject($subject)
            ->message($body)
            ->send();
      }

      if ($this->input->post('mensajeMasivo')) {
        $validator['success'] = true;
        $validator['messages'] = "Correos enviados correctamente";
      }
      else{
        $validator['success'] = false;
        $validator['messages'] = "Error al enviar los correos";
      }
    }
    else{
      $validator['success'] = false;
      foreach ($_POST as $key => $value) {
        $validator['messages'][$key] = form_error($key);
      }
    }

    echo json_encode($validator);
  }

  public function traerDatosEstudiantes()
  {
    $result = array('data' => array());

    $data = $this->model_correos->traerDatosEstudiantes();
    foreach ($data as $key => $value) {

      if($value['tipo_correo'] === "Simple"){
        $destinatarioNombre = $this->db->get_where('estudiantes' , array('id' => $value['destinatario']))->row()->nombre;
        $destinatarioApellido = $this->db->get_where('estudiantes' , array('id' => $value['destinatario']))->row()->apellido;
        $destinatario = $destinatarioNombre." ".$destinatarioApellido;
      } else {
        $destinatario = $this->db->get_where('grupos' , array('grupo_id' => $value['destinatario']))->row()->grupo;
      }

      $fechaOriginal = $value['created_at'];
      $fecha = date("d-m-Y", strtotime($fechaOriginal));

      $botones = '
      <div class="btn-group">
        <button type="button" class="btn btn-info btn-flat" onclick="verEstudiante('.$value['correo_id'].')" data-toggle="modal" data-target="#verEstudiante"><i class="fa fa-eye"></i></button>
        <button type="button" class="btn btn-danger btn-flat" onclick="eliminarEstudiante('.$value['correo_id'].')" data-toggle="modal" data-target="#eliminarEstudiante"><i class="fa fa-trash-o"></i></button>
      </div>
      ';
        

      $result['data'][$key] = array(
        $destinatario,
        $value['asunto'],
        $value['tipo_correo'],
        $fecha,
        $botones
      );
    }

    echo json_encode($result);
  }

  public function traerInfoEstudianteSeleccionado($id)
  {
    if ($id) {
      $data = $this->model_correos->traerDatosEstudiantes($id);
      echo json_encode($data);
    }
  }

  public function eliminarEstudiante($id = null)
	{
		if ($id) {
			$validator = array('success' => false, 'messages' => array());

			$eliminarEstudiante = $this->model_correos->eliminarEstudiante($id);
			if ($eliminarEstudiante === true) {
				$validator['success'] = true;
				$validator['messages'] = "SMS eliminado correctamente";
			}
			else{
				$validator['success'] = false;
				$validator['messages'] = "Error al eliminar el SMS";
			}

			echo json_encode($validator);
		}
	}

}

/* End of file Correos.php */
/* Location: ./application/controllers/Correos.php */