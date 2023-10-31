const express = require('express');
const axios = require('axios'); // Corrected 'cosnt' to 'const'
const app = express();
const port = 3000;

const NASA_API_KEY = 'EdWZOr34SJtc61cIhacsqeCYCGBjuwNx3OP5Fdo5';

app.use(express.static('public'));
app.get('/api', async (req, res) => {
    try {
        const response = await axios.get(
            `https://api.nasa.gov/planetary/apod?api_key=${NASA_API_KEY}`
        );
        const { title, url } = response.data;
        res.json({ title, url });
    } catch (error) {
        res.status(500).json({ error: 'Ya hubo pedo' });
    }
});

app.listen(port, () => {
    console.log(`App listening on port ${port}`);
});
