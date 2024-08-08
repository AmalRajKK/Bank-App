# ABC Bank - Simple Banking Application

## Overview

ABC Bank is a simple banking application developed using the Laravel framework. This application allows users to perform basic banking operations such as registration, login, cash deposit, cash withdrawal, cash transfer, and view account statements.

## Features

1. **Registration**: Users can create a new account with an email id and password.
2. **Login**: Registered users can log in to their accounts.
3. **Home**: Display account information of the logged-in user.
4. **Cash Deposit**: Users can deposit money into their account.
5. **Cash Withdrawal**: Users can withdraw money from their account.
6. **Cash Transfer**: Users can transfer money from their account to another user's account using the recipient's email id.
7. **Account Statement**: Users can view a paginated list of their transactions.
8. **Logout**: Users can log out of their account.

## Technical Details

### Models

-   **User**: Handles user information and authentication.
-   **Account**: Manages the user's account details including balance.
-   **Transaction**: Records all transactions (deposit, withdrawal, transfer) associated with user accounts.

### Controllers

-   **UserController**: Manages user registration and other user-related functions.
-   **SessionController**: Handles user login and logout operations.
-   **BankingController**: Handles all banking operations like deposit, withdrawal, transfer, and displaying the account statement.

### Database Schema

-   **Users**: Stores user information.
-   **Accounts**: Stores account details for each user.
-   **Transactions**: Logs all transactions including type (credit, debit), details (deposit, withdrawal, transfer), amount, recipient, and date.

### Routes

The application routes are defined in `web.php`:

-   **Public Routes**:

    -   `GET /register`: Show the registration form.
    -   `POST /register`: Handle registration.
    -   `GET /login`: Show the login form.
    -   `POST /login`: Handle login.
    -   `POST /logout`: Handle logout.

-   **Authenticated Routes**:
    -   `GET /home`: Show account information.
    -   `POST /deposit`: Handle cash deposit.
    -   `POST /withdraw`: Handle cash withdrawal.
    -   `POST /transfer`: Handle cash transfer.
    -   `GET /statement`: Show account statement.

### Session Controller

The SessionController handles login and logout operations for the users.

#### Methods

-   **showLoginForm**: Displays the login form.
-   **login**: Authenticates the user and logs them in.
-   **logout**: Logs the user out of the application.

### Conclusion

With this application, users can manage their bank accounts with ease. The application includes user registration, login, and logout functionalities, along with the core banking operations such as deposits, withdrawals, transfers, and viewing account statements. The code is structured to ensure a clear separation of concerns, making it maintainable and extendable.
