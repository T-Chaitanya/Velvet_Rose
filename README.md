# Hotel Velvet Rose Reservation System

Welcome to the Hotel Velvet Rose Reservation System! This project is a web-based hotel management system that enables seamless hotel reservations, management of room availability, and admin functionalities for managing bookings, rooms, and pricing.

## Table of Contents
1. [Project Overview](#project-overview)
2. [Features](#features)
3. [System Components](#system-components)
4. [Installation](#installation)
5. [Usage](#usage)
6. [Testing](#testing)
7. [Future Improvements](#future-improvements)
8. [License](#license)

---

## Project Overview

The Hotel Velvet Rose Reservation System is designed to streamline hotel reservations, enhance guest satisfaction, and improve operational efficiency. Built with PHP, HTML, and MySQL, it provides functionality for both guests and hotel administrators, featuring real-time room availability, dynamic pricing, and an admin management dashboard.

---

## Features

- **Reservation Management**: Guests can book, modify, and cancel reservations.
- **Dynamic Room Availability**: Real-time updates on room availability and pricing.
- **Guest Confirmation**: Reservation confirmation with unique IDs and booking summaries.
- **Admin Dashboard**: Manage rooms, pricing, availability, and bookings.
- **Additional Pages**: Explore local attractions, view dining menus, and amenities.
- **Responsive Design**: Optimized for mobile, tablet, and desktop devices.
- **Security**: User authentication and password hashing for secure access.

---

## System Components

1. **Frontend (Presentation Layer)**:
    - User-friendly interface for guests and admin users.
    - Responsive design compatible with various devices.

2. **Backend (Application Layer)**:
    - PHP-based logic handling reservations, room management, and more.
    - Follows the MVC (Model-View-Controller) architecture.

3. **Database (MySQL)**:
    - Stores reservation details, guest information, room inventory, and user data.

4. **Security**:
    - User authentication with secure password hashing.

---

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/T-Chaitanya/Velvet_Rose.git
    ```

2. Set up the MySQL database:
    - Import the SQL file in `db/hotel_db.sql` to set up the database.

3. Configure database connection:
    - Update the `config.php` file with your database credentials.

4. Start the PHP server:
    ```bash
    php -S localhost:8000
    ```

---

## Usage

### Guest Features
- Search for available rooms by check-in and check-out dates.
- View room details, pricing, and amenities.
- Book rooms with guest information and payment details.
- Modify or cancel existing reservations.

### Admin Features
- Secure login for admin users.
- Manage room inventory: add, edit, and delete rooms.
- Set and update room pricing.
- Monitor guest reservations and booking statuses.

---

## Testing

### Guest Module
- Test booking functionality with valid and invalid data.
- Verify dynamic room availability updates.
- Test reservation modification and cancellation workflows.

### Admin Module
- Test login functionality for admin users.
- Test room management features (add, edit, delete).
- Verify pricing updates and booking management.

---

## Future Improvements

- **Enhanced User Interface**: Modernize the UI with more interactive elements using frameworks like React.
- **Password Policy**: Implement a stronger password policy and indicators for user registration.
- **Role-Based Access Control**: Implement role-based permissions for staff and administrators.
- **Real-Time Validation**: Add JavaScript-based real-time form validation to improve user experience.

---

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

---
