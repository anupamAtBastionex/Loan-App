# Loan Management System (CodeIgniter 3)

## 📌 Project Overview
This Loan Management System is developed using **CodeIgniter 3 (CI3)**. It allows users to apply for loans, check loan status, and make repayments. Admins can review loan applications, approve/reject them, and track repayments.

---

### 👤 User (Customer)
- Register and log in.
- Apply for a loan (amount, tenure, purpose).
- View loan status (Pending, Approved, Rejected).
- Make loan repayments.
- View repayment history.

### 🔑 Admin
- Login via `/admin`.
- View all loan applications.
- Approve or reject loan requests.
- Track repayment history.

---

## 📂 Folder Structure
```
loan-app/
├── application/
│   ├── controllers/
│   │   ├── Auth.php
│   │   ├── Dashboard.php
│   │   ├── Loan.php
│   │   ├── Repayment.php
│   │   └── admin/Admin.php
│   ├── models/
│   │   ├── User_model.php
│   │   ├── Loan_model.php
│   │   └── Repayment_model.php
│   ├── views/
│   │   ├── auth/
│   │   │   ├── login.php
│   │   │   ├── register.php
│   │   ├── dashboard.php
│   │   ├── loan/
│   │   │   ├── apply.php
│   │   │   ├── history.php
│   │   ├── repayment/
│   │   │   ├── history.php
│   │   ├── admin/
│   │   │   ├── dashboard.php
├── assets/ (CSS, JS, Images)
├── database/
│   ├── loan_management.sql
├── system/ (CodeIgniter Core)
├── index.php
└── .htaccess
```

---

## 🛠 Installation Guide
### Step 1: Clone the Repository
```bash
git clone https://github.com/anupamAtBastionex/Loan-App.git

cd Loan-App
```

### Step 2: Configure Database
1. Create a database in **phpMyAdmin** (e.g., `loan_management`).
2. Import `database/loan_management.sql` into your MySQL database.
3. Configure database settings in `application/config/database.php`:
```php
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'loan_management',
    'dbdriver' => 'mysqli',
);
```

### Step 3: Enable `.htaccess` (Remove `index.php` from URLs)
1. Rename `htaccess` file to `.htaccess`.
2. Update `application/config/config.php`:
```php
$config['index_page'] = '';
```

### Step 4: Start the Application
Run the project in your browser:
```bash
http://localhost/loan-app/
```

---

## 📌 Usage
### 🔹 User Login & Loan Application
- Register at `/auth/signup`.
- Log in at `/auth`.
- Apply for a loan at `/loan/apply`.
- View repayment history at `/repayment/repayment_history/{loan_id}`.

### 🔹 Admin Panel
- Admin Login: `/admin`
- View loan applications: `/admin/index`
- Approve loan: `/admin/approve/{loan_id}`
- Reject loan: `/admin/reject/{loan_id}`

---

## 🛠 Technologies Used
- **PHP 7.4+ (CodeIgniter 3 Framework)
- **MySQL** (Database Management)
- **Bootstrap 5** (UI Styling)
- **jQuery** (Frontend Enhancements)
- **XAMPP/Laragon** (Local Server)

---

## 📜 License
This project is open-source and free to use under the **MIT License**.

---

## 🙌 Contributing
Feel free to submit a pull request or open an issue for improvements. 🚀

