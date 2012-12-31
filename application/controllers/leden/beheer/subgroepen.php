<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subgroepen extends CI_Controller {
	
	public function index()
	{
		$aSubgroepen = $this->subgroepen_model->get();
		$aRechten = $this->db->get('rechten')->result_array();
		
		$this->pagina->header();
		$this->load->view('gebruikers/beheer/subgroepen', array('aSubgroepen' => $aSubgroepen,'aRechten'=>$aRechten));
		$this->pagina->footer();
	}
	
	public function nieuwe_subgroep()
	{	
<<<<<<< HEAD
		$this->subgroep_model->nieuw($_POST);
=======
		$this->subgroep_model->nieuw($this->input->post());
>>>>>>> Ledenbeheer, Views, Assets, Models, etc.
	}
	
	public function nieuwe_subgroepcategorie()
	{
<<<<<<< HEAD
		$this->subgroepcategorie_model->nieuw($_POST);
=======
		$this->subgroepcategorie_model->nieuw($this->input->post());
>>>>>>> Ledenbeheer, Views, Assets, Models, etc.
	}
		
	public function nieuw_recht()
	{
<<<<<<< HEAD
		$this->recht_model->nieuw($_POST);
=======
		$this->recht_model->nieuw($this->input->post());
>>>>>>> Ledenbeheer, Views, Assets, Models, etc.
	}
		
	public function wijzig_subgroep($iId)
	{	
		$this->subgroep_model->set($iId);
<<<<<<< HEAD
		$this->subgroep_model->wijzig($_POST);
=======
		$this->subgroep_model->wijzig($this->input->post());
>>>>>>> Ledenbeheer, Views, Assets, Models, etc.
	}
	
	public function wijzig_subgroepcategorie($iId)
	{
		$this->subgroepcategorie_model->set($iId);
<<<<<<< HEAD
		$this->subgroepcategorie_model->wijzig($_POST);
=======
		$this->subgroepcategorie_model->wijzig($this->input->post());
>>>>>>> Ledenbeheer, Views, Assets, Models, etc.
	}
	
	public function wijzig_recht($iId)
	{
		$this->recht_model->set($iId);
<<<<<<< HEAD
		$this->recht_model->wijzig($_POST);
=======
		$this->recht_model->wijzig($this->input->post());
>>>>>>> Ledenbeheer, Views, Assets, Models, etc.
	}
		
	public function verwijder_subgroep($iId)
	{	
		$this->subgroep_model->set($iId);
		$this->subgroep_model->verwijder();
	}
		
	public function verwijder_subgroepcategorie($iId)
	{	
		$this->subgroepcategorie_model->set($iId);
		$this->subgroepcategorie_model->verwijder();
	}

	public function verwijder_recht($iId)
	{	
		$this->recht_model->set($iId);
		$this->recht_model->verwijder();
	}
	
}