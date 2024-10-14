# PHP CV Website

This project is a simple **CV management system** built using PHP. It features a home page where users can view a list of all CVs available on the site.

## Features

### Non-Registered Users:
- **Register:** Create an account to access additional features.
- **Log In:** Access the site by logging into an existing account.
- **View CVs:** Browse the list of CVs displayed on the Home page.
- **More Details:** View detailed information for a particular CV.

### Registered Users:
- **Profile Management:** View and update your profile information.
- **Log Out:** Securely log out of your account.

## Getting Started

To run the website locally, follow these steps:

### Prerequisites:
- [XAMPP](https://www.apachefriends.org/) or any other local server stack that supports PHP and MySQL.

### Setting Up the Database:
1. Launch XAMPP and start **Apache** and **MySQL**.
2. Create a new database in **phpMyAdmin** and run the following SQL script to create the necessary table:

```sql
CREATE TABLE cvs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    keyprogramming VARCHAR(100) NOT NULL,
    profile TEXT NOT NULL,
    education TEXT NOT NULL,
    URLlinks VARCHAR(255) NOT NULL
);
```

3. Import or manually add some CV data to test the website.

## Project Preview

### Home Page
The home page displays a list of CVs along with options to register or log in.

![home_page](https://github.com/user-attachments/assets/ba756cc8-eb11-4da8-aa54-fbf345302a56)


### Registration Page
Users can sign up by filling out this registration form.

(![register_page](https://github.com/user-attachments/assets/8297d99a-817c-4526-81a1-aa195af82617)

### More Details
Non-registered and registered users can view additional details about a CV.

![more_details](https://github.com/user-attachments/assets/a59be4ac-54c4-4b76-a808-1005102ef76f)


### Profile Page
Registered users can update their profile information.

![update_profile](https://github.com/user-attachments/assets/cafcd418-b77b-49ab-8c44-d5af38990eaa)


## How to Contribute

Feel free to fork this project, submit issues, or send pull requests. Your contributions are welcome!
