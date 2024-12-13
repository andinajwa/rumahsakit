const express = require("express");
const router = express.Router();

//import express validator
const { body, validationResult } = require("express-validator");
//import database
const connection = require("../config/database");

/**
 * INDEX POSTS
 */
router.get("/", function (req, res) {
    //query
    connection.query("SELECT * FROM poli", function (err, rows) {
        if (err) {
            return res.status(500).json({
                status: false,
                message: "Internal Server Error",
            });
        } else {
            return res.status(200).json({
                status: true,
                message: "List Data Posts",
                data: rows,
            });
        }
    });
});

//tambah data
router.post(
    "/simpan",
    [body("nama_poli").notEmpty(), body("keterangan").notEmpty()],
    (req, res) => {
        const errors = validationResult(req);

        if (!errors.isEmpty()) {
            return res.status(422).json({
                errors: errors.array(),
            });
        }

        //define formData
        let formData = {
            nama_poli: req.body.nama_poli,
            keterangan: req.body.keterangan,
        };

        // insert query
        connection.query(
            "INSERT INTO poli SET ?",
            formData,
            function (err, rows) {
                //if(err) throw err
                if (err) {
                    return res.status(500).json({
                        status: false,
                        message: "Internal Server Error",
                    });
                } else {
                    return res.status(201).json({
                        status: true,
                        message: "Insert Data Successfully",
                        data: rows[0],
                    });
                }
            }
        );
    }
);

// edit data
router.patch(
    "/update/:id",
    [
        //validation
        body("nama_poli").notEmpty(),
        body("keterangan").notEmpty(),
    ],
    (req, res) => {
        const errors = validationResult(req);

        if (!errors.isEmpty()) {
            return res.status(422).json({
                errors: errors.array(),
            });
        }

        //id post
        let id = req.params.id;

        //data post
        let formData = {
            nama_poli: req.body.nama_poli,
            keterangan: req.body.keterangan,
        };

        // update query
        connection.query(
            `UPDATE poli SET ? WHERE id = ${id}`,
            formData,
            function (err, rows) {
                //if(err) throw err
                if (err) {
                    return res.status(500).json({
                        status: false,
                        message: "Internal Server Error",
                    });
                } else {
                    return res.status(200).json({
                        status: true,
                        message: "Update Data Successfully!",
                    });
                }
            }
        );
    }
);

// delete
router.delete("/delete/(:id)", function (req, res) {
    let id = req.params.id;

    connection.query(`DELETE FROM poli WHERE id = ${id}`, function (err, rows) {
        //if(err) throw err
        if (err) {
            return res.status(500).json({
                status: false,
                message: "Internal Server Error",
            });
        } else {
            return res.status(200).json({
                status: true,
                message: "Delete Data Successfully!",
            });
        }
    });
});


module.exports = router;
