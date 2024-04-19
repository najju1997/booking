fetch('fetch_data.php')
.then(response => response.json())
.then(data => {
    const customerSelect = document.getElementById('customer');
    const serviceSelect = document.getElementById('service');

    // Populate Customer dropdown
    data.customers.forEach(customer => {
        const option = document.createElement('option');
        option.value = customer.CUSTOMER_ID;
        option.textContent = customer.CUSTOMER_NAME;
        customerSelect.appendChild(option);
    });

    // Populate Service dropdown
    data.services.forEach(service => {
        const option = document.createElement('option');
        option.value = service.SERVICE_ID;
        option.textContent = service.SERVICE_NAME;
        serviceSelect.appendChild(option);
    });
})
.catch(error => {
    console.error('Error fetching data:', error);
});