## REQUIREMENTS
> Apache (XAMPP, LAMPP, etc.)
> MySql  (XAMPP, LAMPP, etc.)
> Node.js [Node.js (nodejs.org)](https://nodejs.org/en)
> Composer [Composer (getcomposer.org)](https://getcomposer.org/)


## GETTING STARTED
1. Open the command prompt.
2. Locate your htdocs folder by typing
	> ```cd  \\```
	> ```cd xampp/htdocs```
3. After you located your htdocs folder, you can choose which folder inside htdocs folder you want to place your project by typing
	> ```cd yourProjectName```
	to back in previous folder just type
	> ```cd ..\\```
4. Clone a repository by typing
	> ```git clone https://github.com/jaybayron9/PhpStarterKit.git```
	this will copy the PHP Starter kit in your directory
5. Change the folder name PhpStarterKit to your choice database name. in your cmd type
	> ```ren PHPStarterKit YourProjectName```
	Please take note that the name of your base folder is the name of your database.
6. Open your Project by typing
	> ```cd YourProjectName```
	> ```code .```
	This will open your vscode IDE.
7. You can now open your project in your browser.
8. After you open the project once this will generate a database and tables. After that go to your project folder and comment the lines of code:
	> folder: core/Database.php
	> code to be commented:  
		```python
			self::createTable(); // line 26
			self::createData();  // line 27
		```
	> go to config.php and replace your database with your database name
		```
			'mysql' => [
				'database' => YourProjectName,
			],
		```
9. You can now continue building your project