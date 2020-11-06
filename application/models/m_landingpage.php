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
}
?>