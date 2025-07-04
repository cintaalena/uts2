<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model {

    // Ambil soal berdasarkan level
    public function get_questions_by_level($level) {
        $this->db->where('level', $level);
        $query = $this->db->get('questions');
        return $query->result_array();
    }

    // Ambil soal berdasarkan ID
    public function get_question_by_id($question_id) {
        $this->db->where('id', $question_id);
        $query = $this->db->get('questions');
        return $query->row_array();
    }

    // Simpan jawaban pengguna
    public function save_answer($user_id, $question_id, $user_answer, $is_correct) {
        $data = array(
            'user_id' => $user_id,
            'question_id' => $question_id,
            'user_answer' => $user_answer,
            'is_correct' => $is_correct
        );
        $this->db->insert('user_answers', $data);
    }
}
