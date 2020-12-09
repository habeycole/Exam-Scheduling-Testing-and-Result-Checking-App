# Exam-Scheduling-and-Result-Checking-App
Exam Scheduling and Result Checking App designed by myself and some of my students (front-end) for the Lagos Internal Revenue Service (LIRS).

## About this App:
This app allows you to register students for an exam, and also schedule them; especially if you would be having them in batches, which was what this solution was intended for initially. Also, students can prepare for the exams by taking an online test (You can use the test as the exam itself if you fancy that). With this app, you can also accredit students before they are allowed into the exam hall.

## How to install/use:
Installing this app for your personal use should be very easy and straight forward. Designed with Core PHP, all you need to do is just to download the repository and reproduce on a localhost or live server. If you are new to doing that, you can follow the steps below:
1. Download or clone the repository URL.
2. Upload to your server.
3. Configure the "connections.php" and/or "connection.php" file(s) with your own production details. What you should change include:
*_$servername = "localhost";
$username = "root";
$password = "12345678";
$db_name = "test_list";_*
Use the right details for the credentials above as you have on your server.
4. Download the *test.sql* file and open up your DB app e.g: PHPMyAdmin and/or PostgreSQL and create a database named *test_list*. Dump (Import) the *test.sql* file in it.
5. Check your production or test URL and you should be good to go.
6. Feel free to use details available in the database to check result, check exam center, date and/or time (exam schedule), or just practice the CBT test.
7. For the CBT test, the questions can be found in the *Questions* folder or just navigate to your production URL/questions. This should easily take you to where you can edit questions and answers from the GUI.
8. For questions and/or help/support, please feel free to shoot me a message on: habeycole@gmail.com or info@menetwork.com.ng.
9. You can help make this better, though. It was designed in 2019 to cater for the needs of a client where I work and the needs have been rightly effected and exceeded its needs so making it open source for more massive usage is ideal.

## Screenshots
### Homepage
![Homepage](https://user-images.githubusercontent.com/44281289/101602953-3004d980-39ff-11eb-963b-dac8f59cb184.png)

### Student Profile page
![Profile](https://user-images.githubusercontent.com/44281289/101603334-b6b9b680-39ff-11eb-8026-7bfb7a091e5e.png)

### Result Checking Page
![Result](https://user-images.githubusercontent.com/44281289/101603481-e9fc4580-39ff-11eb-913e-d6b163b9ad60.png)

### Student/User Accreditation/Checkin Page for Exam
![Accreditation](https://user-images.githubusercontent.com/44281289/101603580-13b56c80-3a00-11eb-874e-dea588d5afd1.png)
