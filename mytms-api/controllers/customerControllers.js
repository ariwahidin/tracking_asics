const { getDbConnection } = require('../config/dbConfig');

const getCustomers = (req, res) => {
    const spk = req.query.spk;
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

        const query = 'SELECT DISTINCT cust_id, cust_name FROM customer';
        db.query(query, (err, results) => {
            if (err) {
                console.error('Error executing query:', err);
                res.status(500).send('Error executing query');
                return;
            }
            res.json(results);
            db.end(); // Close the connection after query
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


module.exports = { getCustomers, getOrderStatus };
