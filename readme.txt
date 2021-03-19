   Framework used is Codeigniter. Download xampp run apache and mysql and then enter the url: http://localhost/todo/



  import sql file in the folder (todo.sql) or create todo database and run this query. 
   CREATE TABLE `login_tb` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(40) NOT NULL,
      `password` varchar(40) NOT NULL,
      `fname` varchar(100) NOT NULL,
      `lname` varchar(100) NOT NULL,
    PRIMARY KEY(`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


    CREATE TABLE `todo_list` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(40) NOT NULL,
      `todos` varchar(100) NOT NULL,
      `done` varchar(100) NOT NULL,
    PRIMARY KEY(`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;