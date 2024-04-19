

# Gardening Booking System

## Overview

This web application is designed for a small gardening business to manage bookings, customer information, and service details. It allows users to book gardening services, manage customer information, and update service details. The application uses HTML, CSS, JavaScript, PHP, and MySQL to create an interactive and user-friendly experience.

## Features

- **Booking Form**: Users can book gardening services by selecting a customer, service, date, and time worked.
- **Customer Management**: Users can add, edit, and delete customer information.
- **Service Management**: Users can add, edit, and delete service details.
- **All Bookings Display**: Users can view all bookings in a table format and edit each booking.

## Setup

### Prerequisites

- Web server (e.g., Apache)
- PHP (version 7.x or higher)
- MySQL database

### Installation Steps

1. **Clone the Repository**

    ```bash
    git clone https://github.com/yourusername/gardening-booking-system.git
    ```

2. **Database Setup**

    - Create a new database named `gardening`.
    - Import the `gardening.sql` file into the `gardening` database to create the necessary tables.

3. **Configuration**

    - Update the database connection settings in the PHP files (`submit_customer.php`, `submit_service.php`, `submit_booking.php`, `display_bookings.php`, `edit_booking.php`) to match your MySQL server configuration.

4. **Run the Application**

    - Start your web server and navigate to the project directory in your web browser.
    - Open `booking.html` to access the booking form and `display_bookings.php` to view all bookings.

## File Structure

```
/gardening-booking-system
|-- booking.html
|-- submit_customer.php
|-- submit_service.php
|-- submit_booking.php
|-- fetch_data.php
|-- display_bookings.php
|-- edit_booking.php
|-- update_booking.php
|-- gardening.sql
|-- README.md
|-- styles.css
```

- `booking.html`: Main booking form page.
- `submit_customer.php`: PHP script to add new customer information to the database.
- `submit_service.php`: PHP script to add new service details to the database.
- `submit_booking.php`: PHP script to handle booking form submissions and insert new booking records into the database.
- `fetch_data.php`: PHP script to fetch customer and service data from the database.
- `display_bookings.php`: PHP script to display all bookings in a table format.
- `edit_booking.php`: PHP script to edit existing booking details.
- `update_booking.php`: PHP script to update booking details in the database.
- `gardening.sql`: SQL file containing database schema and sample data.
- `README.md`: This file providing an overview and instructions for the application.
- `styles.css`: CSS file containing styles for the web application.
