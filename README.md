# User Management CRUD Application

A simple web application to **Create, Read, Update, and Delete (CRUD) users** using PHP and MySQL.

## Features

- **Add Users:** Create new users with name, email, and password.
- **View Users:** Display all users in a table.
- **Edit Users:** Update existing user details.
- **Delete Users:** Remove users from the database safely.

## Technologies

- **Backend:** PHP (using PDO for database interaction)
- **Database:** MySQL
- **Security:** Passwords hashed with `password_hash()`

## Setup Instructions

1. **Clone the repository** or download the project files.
2. **Create the database** in MySQL:

```sql
CREATE DATABASE gestion_utilisateurs;

USE gestion_utilisateurs;

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
