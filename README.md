# Mini Weather App
This mini weather app allows you to easily track city to see the wather of current date. It's just around +- 150kb.

# Basic Installation
1. This application based on city database. So, firstly you need to import the database .sql into your local database. 
   You can find it on 'master_db' folder. Here I am using mySQL.

2. Copy and paste weather folder that contains all file to your local web server. Or you can fork weather source to your local web server.
   It's same result.
   
3. After that, edit file connection.php (find it in folder 'conf'). Please set with your local database acount credentials.
   Example: 
	$db['db_host']      = 'localhost';
	$db['db_username']  = '(your user db)';
	$db['db_pass']      = '(your pass db)';
	$db['db_name']      = '(your db name)';
  
3. If setting is finish, you can test it in url http://localhost/weather/. Then type city that you want, it's autocomplete base on ajax call.
   Then click 'Cek'. 
   
# Author
  <p>Robert Maulana / <a href="https://robertmaulana.com">robertmaulana.com</a></p>
