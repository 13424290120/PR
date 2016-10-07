<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

1、选fetch还是fetchall？

小记录集时，用fetchall效率高，减少从数据库检索次数，但对于大结果集，用fetchall则给系统带来很大负担。数据库要向WEB前端传输量太大反而效率低。

2、fetch()或fetchall()有几个参数：

mixed pdostatement::fetch([int fetch_style [,int cursor_orientation [,int cursor_offset]]])

array pdostatement::fetchAll(int fetch_style)

fetch_style参数:

■$row=$rs->fetchAll(PDO::FETCH_BOTH); FETCH_BOTH是默认的，可省，返回关联和索引。

■$row=$rs->fetchAll(PDO::FETCH_ASSOC); FETCH_ASSOC参数决定返回的只有关联数组。

■$row=$rs->fetchAll(PDO::FETCH_NUM); 返回索引数组

■$row=$rs->fetchAll(PDO::FETCH_OBJ); 如果fetch()则返回对象，如果是fetchall(),返回由对象组成的二维数组

代码如下:

<?php

$dbh = new PDO('mysql:host=localhost;dbname=access_control', 'root', '');

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbh->exec('set names utf8');

/*添加*/

//$sql = "INSERT INTO `user` SET `login`=:login AND `password`=:password";

$sql = "INSERT INTO `user` (`login` ,`password`)VALUES (:login, :password)"; $stmt = $dbh->prepare($sql); $stmt->execute(array(':login'=>'kevin2',':password'=>''));

echo $dbh->lastinsertid();

/*修改*/

$sql = "UPDATE `user` SET `password`=:password WHERE `user_id`=:userId";

$stmt = $dbh->prepare($sql);

$stmt->execute(array(':userId'=>'7', ':password'=>'4607e782c4d86fd5364d7e4508bb10d9'));

echo $stmt->rowCount();

/*删除*/

$sql = "DELETE FROM `user` WHERE `login` LIKE 'kevin_'"; //kevin%

$stmt = $dbh->prepare($sql);

$stmt->execute();

echo $stmt->rowCount();

/*查询*/

$login = 'kevin%';

$sql = "SELECT * FROM `user` WHERE `login` LIKE :login";

$stmt = $dbh->prepare($sql);

$stmt->execute(array(':login'=>$login));

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

print_r($row);

}

print_r( $stmt->fetchAll(PDO::FETCH_ASSOC));

?>

1 建立连接

代码如下:

<?php

$dbh=newPDO('mysql:host=localhost;port=3306; dbname=test',$user,$pass,array(

PDO::ATTR_PERSISTENT=>true

));

?>

持久性链接PDO::ATTR_PERSISTENT=>true

2. 捕捉错误

代码如下:

<?php

try{

$dbh=newPDO('mysql:host=localhost;dbname=test',$user,$pass);

$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$dbh->exec("SET CHARACTER SET utf8");

$dbh=null; //断开连接

}catch(PDOException$e){

print"Error!:".$e->getMessage()."<br/>";

die();

}

?>

3. 事务的

代码如下:

<?php

try{

$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$dbh->beginTransaction();//开启事务

$dbh->exec("insertintostaff(id,first,last)values(23,'Joe','Bloggs')");

$dbh->exec("insertintosalarychange(id,amount,changedate)

values(23,50000,NOW())");

$dbh->commit();//提交事务

}catch(Exception$e){

$dbh->rollBack();//错误回滚

echo"Failed:".$e->getMessage();

}

?>

4. 错误处理

a. 静默模式(默认模式)

代码如下:

$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT); //不显示错误

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);//显示警告错误，并继续执行

$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//产生致命错误，PDOException

代码如下:

<?php

try{

$dbh = new PDO($dsn, $user, $password);

$sql = 'Select * from city where CountryCode =:country';

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$stmt = $dbh->prepare($sql);

$stmt->bindParam(':country', $country, PDO::PARAM_STR);

$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

print $row['Name'] . "/t";

}

} // if there is a problem we can handle it here

catch (PDOException $e) {

echo 'PDO Exception Caught. ';

echo 'Error with the database: <br />';

echo 'SQL Query: ', $sql;

echo 'Error: ' . $e->getMessage();

}

?>

1. 使用 query()

代码如下:

<?php

$dbh->query($sql); 当$sql 中变量可以用$dbh->quote($params); //转义字符串的数据

$sql = 'Select * from city where CountryCode ='.$dbh->quote($country);

foreach ($dbh->query($sql) as $row) {

print $row['Name'] . "/t";

print $row['CountryCode'] . "/t";

print $row['Population'] . "/n";

}

?>

2. 使用 prepare, bindParam和 execute [建议用,同时可以用添加、修改、删除]

代码如下:

<?php

$dbh->prepare($sql); 产生了个PDOStatement对象

PDOStatement->bindParam()

PDOStatement->execute();//可以在这里放绑定的相应变量

?>

3. 事物

代码如下:

<?php

try {

$dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '');

$dbh->query('set names utf8;');

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbh->beginTransaction();

$dbh->exec("Insert INTO `test`.`table` (`name` ,`age`)VALUES ('mick', 22);");

$dbh->exec("Insert INTO `test`.`table` (`name` ,`age`)VALUES ('lily', 29);");

$dbh->exec("Insert INTO `test`.`table` (`name` ,`age`)VALUES ('susan', 21);");

$dbh->commit();

} catch (Exception $e) {

$dbh->rollBack();

echo "Failed: " . $e->getMessage();

}

?>