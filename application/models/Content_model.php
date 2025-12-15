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

    // --- EXTERNAL LINKS ---
    public function getLinks() {
        return $this->db->get('master_link')->result();
    }

    public function insertLink($data) {
        return $this->db->insert('master_link', $data);
    }

    public function deleteLink($id) {
        return $this->db->delete('master_link', ['id_link' => $id]);
    }

    // --- GET BY ID & UPDATE METHODS (ADDED) ---
    
    // Gallery
    public function getGalleryById($id) {
        return $this->db->get_where('master_gallery', ['id_gallery' => $id])->row();
    }

    public function updateGallery($id, $data) {
        $this->db->where('id_gallery', $id);
        return $this->db->update('master_gallery', $data);
    }

    // Quotes
    public function getQuoteById($id) {
        return $this->db->get_where('quotes', ['id_quote' => $id])->row();
    }

    public function updateQuote($id, $data) {
        $this->db->where('id_quote', $id);
        return $this->db->update('quotes', $data);
    }

    // Links
    public function getLinkById($id) {
        return $this->db->get_where('master_link', ['id_link' => $id])->row();
    }

    public function updateLink($id, $data) {
        $this->db->where('id_link', $id);
        return $this->db->update('master_link', $data);
    }
}
