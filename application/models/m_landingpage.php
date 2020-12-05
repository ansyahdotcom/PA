<?php 
class M_landingpage extends CI_Model
{

    function tampil_blog_web()
    {
        $data = $this->db->query("SELECT post.ID_POST, post.ID_CT, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST,
                                post.FOTO_POST, GROUP_CONCAT(tags.NM_TAGS) AS NM_TAGS, post.ST_POST, category.NM_CT
                                FROM post, category, detail_tags, tags
                                WHERE post.ID_CT = category.ID_CT AND post.ID_POST = detail_tags.ID_POST 
                                AND detail_tags.ID_TAGS = tags.ID_TAGS AND post.ST_POST = 1
                                GROUP BY post.ID_POST
                                ORDER BY post.ID_POST ASC");
        return $data;
    }

    // pratinjau
    function tampil_dt_blog($JUDUL_POST)
    {
        $data=$this->db->query("SELECT post.ID_POST, post.ID_CT, post.JUDUL_POST, post.KONTEN_POST, 
                                post.TGL_POST, post.FOTO_POST, post.UPDT_TRAKHIR, post.ST_POST, category.NM_CT 
                                FROM post, category
                                WHERE post.ID_CT = category.ID_CT
                                AND post.JUDUL_POST =  '$JUDUL_POST'");
        return $data;
    }
    
    // tampil tags yg bawahnya judul
    function tampil_dt_tags($JUDUL_POST)
    {
        $data = $this->db->query("SELECT detail_tags.ID_POST, detail_tags.ID_TAGS, tags.NM_TAGS 
                                FROM detail_tags, tags, post 
                                WHERE detail_tags.ID_TAGS = tags.ID_TAGS
                                AND detail_tags.ID_POST = post.ID_POST
                                AND post.JUDUL_POST = '$JUDUL_POST'");
        return $data;
    }
    
    // tampil artikel yg kategori sama
    function category($NM_CT)
    {
        $data = $this->db->query("SELECT post.ID_POST, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST, 
                                    post.FOTO_POST, post.ST_POST, post.ID_CT, category.NM_CT
                                    FROM post, category
                                    WHERE post.ID_CT = category.ID_CT
                                    AND category.NM_CT = '$NM_CT'");
        return $data;
    }

    // tampil artikel yg tag sama
    function tag($NM_TAGS)
    {
        $data = $this->db->query("SELECT post.ID_POST, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST, 
                                post.FOTO_POST, post.ST_POST, post.ID_CT, category.NM_CT
                                FROM post, detail_tags, tags, category
                                WHERE post.ID_POST = detail_tags.ID_POST 
                                AND detail_tags.ID_TAGS = tags.ID_TAGS
                                AND post.ID_CT = category.ID_CT
                                AND tags.NM_TAGS = '$NM_TAGS'");
        return $data;
    }

    function kelas()
    {
        $data = $this->db->query("SELECT * FROM kelas WHERE STAT = 1");
        return $data;
    }
}
?>