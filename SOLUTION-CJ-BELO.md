# Takehome Test Solution

***Author***
Christopher Jhun Belo
email: belo.cj@gmail.com

Demo App Link: http://18.140.65.80/

API Endpoints:
* (GET) http://18.140.65.80/rest-api/generate_token.php
* (POST) http://18.140.65.80/rest-api/create_user.php
* (GET) http://18.140.65.80/rest-api/list_names.php
* (GET) http://18.140.65.80/rest-api/get_data.php?id=1

*Hit generate_token api to get the token*
*Use Bearer Token for Authorization when testing the API*

---

**Instruction for setting up local environment:**

*Requirements*
* Docker
* Docker Compose


1. Clone the repository
    `git clone git@github.com:cjbelo/takehome-test.git`
2. Run Docker command and wait until 3 containers are running
    `docker compose up -d` 
3. Once the containers are running, visit http://localhost:8080 to open PHPMyAdmin. You can import the SQL file included in this repo `signups.sql` to create the table for signups.
4. When successful, you can start testing the app and API.

Demo App Local: http://localhost/

Local API Endpoints:
* (GET) http://localhost/rest-api/generate_token.php
* (POST) http://localhost/rest-api/create_user.php
* (GET) http://localhost/rest-api/list_names.php
* (GET) http://localhost/rest-api/get_data.php?id=1
