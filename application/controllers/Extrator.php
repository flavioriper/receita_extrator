<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extrator extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('extrator_model');
    }

	public function index()
	{
		$data['sectionTitle'] = 'Escolha os filtros';
		$data['style'] = 'extrator/style';
		$data['script'] = 'extrator/script';

		$data['estados'] = $this->extrator_model->getEstados();
		$data['portes'] = $this->extrator_model->getPortes();
		
		$this->load->view('template/header', $data);
		$this->load->view('extrator/extrator');
		$this->load->view('template/footer');
	}

	public function registrar_consulta() {
		$busca = $this->input->post('busca');
		$myfile = fopen("extract_backend/extract/configuracao_busca.txt", "r");
		$estadoAtual = fread($myfile, filesize("extract_backend/extract/configuracao_busca.txt"));
		$estadoAtual = json_decode($estadoAtual);
		fclose($myfile);
		if ($estadoAtual->ocupado == 0) {
			$myfile = fopen("extract_backend/extract/configuracao_busca.txt", "w");
			if (fwrite($myfile, $busca)) {

				// $command = escapeshellcmd('python extract_backend/helper/functions.py');
				// shell_exec($command);

			}
			fclose($myfile);
		} else {
			echo '400';
		}
	}

	public function get_cnaes() {
		if (isset($_GET['term'])) {
			$word = $_GET['term'];
			$resultado = $this->extrator_model->getCnaesAutocomplete($word);
			foreach($resultado as $cnae) {
				$row_set[] = array('label' => $cnae->codigo_cnae.' | Ramo: '.$cnae->desc_cnae, 'id' => $cnae->codigo_cnae);
			}
			echo json_encode($row_set);
		}
	}
}
