const express = require('express');
const { getOrder, getOrderStatus, saveStatusOrder} = require('../controllers/guestControllers');

const router = express.Router();

router.post('/order/get', getOrder);
router.post('/order/status', getOrderStatus);
router.post('/status/save', saveStatusOrder);

module.exports = router;
