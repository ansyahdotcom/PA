<?php
    Class M_restore extends CI_Model
    {
        function droptable(){
            $check = $this->db->query("SHOW TABLES");

            if ($check->num_rows()>0) {
                $query = $this->db->query("DROP TABLE 
                admin
                ,category
                ,detail_kelas
                ,detail_materi
                ,detail_tags
                ,detil_tugas
                ,diskon
                ,kebijakan
                ,kelas
                ,kunci
                ,ktg_kelas
                ,materi
                ,materi_sub
                ,medsos
                ,navbar
                ,peserta
                ,post
                ,post_view
                ,role
                ,tags
                ,token
                ,tugas");

                return $query;
            }else {
                return true;
            }
        }
    }
?>