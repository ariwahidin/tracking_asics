const express = require('express');
const { getCustomers, getOrderStatus } = require('../controllers/customerControllers');

const router = express.Router();

router.get('/customers', getCustomers);

router.post('/order/status', getOrderStatus);

module.exports = router;
