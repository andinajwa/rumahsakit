const express = require('express');
const router = express.Router();
const db = require('../config/database'); // Koneksi database

// Get all obat
router.get('/', (req, res) => {
    const sql = 'SELECT * FROM obat';
    db.query(sql, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ data: results });
    });
});

// Get obat by ID
router.get('/:id', (req, res) => {
    const { id } = req.params;
    const sql = 'SELECT * FROM obat WHERE id = ?';
    db.query(sql, [id], (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        if (results.length === 0) {
            return res.status(404).json({ message: 'Obat not found' });
        }
        res.json({ data: results[0] });
    });
});

// Create new obat
router.post('/', (req, res) => {
    const { nama_obat, kemasan, harga } = req.body;
    const sql = 'INSERT INTO obat (nama_obat, kemasan, harga) VALUES (?, ?, ?)';
    db.query(sql, [nama_obat, kemasan, harga], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(201).json({ message: 'Obat created', id: result.insertId });
    });
});

// Update obat
router.put('/:id', (req, res) => {
    const { id } = req.params;
    const { nama_obat, kemasan, harga } = req.body;
    const sql = 'UPDATE obat SET nama_obat = ?, kemasan = ?, harga = ? WHERE id = ?';
    db.query(sql, [nama_obat, kemasan, harga, id], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        if (result.affectedRows === 0) {
            return res.status(404).json({ message: 'Obat not found' });
        }
        res.json({ message: 'Obat updated' });
    });
});

// Delete obat
router.delete('/:id', (req, res) => {
    const { id } = req.params;
    const sql = 'DELETE FROM obat WHERE id = ?';
    db.query(sql, [id], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        if (result.affectedRows === 0) {
            return res.status(404).json({ message: 'Obat not found' });
        }
        res.json({ message: 'Obat deleted' });
    });
});

module.exports = router;
