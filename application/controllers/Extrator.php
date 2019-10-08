<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
		$busca = json_decode($busca);
		$myfile = fopen("extract_backend/extract/configuracao_busca.txt", "r");
		$estadoAtual = fread($myfile, filesize("extract_backend/extract/configuracao_busca.txt"));
		fclose($myfile);
		if ($estadoAtual == '') {
			$busca->fila = 1;
			$output = json_encode(array($busca));
		} else {
			$output = json_decode($estadoAtual);
			$validacao = true;
			foreach($output as $item) {
				if ($item->cnaes == $busca->cnaes && $item->estados == $busca->estados && $item->tamanhos == $busca->tamanhos) {
					$validacao = false;
				}
			}
			if ($validacao) {
				$busca->fila = end($output)->fila + 1;
				array_push($output, $busca);
			}
			$output = json_encode($output);
		}
		$myfile = fopen("extract_backend/extract/configuracao_busca.txt", "w");
		if (fwrite($myfile, $output) && $estadoAtual == '') {

			// $command = escapeshellcmd('python extract_backend/helper/functions.py');
			// shell_exec($command);

		}
		fclose($myfile);
	}

	public function limpar_fila() {
		if ($this->input->post('link')) {

			$link = $this->input->post('link');
			$link = base_url('assets/download/'.$link);

			$myfile = fopen("extract_backend/extract/configuracao_busca.txt", "r");
			$estadoAtual = fread($myfile, filesize("extract_backend/extract/configuracao_busca.txt"));
			fclose($myfile);

			$estadoAtual = json_decode($estadoAtual);
			$email = $estadoAtual[0]->email;
			unset($estadoAtual[0]);
			$output = array();

			if (count($estadoAtual) > 0) {
				foreach($estadoAtual as $estado) {
					array_push($output, $estado);
				}
				$output = json_encode($output);
			} else {
				$output = '';
			}

			$myfile = fopen("extract_backend/extract/configuracao_busca.txt", "w");
			fwrite($myfile, $output);
			fclose($myfile);

			$this->load->library('email');
			$this->email->from('teste@teste.com.br', 'InExtractor');
			$this->email->to($email);
			$this->email->subject('Link para download da extração');
			$this->email->message($link);
			$this->email->send();
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
