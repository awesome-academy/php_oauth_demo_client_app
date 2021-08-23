window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
    //
}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

$(document).ready(function () {
    axios.get('/oauth/clients')
    .then(response => {
        console.log(response.data);
        let html = '';
        for (var i = response.data.length - 1; i >= 0; i--) {
            html += `<div class="table-row-group text-center">
                        <div class="table-cell border p-3">
                            ${response.data[i].name}
                        </div>
                        <div class="table-cell border p-3">
                            ${response.data[i].redirect}
                        </div>
                        <div class="table-cell border p-3">
                            <button data-id="${response.data[i].id}"
                                class="js-delete-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Delete
                            </button>
                        </div>
                        <div class="table-cell border p-3">
                            <form method="get" action="/redirect">
                                <input type="hidden" value="${response.data[i].id}" name="id">
                                <input type="hidden" value="${response.data[i].redirect}" name="redirect">
                                <button
                                    class="js-delete-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Redirect
                                </button>
                            </form>
                        </div>
                    </div>`;
        }
        $('#client-table').append(html);
    });

    $(document).on('click', '.js-delete-btn', function () {
        let self = this;
        let clientId = $(self).data('id');
        axios.delete('/oauth/clients/' + clientId)
            .then(response => {
                console.log(response);
                $(self).closest('.table-row-group').remove();
            });
    });

    $('#create-client-btn').click(function () {
        let data = {
            name: $('#name').val(),
            redirect: $('#callback').val(),
        };
        console.log(data);

        axios.post('/oauth/clients', data)
            .then(response => {
                console.log(response.data);
            })
            .catch (response => {
                console.log(response);
            });
    });
});
