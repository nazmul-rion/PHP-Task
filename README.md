**Task Documentation**
# **Introduction:**
The purpose of the login and registration system is to provide a secure and user-friendly way for users to create an account, log in, and manage their profile information. The system is designed to allow only registered users to access their profile page. The scope of the system includes implementing secure authentication, secure password storage, data validation, and preventing common security vulnerabilities such as SQL injection and cross-site scripting attacks. Additionally, the system may provide additional features such as CRUD operations on a specific entity, such as uploading and managing certificates.
# **Required Software:**
- XAMPP
# **Setting up a login and registration system:**
- Create a database using MySQL in xampp by using tools like phpMyAdmin. First, you need to create a database named secureaccessdb and then import sql file from Database Folder for importing all table and indexes.
- Copy all file to xampp/htdocs/project folder.
- Run MySQL from xampp control panel.
- Visit <http://localhost/project/php-task/> to use this system.
# **Project overview:**
- An authentic user can register here. Here he must provide his username, email and password.
- Username must be unique and its length between 3 to 10 characters and contain only letters, numbers, and underscores.
- Email must be unique and valid format.
- Password must be at least 8 characters long and contains at least one uppercase letter and one lowercase letter.
- No one can access profile page without logged in.
- In profile page user can update his username, email and also his password by providing his existing password.
- User can upload his certificate as a pdf file to this system and they can view update or delete their own file.
- User don’t need to login again and again if they don’t click logout button. 
- It’s a user-friendly system because here it shows every single error message to a user.
- Its also mobile responsive so that anyone can use this system in mobile or laptop.
# <a name="_hlk135087406"></a>**Security:**
- For secure password storage this system doesn’t store any plane password. Hash and store the password securely in the MySQL database using PHP's password\_hash() function. 
- It uses PHP's prepared statements bind parameter to prevent SQL injection attacks when inserting user data into the database.
- This system provides a secure authentication to verify the user's credentials against the stored data in the MySQL database using PHP's password\_verify() function.
- For securing session for the logged-in user using PHP's session\_start() function.
# **Demo Account:**

|<p>**Username: Nazmul**</p><p>**Email: nazmulrion16@gmail.com**</p><p>**Password: 123456Aa**</p>|<p>**Username: Naimul**</p><p>**Email: naimulshoad@gmail.com**</p><p>**Password: 123456As**</p>|
| :- | :- |
# **Screenshots:**
![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/01c6f315-a49a-437d-8b22-5e55aeef9226)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/b3b06c29-20b1-4c18-ab56-fd0127183781)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/b31d1784-d99d-4b12-9dcc-5d175d9f88a4)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/313df963-70fc-41ab-8bdc-7a5ca64e1479)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/dc8611f6-a196-4e9f-9c79-d9d719d09df6)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/9cdde945-5bce-4d01-bb9b-b6ebac59f883)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/b8dc5aba-9aae-4fe8-a735-41c16c7ba944)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/63b5e0a1-bd7b-45e5-9782-b353918a0743)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/d8beaafe-a1a6-4ed9-9fe1-16bc41b3bea0)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/9b8ae464-0a60-4d2c-b3a6-98ad35fc8031)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/dd5a6706-2d26-4abf-a3a6-0ccb2dea8cf7)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/5232f564-cf89-40e3-a1a0-00113327cb17)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/1fa69079-71cc-4dda-aa6a-acfd84fadd09)

![image](https://github.com/nazmul-rion/PHP-Task/assets/54868047/52cc1f3c-be9a-4785-a086-dac537f65085)
