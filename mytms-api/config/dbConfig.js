const mysql = require('mysql2');

const databases = {
    'SPKNV': {
        host: 'localhost',
        user: 'root',
        password: 'password',
        database: 'tms_navya_dev'
    },
    'SPKAS': {
        host: 'localhost',
        user: 'root',
        password: 'password',
        database: 'tms_asics'
    },
    'SPKBS': {
        host: 'localhost',
        user: 'root',
        password: 'password',
        database: 'tms_asics'
    }
};

const getDbConnection = (spk) => {
    const prefix = spk.substring(0, 5); // Extract prefix
    const dbConfig = databases[prefix];
    if (!dbConfig) {
        return null;
    }
    return mysql.createConnection(dbConfig);
};

module.exports = { getDbConnection };
