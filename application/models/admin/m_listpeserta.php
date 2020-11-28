<?php

class M_listpeserta extends CI_Model
{
    function tampil()
    {
        $data = $this->db->query("SELECT detail_kelas.ID_PS, detail_kelas.ID_KLS, kelas.TITTLE, peserta.NM_PS, peserta.HP_PS
                                    FROM kelas, detail_kelas, peserta
                                    WHERE detail_kelas.ID_KLS = kelas.ID_KLS AND detail_kelas.ID_PS = peserta.ID_PS");
        return $data;
    }

    //hapus peserta dari list
    public function hapus_listpeserta($ID_KLS)
    {
        $hasil = $this->db->query("DELETE FROM detail_kelas WHERE ID_KLS='$ID_KLS'");
        return $hasil;
    }
}
