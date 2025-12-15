<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends CI_Model {
    
    // --- Slider ---
    public function getSlider() {
        return $this->db->order_by('urutan', 'ASC')->get('master_slider')->result();
    }
    
    public function getActiveSlider() {
        return $this->db->where('active', 1)->order_by('urutan', 'ASC')->get('master_slider')->result();
    }

    public function insertSlider($data) {
        return $this->db->insert('master_slider', $data);
    }
    
    public function updateSlider($id, $data) {
        $this->db->where('id_slider', $id);
        return $this->db->update('master_slider', $data);
    }

    public function getSliderById($id) {
        return $this->db->get_where('master_slider', ['id_slider' => $id])->row();
    }

    public function deleteSlider($id) {
        $this->db->where('id_slider', $id);
        return $this->db->delete('master_slider');
    }

    // --- Gallery ---
    public function getGallery($limit = null) {
        $this->db->order_by('created_at', 'DESC');
        if($limit) $this->db->limit($limit);
        return $this->db->get('master_gallery')->result();
    }

    public function insertGallery($data) {
        return $this->db->insert('master_gallery', $data);
    }

    public function deleteGallery($id) {
        $this->db->where('id_gallery', $id);
        return $this->db->delete('master_gallery');
    }

    // --- Quotes ---
    public function getQuotes() {
        return $this->db->get('quotes')->result();
    }

    public function insertQuote($data) {
        return $this->db->insert('quotes', $data);
    }

    public function deleteQuote($id) {
        $this->db->where('id_quote', $id);
        return $this->db->delete('quotes');
    }
}
