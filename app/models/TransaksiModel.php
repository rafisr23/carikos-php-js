<?php
class TransaksiModel {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTransaksi() {
        $query = "SELECT * FROM transaksi INNER JOIN users ON transaksi.id_user = users.id_user INNER JOIN kamar_kost ON transaksi.id_kamar = kamar_kost.id_kamar";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getTransaksiById($id) {
        $query = "SELECT * FROM transaksi WHERE id_transaksi = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function storeTransaksi($data) {
        $query = "INSERT INTO transaksi(id_transaksi, id_user, id_kamar, tgl_sewa_awal, tgl_sewa_akhir, total_harga, tgl_bayar) VALUES (null, :id_user, :id_kamar, :tgl_sewa_awal, :tgl_sewa_akhir, :total_harga, :tgl_bayar)";

        $this->db->query($query);
        $this->db->bind('id_user', $data["id_user"]);
        $this->db->bind('id_kamar', $data["id_kamar"]);
        $this->db->bind('tgl_sewa_awal', $data["tgl_sewa_awal"]);
        $this->db->bind('tgl_sewa_akhir', $data["tgl_sewa_akhir"]);
        $this->db->bind('total_harga', $data["total_harga"]);
        $this->db->bind('tgl_bayar', $data["tgl_bayar"]);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteTransaksi($id) {
        $query = "DELETE FROM transaksi WHERE id_transaksi = :id_transaksi";

        $this->db->query($query);
        $this->db->bind('id_transaksi', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateTransaksi($data) {
        $query = "UPDATE transaksi SET 
        id_user = :id_user, 
        id_kamar = :id_kamar, 
        tgl_sewa_awal = :tgl_sewa_awal, 
        tgl_sewa_akhir = :tgl_sewa_akhir, 
        total_harga = :total_harga, 
        tgl_bayar = :tgl_bayar 
        WHERE id_transaksi = :id_transaksi";

        $this->db->query($query);
        $this->db->bind('id_transaksi', $data["id_transaksi"]);
        $this->db->bind('id_user', $data["id_user"]);
        $this->db->bind('id_kamar', $data["id_kamar"]);
        $this->db->bind('tgl_sewa_awal', $data["tgl_sewa_awal"]);
        $this->db->bind('tgl_sewa_akhir', $data["tgl_sewa_akhir"]);
        $this->db->bind('total_harga', $data["total_harga"]);
        $this->db->bind('tgl_bayar', $data["tgl_bayar"]);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
?>