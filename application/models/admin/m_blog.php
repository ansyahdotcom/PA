<?php

class M_blog extends CI_Model
{

    function tampil_blog()
    {
        $data = $this->db->query("SELECT post.ID_POST, post.ID_CT, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST,
                                post.FOTO_POST, post.ST_POST, GROUP_CONCAT(tags.NM_TAGS) AS NM_TAGS, category.NM_CT
                                FROM post, category, detail_tags, tags
                                WHERE post.ID_CT = category.ID_CT AND post.ID_POST = detail_tags.ID_POST 
                                AND detail_tags.ID_TAGS = tags.ID_TAGS
                                GROUP BY post.ID_POST
                                ORDER BY post.ID_POST DESC");
        return $data;
    }

    // tampil kategori di select
    function tampil_kategori()
    {
        $data = $this->db->query("SELECT ID_CT, NM_CT FROM category ORDER BY NM_CT ASC");
        return $data;
    }

    // tampil tags di select
    function tampil_tags()
    {
        $data = $this->db->query("SELECT ID_TAGS, NM_TAGS FROM tags ORDER BY ID_TAGS ASC");
        return $data;
    }

    // tampil tags yg bawahnya judul
    function tampil_dt_tags($ID_POST)
    {
        $data = $this->db->query("SELECT detail_tags.ID_POST, detail_tags.ID_TAGS, tags.NM_TAGS 
                                FROM detail_tags, tags 
                                WHERE detail_tags.ID_TAGS = tags.ID_TAGS
                                AND detail_tags.ID_POST = '$ID_POST'");
        return $data;
    }

    // nyari data id post terakhir
    function selectMaxID_POST()
    {
        $query = $this->db->query("SELECT MAX(ID_POST) AS ID_POST FROM post");
        $hasil = $query->row();
        return $hasil->ID_POST;
    }

    // nyari data id kategori terakhir
    function selectMaxID_CT()
    {
        $query = $this->db->query("SELECT MAX(ID_CT) AS ID_CT FROM category");
        $hasil = $query->row();
        return $hasil->ID_CT;
    }

    // tambah kategori
    function tmbh_kategori($ID_CT, $NM_CT)
    {
        $this->db->query("INSERT INTO category ( ID_CT, NM_CT ) VALUES('$ID_CT', '$NM_CT')");
    }

    // nyari data id tag terakhir
    function selectMaxID_TAGS()
    {
        $query = $this->db->query("SELECT MAX(ID_TAGS) AS ID_TAGS FROM tags");
        $hasil = $query->row();
        return $hasil->ID_TAGS;
    }

    // tambah tag
    function buat_tags($ID_TAGS, $NM_TAGS)
    {
        $this->db->query("INSERT INTO tags ( ID_TAGS, NM_TAGS ) VALUES ('$ID_TAGS', '$NM_TAGS')");
    }
    
    // proses posting
    function posting($ST_POST, $ID_POST)
    {
        $this->db->query("UPDATE post SET ST_POST = '$ST_POST' WHERE ID_POST = '$ID_POST'");
    }

    // pratinjau
    function tampil_dt_blog($ID_POST)
    {
        $data=$this->db->query("SELECT post.ID_POST, post.ID_CT, post.JUDUL_POST, post.KONTEN_POST, 
                                post.TGL_POST, post.FOTO_POST, post.UPDT_TRAKHIR, post.ST_POST, category.NM_CT 
                                FROM post, category
                                WHERE post.ID_CT = category.ID_CT
                                AND post.ID_POST =  '$ID_POST'");
        return $data;
    }

    // tampil artikel yg kategori sama
    function post_ktg($NM_CT)
    {
        $data = $this->db->query("SELECT post.ID_POST, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST, 
                                    post.FOTO_POST, post.ST_POST, post.ID_CT, category.NM_CT
                                    FROM post, category
                                    WHERE post.ID_CT = category.ID_CT
                                    AND category.NM_CT = '$NM_CT'");
        return $data;
    }

    // tampil artikel yg tag sama
    function post_tag($NM_TAGS)
    {
        $data = $this->db->query("SELECT post.ID_POST, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST, 
                                    post.FOTO_POST, post.ST_POST
                                    FROM post, detail_tags, tags
                                    WHERE post.ID_POST = detail_tags.ID_POST AND detail_tags.ID_TAGS = tags.ID_TAGS
                                    AND tags.NM_TAGS = '$NM_TAGS'");
        return $data;
    }

    function tmbh_blog($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function tmbh_dt_tags($dt_tags, $table)
    {
        $this->db->insert($table, $dt_tags);
    }

    function hapus_artikel_dttags($ID_POST)
    {
        $this->db->query("DELETE FROM detail_tags WHERE ID_POST = '$ID_POST'");
    }

    function hapus_artikel_post($ID_POST)
    {
        $this->db->query("DELETE FROM post WHERE ID_POST = '$ID_POST'");
    }

    function edit_artikel($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_artikel($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function update_dt_tags($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
