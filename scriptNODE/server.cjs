const axios = require('axios');

const apiUrl = 'http://localhost:8000/api/temperaturas'; // Substitua pela URL da sua API Laravel

axios.get(apiUrl)
    .then(response => {
        console.log('Dados da API do Laravel:', response.data);
    })
    .catch(error => {
        console.error('Erro ao acessar a API do Laravel:', error);
    });
