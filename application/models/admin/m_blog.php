<?php

class M_blog extends CI_Model
{

    function tampil_blog()
    {
        $data = $this->db->query("SELECT post.ID_POST, post.ID_CT, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST,
                                detail_tags.ID_TAGS,
                                category.NM_CT, GROUP_CONCAT(tags.NM_TAGS) as NM_TAGS
                                FROM post, category, tags, detail_tags
                                WHERE post.ID_POST = detail_tags.ID_POST AND detail_tags.ID_TAGS = tags.ID_TAGS 
                                AND post.ID_CT = category.ID_CT
                                GROUP BY post.ID_POST
                                ORDER BY post.ID_POST ASC");
        return $data;
    }

    function tampil_kategori()
    {
        $data = $this->db->query("SELECT ID_CT, NM_CT FROM category ORDER BY NM_CT ASC");
        return $data;
    }

    function tampil_tags()
    {
        $data = $this->db->query("SELECT ID_TAGS, NM_TAGS FROM tags ORDER BY NM_TAGS ASC");
        return $data;
    }

    function selectMaxID_POST()
    {
        $query = $this->db->query("SELECT MAX(ID_POST) AS ID_POST FROM post");
        $hasil = $query->row();
        return $hasil->ID_POST;
    }

    function selectMaxID_CT()
    {
        $query = $this->db->query("SELECT MAX(ID_CT) AS ID_CT FROM category");
        $hasil = $query->row();
        return $hasil->ID_CT;
    }

    function tmbh_kategori($ID_CT, $NM_CT)
    {
        $this->db->query("INSERT INTO category ( ID_CT, NM_CT ) VALUES('$ID_CT', '$NM_CT')");
    }

    function selectMaxID_TAGS()
    {
        $query = $this->db->query("SELECT MAX(ID_TAGS) AS ID_TAGS FROM tags");
        $hasil = $query->row();
        return $hasil->ID_TAGS;
    }

    function buat_tags($ID_TAGS, $NM_TAGS)
    {
        $this->db->query("INSERT INTO tags ( ID_TAGS, NM_TAGS ) VALUES ('$ID_TAGS', '$NM_TAGS')");
    }

    function tmbh_blog($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function tmbh_dt_tags($dt_tags, $table)
    {
        $this->db->insert($table, $dt_tags);
    }

    function hapus_artikel_dttags($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function hapus_artikel_post($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
