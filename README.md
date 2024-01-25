# NPST

## Project Overview

Modernize and optimize internship management by replacing the paper-based process with an integrated digital system, aiming to improve operational efficiency, simplify administration, ensure accessibility of information, reduce errors, and provide a smoother and more satisfying experience for both students and stakeholders involved.

## Getting Started

These instructions will guide you through setting up and running the project on your local machine.

### Prerequisites

Make sure you have the following installed on your machine:

- [PHP](https://www.php.net/manual/en/install.php)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/) (if using Laravel Mix)

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/AnasBenAmor10/NPST.git
    ```

2. Navigate to the project directory:

    ```bash
    cd NPST
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Open the `.env` file and configure the database settings:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

6. Run database migrations:

    ```bash
    php artisan migrate
    ```

### Running the Platform

Start the Laravel development server:

```bash
php artisan serve
