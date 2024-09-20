# Employee Management System

## Overview
The Employee Management System is a web application designed to manage employees, their personal information, and performance evaluations. It includes different dashboards for employees, managers, and administrators, each with specific functionalities.

## Features
- **Employee Dashboard**: View and update personal information, view performance evaluations.
- **Manager Dashboard**: Search and sort employees, manage performance evaluations.
- **Admin Dashboard**: Manage users and departments.

## Technologies Used
- PHP
- HTML/CSS
- MySQL

## Setup Instructions

### Prerequisites
- PHP 8
- MySQL
- Web server Apache

### Installation
1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/EmployeeManagementSystem.git
    cd EmployeeManagementSystem
    ```

2. Import the database:
    - Create a new database in MySQL.
    - Import the provided SQL file to set up the database schema and initial data.

3. Configure the database connection:
    - Update the database configuration in `config/database.php` with your database credentials.

4. Set up the web server:
    - Configure your web server to serve the project directory.
    - Ensure the document root points to the `public` directory (if applicable).

### Usage
- **Employee Dashboard**: Accessible by employees to view and update their personal information and performance evaluations.
    ```php:views/backoffice/employee_dashboard.php
  
    ```

- **Manager Dashboard**: Accessible by managers to search and sort employees, and manage performance evaluations.
    ```php:views/backoffice/manager_dashboard.php
    
    ```

- **Admin Dashboard**: Accessible by administrators to manage users and departments.
    ```php:views/backoffice/admin_dashboard.php
    
    ```

## Directory Structure
- `views/backoffice/`: Contains the PHP files for the different dashboards and functionalities.
- `controllers/`: Contains the PHP controllers for handling business logic.
- `middleware/`: Contains the middleware for role-based access control.
- `config/`: Contains the database configuration file.
- `public/`: Contains publicly accessible files (e.g., CSS, JavaScript).

## Contributing
1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add new feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Create a new Pull Request.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact
For any questions or suggestions, please contact chedi.amdouni@esprit.tn
