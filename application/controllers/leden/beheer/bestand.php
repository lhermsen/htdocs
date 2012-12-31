<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bestand extends CI_Controller {
	
	public function index()
	{
		// Haal alle gebruikers op, behalve de gebruikers die behoren tot de subgroep "Reünisten"
		$aGebruikers = $this->gebruikers_model->get("Reünisten",true);
		
		// Haal alle subgroepen gecategoriseerd op 
		$aSubgroepen = $this->subgroepen_model->get();
		
		// Laad de views
		$this->pagina->header();
		$this->load->view('gebruikers/beheer/bestand', array('aSubgroepen' => $aSubgroepen,'aGebruikers'=>$aGebruikers));
		$this->pagina->footer();
	}
	
	public function voeg_toe_aan_subgroep($iSubgroep = '')
	{
		if(!empty($iSubgroep))
		{
			// Voeg de id's in de postdata toe aan de geselecteerde subgroep
			
			$aGebruikerIds = $this->input->post('aGebruikerIds');
			foreach($aGebruikerIds as $iGebruikerId)
			{
				$aGegevens = array('subgroep_id' => iSubgroep, 'gebruiker_id' => $iGebruikerId));
				$this->db->insert('gebruiker_subgroep', $aGegevens;

				// Zet deze toevoeging in het databaselogboek
<<<<<<< HEAD
				$this->databaselogboek_model->nieuwe_rij('gebruiker_subgroep', '', $aGegevens, $_SESSION['gebruiker']);
=======
				$this->databaselogboek_model->nieuwe_rij('gebruiker_subgroep', '', $aGegevens, $this->gebruiker_model->aDatabase['id']);
>>>>>>> Ledenbeheer, Views, Assets, Models, etc.
			}
			
			// Return dat het gelukt is in een echo
			echo '1';
		}
	}
<<<<<<< HEAD
=======
	
	public function exporteer()
	{
		// Haal alle te exporteren Id's uit de postdata
		$aGebruikerIds = $this->input->post('aGebruikerIds');
		
		// Is de gebruiker reunist? Dan maximaal 50 leden exporteren
		if($this->gebruiker_model->is_reunist() && count($aGebruikerIds) > $this->config->item('iReunist_export_max'))
		{
			echo $this->config->item('iReunist_export_max'); // Return als echo het maximaal aantal te exporteren
		}
		else
		{
			// Exporteer de gegevens in Excel
			$this->gebruikers_model->exporteer($aGebruikerIds);
		}
	}
>>>>>>> Ledenbeheer, Views, Assets, Models, etc.
}