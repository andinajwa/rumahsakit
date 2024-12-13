const express = require("express");
const router = express.Router();
const db = require("../config/database"); // Sesuaikan dengan konfigurasi koneksi database Anda

// GET semua dokter
router.get("/", (req, res) => {
    const query = `SELECT dokter.id, dokter.nama, dokter.alamat, dokter.no_hp, poli.nama_poli
                   FROM dokter 
                   INNER JOIN poli ON dokter.id_poli = poli.id`;

    db.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
});

// GET dokter berdasarkan ID
router.get("/:id", (req, res) => {
    const query = `SELECT dokter.id, dokter.nama, dokter.alamat, dokter.no_hp, poli.nama_poli
                   FROM dokter 
                   INNER JOIN poli ON dokter.id_poli = poli.id
                   WHERE dokter.id = ?`;
    db.query(query, [req.params.id], (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results[0]);
    });
});

// POST tambah dokter baru
router.post("/", (req, res) => {
    const { nama, alamat, no_hp, id_poli } = req.body;
    const query = `INSERT INTO dokter (nama, alamat, no_hp, id_poli) VALUES (?, ?, ?, ?)`;
    db.query(query, [nama, alamat, no_hp, id_poli], (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(201).json({ message: "Dokter berhasil ditambahkan", id: results.insertId });
    });
});

// PUT ubah data dokter
router.put("/:id", (req, res) => {
    const { nama, alamat, no_hp, id_poli } = req.body;
    const query = `UPDATE dokter SET nama = ?, alamat = ?, no_hp = ?, id_poli = ? WHERE id = ?`;
    db.query(query, [nama, alamat, no_hp, id_poli, req.params.id], (err) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: "Data dokter berhasil diubah" });
    });
});

// DELETE dokter berdasarkan ID
router.delete("/:id", (req, res) => {
    const query = `DELETE FROM dokter WHERE id = ?`;
    db.query(query, [req.params.id], (err) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: "Dokter berhasil dihapus" });
    });
});

module.exports = router;
