<?php 

class M_blog extends CI_Model{

    function tampil_blog(){
        $data=$this->db->query("SELECT post.ID_POST, post.ID_CT, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST,
                                detail_tags.ID_TAGS,
                                category.NM_CT, GROUP_CONCAT(tags.NM_TAGS) as NM_TAGS
                                FROM post, category, tags, detail_tags
                                WHERE post.ID_POST = detail_tags.ID_POST AND detail_tags.ID_TAGS = tags.ID_TAGS 
                                AND post.ID_CT = category.ID_CT
                                GROUP BY post.ID_POST
                                ORDER BY post.ID_POST ASC");
        return $data;
    }

    function tampil_kategori(){
        $data=$this->db->query("SELECT ID_CT, NM_CT FROM category ORDER BY NM_CT ASC");
        return $data;
    }

    function tampil_tags(){
        $data=$this->db->query("SELECT ID_TAGS, NM_TAGS FROM tags ORDER BY ID_TAGS ASC");
        return $data;
    }
    
    function selectMaxID_CT(){
        $query = $this->db->query("SELECT MAX(ID_CT) AS ID_CT FROM category");
        $hasil = $query->row();
        return $hasil->ID_CT;       
    }

    function tmbh_kategori($ID_CT, $NM_CT)
        {
                $this->db->query("INSERT INTO category ( ID_CT, NM_CT ) VALUES('$ID_CT', '$NM_CT')");
        }
}

?>