const express = require('express');
const router = express.Router();
const db = require('../config/database'); // Koneksi database

// Get all patients
router.get('/', (req, res) => {
    const sql = 'SELECT * FROM pasien';
    db.query(sql, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ data: results });
    });
});

// Add a new patient
router.post('/', (req, res) => {
    const { nama, alamat, no_ktp, no_hp, no_rm } = req.body;
    const sql = 'INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm) VALUES (?, ?, ?, ?, ?)';
    db.query(sql, [nama, alamat, no_ktp, no_hp, no_rm], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(201).json({ message: 'Pasien berhasil ditambahkan.', id: result.insertId });
    });
});

// Update a patient
router.put('/:id', (req, res) => {
    const { id } = req.params;
    const { nama, alamat, no_ktp, no_hp } = req.body;
    const sql = 'UPDATE pasien SET nama = ?, alamat = ?, no_ktp = ?, no_hp = ? WHERE id = ?';
    db.query(sql, [nama, alamat, no_ktp, no_hp, id], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Pasien berhasil diupdate.' });
    });
});

// Delete a patient
router.delete('/:id', (req, res) => {
    const { id } = req.params;
    const sql = 'DELETE FROM pasien WHERE id = ?';
    db.query(sql, [id], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Pasien berhasil dihapus.' });
    });
});

module.exports = router;
