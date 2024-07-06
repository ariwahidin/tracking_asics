const { getDbConnection } = require('../config/dbConfig');

const getOrder = (req, res) => {

    const spk = req.body.spk;
    const db = getDbConnection(spk);

    if (!db) {
        res.status(400).send('Invalid SPK provided');
        return;
    }

    db.connect((err) => {
        if (err) {
            console.error('Error connecting to the database:', err);
            return res.status(500).json({ success: false, message: 'Database connection error' });
        }

        const sql = `
            SELECT DISTINCT a.order_id, a.delivery_no, a.ship_to, a.destination_city, 
            b.cust_name, b.cust_addr1,
            (SELECT order_status FROM order_d_status 
            WHERE order_id = a.order_id 
            AND ship_to = a.ship_to
            AND order_status = 'truck_arrival'
            ) AS arrival_status,
            (SELECT order_status FROM order_d_status 
            WHERE order_id = a.order_id 
            AND ship_to = a.ship_to
            AND order_status = 'truck_unloading'
            ) AS unloading_status
            FROM order_d a
            INNER JOIN customer b ON a.ship_to = b.cust_id
            WHERE a.order_id = ?
            GROUP BY a.ship_to
        `;

        db.query(sql, [spk], (err, results) => {
            if (err) {
                console.error('Error executing query:', err);
                return res.status(500).json({ success: false, message: 'Error executing query' });
            }
            res.json({ success: true, data: results });
        });
    });
};

const getOrderStatus = (req, res) => {

    const spk = req.body.order_id; // Ambil spk dari body request
    const shipTo = req.body.ship_to; // Ambil ship_to dari body request
    const db = getDbConnection(spk);

    if (!db) {
        res.status(400).send('Invalid SPK provided');
        return;
    }

    db.connect(err => {
        if (err) {
            console.error('Error connecting to the database:', err);
            res.status(500).send('Error connecting to the database');
            return;
        }

        const query = 'SELECT * FROM order_d_status WHERE order_id = ? AND ship_to = ?';
        db.query(query, [spk, shipTo], (err, results) => {
            if (err) {
                console.error('Error executing query:', err);
                res.status(500).send('Error executing query');
                return;
            }
            // Hasil dari query akan disimpan dalam variabel data
            const data = results;

            // Menyiapkan respons JSON
            const response = {
                success: true,
                data: data
            };

            // Mengirimkan respons JSON ke client
            res.json(response);

            // Mengakhiri koneksi database setelah selesai
            db.end();
        });
    });
};

const saveStatusOrder = (req, res) => {
    // console.log(req.body);
    const { spk, ship_to, delivery_no, lokasi_terkini, status, user_lat, user_lon, user_address, user_name } = req.body;
    const date = new Date().toISOString().slice(0, 19).replace('T', ' ');
    const db = getDbConnection(spk);

    if (!db) {
        return res.status(400).json({ success: false, message: 'Invalid SPK provided' });
    }

    const where = {
        order_id: spk,
        ship_to: ship_to,
        order_status: 'goods arrived'
    };

    db.connect((err) => {
        if (err) {
            console.error('Error connecting to the database:', err);
            return res.status(500).json({ success: false, message: 'Database connection error' });
        }

        // Check existing order status
        const checkQuery = `SELECT * FROM order_d_status WHERE order_id = ? AND ship_to = ? AND order_status = 'goods arrived'`;
        db.query(checkQuery, [spk, ship_to], (err, results) => {
            if (err) {
                console.error('Error executing query:', err);
                return res.status(500).json({ success: false, message: 'Error executing query' });
            }

            if (results.length < 1) {
                const data = {
                    order_id: spk,
                    ship_to: ship_to,
                    delivery_no: delivery_no,
                    lokasi_terkini: lokasi_terkini,
                    order_status: status,
                    lat: user_lat,
                    lon: user_lon,
                    address: user_address,
                    created_date: date,
                    created_by: user_name
                };

                db.query('INSERT INTO order_d_status SET ?', data, (err, results) => {
                    if (err) {
                        console.error('Error executing query:', err);
                        return res.status(500).json({ success: false, message: 'Error executing query' });
                    }
                    res.json({ success: true, message: 'Order status updated successfully' });
                });
            } else {
                res.json({ success: false, message: 'Order status already exists' });
            }
        });
    });
};

module.exports = { getOrder, getOrderStatus, saveStatusOrder };
