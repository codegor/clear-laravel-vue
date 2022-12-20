import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 register: fetch('/api/register', {method: 'POST', headers: {'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest'}, body: JSON.stringify({name: 'I', email: 'tt@wer.re', passwordd: '123123'})})
 login: fetch('/api/login', {method: 'POST', headers: {'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest'}, body: JSON.stringify({email: 'tt@wer.re', password: '123123'})})

 all: fetch('/api/users', {method: 'GET', headers: {'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization' : 'Bearer 2|urOnzB9Hc5YKs8R5QJs8fecN6iJZWaLJ4e5nA7BC'}})
 create: fetch('/api/users', {method: 'POST', headers: {'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization' : 'Bearer 2|urOnzB9Hc5YKs8R5QJs8fecN6iJZWaLJ4e5nA7BC'}, body: JSON.stringify({name: 'thri', email: 'weyr@wer.re', password: '123123'})})
 update: ch('/api/users/2', {method: 'PUT', headers: {'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization' : 'Bearer 2|urOnzB9Hc5YKs8R5QJs8fecN6iJZWaLJ4e5nA7BC'}, body: JSON.stringify({name: 'You',})})
 delete: fetch('/api/users/3', {method: 'DELETE', headers: {'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization' : 'Bearer 2|urOnzB9Hc5YKs8R5QJs8fecN6iJZWaLJ4e5nA7BC'}})
*/

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
