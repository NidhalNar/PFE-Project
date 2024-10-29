# Employee and Demand Management System

This web application is designed for managing employees and tracking demand requests efficiently. The platform provides an intuitive interface for admins and employees to manage information, monitor demands, and ensure a smooth workflow. Developed with a PHP backend and a Bootstrap-integrated frontend template, the system combines functionality and user-friendly design.

## Features

- **Employee Management**: 
  - Add, update, and delete employee records.
  - View employee details and filter by role or department.

- **Demand Management**: 
  - Submit, track, and manage demand requests.
  - Approve or reject demands and add notes for each request.

- **Dashboard Overview**: 
  - Visual representation of demands and employee data.
  - Access to recent activity, demand status, and employee count.

## Tech Stack

- **Backend**: PHP
- **Frontend**: Bootstrap, HTML, CSS, and JavaScript
- **Template Integration**: Customized HTML template integrated with Bootstrap for a cohesive UI.

## Installation

### 1. Clone the Repository
   ```bash
   git clone https://github.com/NidhalNar/PFE-Project
```
## Set Up the Database
1. Create a new MySQL database.
2. Import the provided `database.sql` file into your MySQL database.

## Configure Database Connection
1. Open the `config.php` file.
2. Set your database credentials as follows:
   ```php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'your_username');
   define('DB_PASSWORD', 'your_password');
   define('DB_NAME', 'your_database_name');
   ```
## Run the Application
1. Start your local server using a tool like XAMPP or WAMP.
2. Place the project folder in the server's root directory (e.g., `htdocs` for XAMPP).

## Access the Website
1. Open a browser and go to `http://localhost/employee-demand-management`.

```javascript
// Replace `your_username`, `your_password`, and `your_database_name` with your actual database credentials.
```
## Contact

For further details or contributions, please feel free to contact the contributors through the GitHub repository.
