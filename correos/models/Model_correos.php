<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_correos extends CI_Model {

	public function registrarSimple()
	{
		$data = array(
			'destinatario' => $this->input->post('correoSimple'),
			'asunto' => $this->input->post('asuntoSimple'),
      'mensaje' => $this->input->post('mensajeSimple'),
      'tipo_correo' => "Simple",
			'created_at' => date('Y-m-d')
		);

		$sql = $this->db->insert('correos', $data);

		if ($sql === true) {
			return true;
		}
		else{
			return false;
		}
  }
  
  public function registrarMasivos()
	{
		$data = array(
			'destinatario' => $this->input->post('correoMasivo'),
			'asunto' => $this->input->post('asuntoMasivo'),
      'mensaje' => $this->input->post('mensajeMasivo'),
      'tipo_correo' => "Masivo",
			'created_at' => date('Y-m-d')
		);

		$sql = $this->db->insert('correos', $data);

		if ($sql === true) {
			return true;
		}
		else{
			return false;
		}
	}
	
	public function traerDatosEstudiantes($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM correos WHERE correo_id = ?";
			$query  = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM correos";
		$query  = $this->db->query($sql);
		return $query->result_array();
	}

	public function eliminarEstudiante($id = null)
	{
		if ($id) {
			$sql = "DELETE FROM correos WHERE correo_id = ?";
			$query = $this->db->query($sql, array($id));

			
			return ($query === true) ? true : false;
		}
	}

}

/* End of file model_correos.php */
/* Location: ./application/models/model_correos.php */