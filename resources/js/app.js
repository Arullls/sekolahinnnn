import './bootstrap';
import axios from 'axios';

window.axios = axios;

// Set default header supaya Laravel bisa validasi CSRF token dan request ajax aman
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const token = document.head.querySelector('meta[name="csrf-token"]');
axios.defaults.withCredentials = true;

  

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found!');
}

