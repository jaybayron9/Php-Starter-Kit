## REQUIREMENTS
> Apache (XAMPP, LAMPP, etc.)
> MySql  (XAMPP, LAMPP, etc.)
> Node.js [Node.js (nodejs.org)](https://nodejs.org/en)
> Composer [Composer (getcomposer.org)](https://getcomposer.org/)


## GETTING STARTED
1. Open the command prompt.
2. Navigate to your htdocs folder by typing the following commands:
	> ```cd  \```
	> ```cd xampp/htdocs```
3. Once you have located your htdocs folder, choose the folder inside it where you want to place your project by typing:
	> ```cd yourProjectName```
	To go back to the previous folder, type:
	> ```cd ..\```
4. Clone the repository by typing:
	> ```git clone https://github.com/jaybayron9/PhpStarterKit.git```
	This will copy the PHP Starter Kit to your chosen directory.
5. Rename the folder PhpStarterKit to the desired name for your database. In the command prompt, type:
	> ```ren PHPStarterKit YourProjectName```
	Please note that the name of your base folder will be used as the name of your database.
6. Open your project by typing:
	> ```cd YourProjectName```
	> ```code .```
	This will open your project in Visual Studio Code.
7. You can now open your project in your browser.
8. After opening the project once, a database and tables will be generated. After that, follow these steps:
	> Go to the following file: `core/Database.php`
	> Comment out the following lines of code:
 
```php
self::createTable(); //  line 26  
self::createData();  // line 27 
```
		
	> Open config.php and replace the database name with your own database name:
 
```php
'mysql' => [
   'database' => YourProjectName,
],
```
		
9. You can now continue building your project.