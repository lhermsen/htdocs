<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bewerk_lid extends CI_Controller {
	
	public function index($iIdGebruiker)
	{
		// Selecteer deze gebruiker
		$this->gebruiker_model->set($iIdGebruiker);

		// Haal de gecategoriseerde subgroepen op
		$aSubgroepen = $this->subgroepen_model->get();
		
		// Laad de views
		$this->pagina->header();
		$this->load->view('gebruikers/beheer/bewerk_gebruiker', array('aSubgroepen' => $aSubgroepen,'aGebruiker'=>$this->gebruiker_model->aDatabase));
		$this->pagina->footer();
	}
	
	public function bewerk()
	{
		// Haal id-nummer op van de gebruiker
		$this->gebruiker_model->set($this->input->post('id'));
		
		// Update gebruikersgegevens
		if($this->gebruiker_model->wijzig($this->input->post()))
		{
			// Succesmelding
			$this->melding->geef('succes','Gelukt, de gegevens zijn gewijzigd.', 'Lid succesvol bewerkt');
		}
		else
		{
			// Foutmelding
			
			$sLogOpmerking =  'Bewerk_lid '.$this->input->post('id').' mislukt: '.implode($this->input->post());
			$this->melding->geef('fatale_fout','De gegevens konden niet worden aangepast', $sLogOpmerking);
		}
		
		$this->index($this->input->post('id'));
	}
}