<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gebruikers_model extends CI_Model {
    
	function get($sSubgroepNaam = '', $bSubgroepBuitensluiten = false)
	{
		// Haal eerst eventueel de subgroep op met de gegeven naam
		if(!empty($sSubgroepNaam)) $aSubgroep = $this->db->get_where('subgroepen',array('naam'=>$sSubgroepNaam))->row_array();
		
		// Haal nu alle gebruikers op, eventueel alleen van de geselecteerde subgroep (of als de subgroep buitengesloten moet worden, alle gebruikers BEHALVE die van betreffende subgroep)
		
		if(!empty($aSubgroep['id']))
		{
			if($bSubgroepBuitensluiten) $this->db->where('subgroep_id !=', $aSubgroep['id']);
			else $this->db->where('subgroep_id', $aSubgroep['id']);
		}
		$aGebruikers = $this->db->get('gebruikers')->result_array();
		
		return $aGebruikers;
	}
	
	function exporteer($aIdsGebruikers)
    {
<<<<<<< HEAD
        // Kijk naar welke gebruiker is ingelogd. Is dat een reunistbeheerder of een ledenbeheerder? Een reunistbeheerder mag max 50 actieve leden exporteren. En andersom.
		
		// Exporteerde gegevens van alle gebruikers waarvan het id in de gegeven array staat naar een excel bestand.
		
    }	
}

=======
		// Exporteerde gegevens van alle gebruikers waarvan het id in de gegeven array staat naar een excel bestand.
		
		// Laad de Excel-exporteer library
		$this->load->library('excel');
		
		// Activeer een worksheet en geef het een titel
		
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Geëxporteerde gebruikers');
		
		// Maak een lijst van het alfabet met corresponderende kolomnaam van de gebruiker, om de kolommen te kunnen doorlopen
		
		$aKolommenGebruikers = $this->db->list_fields('gebruikers');
		$aAlfabet = range('A', 'Z');
		$aKolommenEnAlfabet = array();
		
		for($i=0; $i<count($aKolommenGebruikers);$i++)
		{
			$aKolommenEnAlfabet[$aAlfabet[$i]] = $aKolommenGebruikers[$i];
			
			// Zet de titel van deze kolom alvast in de sheet
			$this->excel->getActiveSheet()->setCellValue($aAlfabet[$i].'1', $aKolommenGebruikers[$i]);
		}
	
		// Doorloop alle gebruikers
		foreach($aIdsGebruikers as $iIdGebruiker)
		{
			// Haal de gegevens op van deze gebruiker
			$this->gebruiker_model->set($iIdGebruiker);
			
			// Begin met de gebruikersgegevens vanaf de tweede rij in de sheet
			$iRij = 2;
			
			// Doorloop de alfabetische array. Zet de gegevens van deze gebruiker in de kolommen.
			foreach($aKolommenEnAlfabet as $sLetter => $sKolomNaam)
			{
				// Zet in de kolom met de juiste letter de waarde van de databasekolom van de gebruiker
				$this->excel->getActiveSheet()->setCellValue($sLetter.$iRij, $this->gebruiker_model->aDatabase[$sKolomNaam]);
				
				// Volgende rij
				$iRij++;
			}
		}
		
		$sBestandsnaam = 'Gebruikers.xls'; // De bestandsnaam waarmee het Excel bestand moet worden opgeslagen
		header('Content-Type: application/vnd.ms-excel'); // Sla het bestand op met Excel-bestandstype
		header('Content-Disposition: attachment;filename="'.$filename.'"'); // Zeg tegen de browser dat dit een Excel-bestandstype is
		header('Cache-Control: max-age=0'); // Zorg ervoor dat dit bestand niet wordt opgeslagen in de cache
		
		// Sla op als Excel-5-bestand (xls)
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		
		// Laat de gebruiker het bestand downloaden zonder dat het eerst opgeslagen hoeft te worden op de server
		$objWriter->save('php://output');
    }	
}
>>>>>>> Ledenbeheer, Views, Assets, Models, etc.
