<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Extrator_model extends CI_model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * GET
     */
    public function getEstados() {
        $this->db->order_by('sigla', 'ASC');
        return $this->db->get('estados')->result();
    }

    public function getPortes() {
        $this->db->order_by('descricao', 'ASC');
        return $this->db->get('porte_empresa')->result();
    }

    public function getCnaesAutocomplete($word = null) {
        $this->db->like('codigo_cnae', $word);
        $this->db->or_like('desc_cnae', $word);
        $this->db->limit(5);
        return $this->db->get('cnaes')->result();
    }
}