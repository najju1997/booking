document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = document.getElementById('bookingForm');
    const customerForm = document.getElementById('customerForm');
    const serviceForm = document.getElementById('serviceForm');

    if (bookingForm) {
        bookingForm.addEventListener('submit', function(event) {
            const customer = document.getElementById('customer').value;
            const service = document.getElementById('service').value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;

            if (!customer || !service || !date || !time) {
                alert('All fields are required!');
                event.preventDefault();
            }
        });
    }

    if (customerForm) {
        customerForm.addEventListener('submit', function(event) {
            const customerName = document.getElementById('customerName').value;
            const address = document.getElementById('address').value;
            const phone = document.getElementById('phone').value;

            if (!customerName || !address || !phone) {
                alert('All fields are required!');
                event.preventDefault();
            }
        });
    }

    if (serviceForm) {
        serviceForm.addEventListener('submit', function(event) {
            const serviceName = document.getElementById('serviceName').value;
            const price = document.getElementById('price').value;

            if (!serviceName || !price) {
                alert('All fields are required!');
                event.preventDefault();
            }
        });
    }
});
