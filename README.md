<div align="center">
<img src="./sdmp/src/img/icon.png" width="150">
<h1>SDMP
</br>
Student Database Management Portal</h1>

SDMP is a web application designed to manage student records efficiently.  
It provides interface for administrators and college stuff to maintain student data, track academic progress, and generate reports.
</div>
<br>

# ✨ Features

- **User Authentication**: Secure login system with role-based access control
- **User Management**: Admin panel to manage user accounts and permissions
- **Student Records**: Comprehensive management of student personal and academic information
- **Search & Filter**: Advanced search capabilities to find student records quickly

</br>

# 🚀 Installation

> [!WARNING]
> This project is still under early development and contains bugs & incomplete features.  
> Please do not use it in production environments.

## Setup

### Prerequisites

- [Podman](https://podman.io)(recommended) / Docker
- [Podman Compose](https://github.com/containers/podman-compose) / Docker Compose
- [mise](https://mise.jdx.dev)
- Git

### For Now

As this is app is under development, setup is not yet streamlined.

<!--## With Containers (Docker/Podman)-->

1. Clone the repository

   ```shell
   git clone https://github.com/soymadip/SDMP
   cd SDMP
   ```

2. **Copy & Edit the .env file with the required values.**

   ```sh
   cp .env.example .env
   nano .env
   ```

3. Start The app: `mise run start`

## Access

- **App**: [localhost:9000](http://localhost:9000)
- **DBX**: [localhost:4224](http://localhost:4224)
- **MariaDB**: [localhost:3306](localhost:3306)

## DBX Connection

To add mariadb connection to DBX:

1. Select the `New Connection` option in the center or top-left.
2. Select `MariaDB` and click Next.
3. Enter these details:
   - Connection name: `sdmp`
   - Host: `host.local`
   - Port: `3306`
   - User: value of `MARIADB_USER` in `.env`
   - Password: value of `MARIADB_PASSWORD` in `.env`

# 🛠️ Technologies Used

- **Backend**: FastAPI
- **Database**: MariaDB
- **Frontend**: HTML, Bootstrap, Jinja2
- **Containerization**: Podman/Docker & Compose

# 🙏 Credits

- **Bootstrap:** Excellent CSS framework
- **MariaDB:** The relational DBMS
