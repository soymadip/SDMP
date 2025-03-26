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
- **Database**: PostgreSQL
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
   ./run
   ```
4. Access the application at:
   ```shell
   http://localhost:8080
   ```

5. Also for,
   - **pgAdmin**: `http://localhost:5050`
   - **SQL Server**: `http://localhost:5432`


## 📊 App Configuration

The configuration file can be found in `app/config.php`.


## 🙏 Credits 

<!-- ai generated -->
- Bootstrap Team for their excellent CSS framework
- PostgreSQL community for the robust database system
