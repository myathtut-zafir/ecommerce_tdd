# Laravel Mini E-commerce API

This project is a concise E-commerce API backend built with Laravel, designed to showcase robust API development, Test-Driven Development (TDD) practices, and effective use of Laravel's authentication and authorization features.

It focuses on essential e-commerce functionalities to demonstrate a clean project structure, API design, and the discipline of TDD in a manageable scope.

## Key Features

* **User Authentication & Authorization:**
    * User Registration
    * User Login
    * Retrieve Authenticated User Profile
    * Secure API authentication using **Laravel Sanctum**.
    * Role-based authorization (`user`, `admin`) using **Laravel Policies and Gates**.

* **Product Management:**
    * Public API to list all products.
    * Admin-only APIs for creating and updating products.

* **Shopping Cart:**
    * *(Planned for future development)*: Functionality to add, update quantity, remove items, and view cart contents for authenticated users.

## Technologies & Practices

* **Laravel Framework:** The foundation for the API.
* **Test-Driven Development (TDD):** This project was developed following a strict TDD approach. Every feature began with writing failing tests (RED), followed by implementing the minimum code to make them pass (GREEN), and then refactoring (REFACTOR) to improve code quality and design. This ensures a highly reliable and maintainable codebase.
* **Laravel Sanctum:** Utilized for token-based API authentication, providing a lightweight and secure way to protect API endpoints.
* **Laravel Policies & Gates:** Implemented for granular authorization. Policies define rules for interacting with models (e.g., only admins can manage products), while gates provide simple closure-based authorization checks (e.g., `can('manage-products')`).
* **RESTful API Design:** Adheres to REST principles with clear endpoints, HTTP methods, and appropriate status codes.
* **Service Layer:** Business logic is encapsulated within dedicated service classes for better separation of concerns.
* **Form Requests:** Used for robust API request validation.
* **API Resources:** Ensures consistent and structured JSON responses.

## Architecture & Design Highlights

The project follows a layered architecture to maintain clear separation of concerns:

* **Controllers:** Handle incoming API requests and delegate to services.
* **Form Requests:** Validate incoming request data.
* **Services:** Contain the core business logic, decoupled from HTTP concerns.
* **Models:** Interact with the database via Eloquent ORM.
* **Policies:** Centralize authorization logic for models.
* **API Resources:** Standardize the output format for API responses.

## Getting Started

Follow these steps to set up and run the project locally.

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/your-username/ecommerce-mini-api.git](https://github.com/your-username/ecommerce-mini-api.git)
    cd ecommerce-mini-api
    ```
    (Replace `your-username` with your actual GitHub username)

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Copy environment file and generate the app key:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Configure your database:**
    Update your `.env` file with your database credentials (e.g., MySQL, PostgreSQL).
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ecommerce_mini_api
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  **Run database migrations and seeders:**
    ```bash
    php artisan migrate
    php artisan db:seed # Optional: if you add seeders for demo data
    ```

6.  **Install Laravel Sanctum:**
    ```bash
    php artisan sanctum:install
    php artisan migrate # To create personal_access_tokens table
    ```

7.  **Run the
