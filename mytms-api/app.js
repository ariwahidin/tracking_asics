const express = require('express');
const cors = require('cors');
const guestRoutes = require('./routes/guestRoutes');

const app = express();
const port = 3000;

// Enable CORS
app.use(cors());

// Enable JSON body parsing
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Use customer routes
app.use('/mytms-api', guestRoutes);

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});