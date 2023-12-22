# BTS-TASK
# Laravel CRUD Application with API

This Laravel project is a basic CRUD (Create, Read, Update, Delete) application with API functionality. It includes front-end features for managing Companies and Employees, as well as APIs to interact with the data for a mobile app.

## Features

- Basic Laravel Auth for administrator login.
- Database seeds to create the first user (admin@admin.com, password).
- CRUD functionality for Companies and Employees.
- Companies table with fields: Name (required), email, logo (minimum 100kb).
- Employees table with fields: First name (required), last name (required), Company (foreign key to Companies), email, phone.
- Use of Laravel's validation functions and Request classes.
- Pagination for showing Companies/Employees list (10 entries per page).
- Filtering and search engine for the report.
- Export report as Excel or PDF.

## Front End

### Installation

# bash
1. Clone the repository:

git clone https://github.com/MalekAlobeidat/BTS-TASK.git


2. Install dependencies:

composer install 


3. Set up your environment file:

cp .env.example .env


4. Generate application key:

php artisan key:generate


5. Run migrations and seed the database:

php artisan migrate --seed


6. Create symbolic link for storage:

php artisan storage:link


7. Serve the application:

php artisan serve


//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////


### API ENDPOINTS
1. 
Endpoint: /api/companies
Method: GET
Description: Retrieve a list of all companies.



2. 
Endpoint: /api/companies/{id}
Method: GET
Description: Retrieve details of a specific company along with its employees. 
