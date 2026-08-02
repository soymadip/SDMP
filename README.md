<div align="center">
<img src="app/src/images/icon.png" width="150">
<h1>SDMP
</br>
Student Database Management Portal</h1>
</div>
<br>


## 📑 Overview

SDMP (Student Database Management Portal) is a web application designed to manage student records efficiently. It provides an intuitive interface for administrators and teachers to maintain student data, track academic progress, and generate reports.  

This project is being developed as my college's major-project submission.


## ✨ Features

- **User Authentication**: Secure login system with role-based access control
- **User Management**: Admin panel to manage user accounts and permissions
- **Student Records**: Comprehensive management of student personal and academic information
- **Search & Filter**: Advanced search capabilities to find student records quickly


## 🛠️ Technologies Used

- **Backend**: PHP
- **Database**: MariaDB
- **Frontend**: HTML, Bootstrap
- **Containerization**: Podman/Docker & Compose


## 🚀 Installation

### Prerequisites

- Podman/Docker and Podman/Docker Compose
- Git

### Setup Instructions

1. Clone the repository

   ```shell
   git clone https://github.com/soymadip/SDMP
   cd SDMP
   ```
2. Edit the [.env](./.env) file with the required values.

3. Run the setup:

   ```shell
   ./run --detach
   ```
4. Access the application at:
   ```shell
   http://localhost:9000
   ```

5. Also for,
   - **phpMyAdmin**: `http://localhost:8080`
   - **MariaDB**: `localhost:3306` (database server, not a web page)

### phpMyAdmin Login

Use these values on the phpMyAdmin login page:

- **Server**: `mariadb`
- **Username**: the value of `MARIADB_USER` in `.env`
- **Password**: the value of `MARIADB_PASSWORD` in `.env`
- **Database**: the value of `MARIADB_DATABASE` in `.env`

The default development values are `soymadip` / `soymadip` for username/password and `sdmp` for the database. Change them before deploying publicly.

The development database also includes a highest-privilege account:

- **Username**: `admin`
- **Password**: `admin`
- **User type**: `master`

Change or remove this account before deploying publicly.


## 📊 App Configuration

The configuration file can be found in `app/config.php`.


## 🙏 Credits 

<!-- ai generated -->
- Bootstrap Team for their excellent CSS framework
- MariaDB community for the robust database system
