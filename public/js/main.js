import './theme.js';
import './form-validation.js';

async function sendData(data, url) {
  try {
    const request = await fetch(url, {
      method: 'POST',
      body: data
    });

    const result = await request.json();
    console.log(result);
  } catch (error) {
    console.error(error);
  }
}