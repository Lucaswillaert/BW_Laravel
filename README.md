# JournalMe 
This project is created for the subject "Backend web" @EhB. 

## Description
JournalMe is a platform build for sharing quotes that you relate to. Not only generate Quotes, but also journal about your day, experience etc. 
## Installation

### Prerequisites
- [XAMPP](https://www.apachefriends.org/index.html) installed for database management.
- [Git](https://git-scm.com/) installed for cloning the repository.

### Clone the Repository
1. Open Terminal.
2. Change the current working directory to the location where you want to clone the repository.
3. Run the following command to clone the repository:
    ```shell
    git clone <repository_url>
    ```
    Replace `<repository_url>` with the URL of the repository.

### Set Up the Environment
1. Install the required dependencies by running the following command in the project directory:
    ```shell
    composer install
    ```

2. Create a copy of the `.env.example` file and rename it to `.env`:
    ```shell
    cp .env.example .env
    ```

3. Generate an application key:
    ```shell
    php artisan key:generate
    ```

4. Configure the database connection in the `.env` file:
    ```shell
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

### Start the Application
1. Start XAMPP and ensure that the Apache and MySQL services are running.

2. Run the following command to migrate the database:
    ```shell
    php artisan migrate
    ```

3. Start the development server by running the following command:
    ```shell
    php artisan serve
    ```

4. Open a web browser and navigate to `http://localhost:8000` to access the application.



### You should know

1. you can visit the site as visitor at http://127.0.0.1:8000/posts 
2. making another user admin can be done in the searchbar and searching for that user 
