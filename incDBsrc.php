
<?php
    include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab_1</title>
</head>
<body >
    <div>
        <b>Вывести расписание занятий группы</b> 

        <form action = 'show1.php' method = "POST">
            <select name="grClSch">
            <?php
                try{
                    
                    $sql = 'SELECT title FROM groups';
                    foreach($dbh->query($sql) as $row){
                        $name = $row[0];
                        print"<option value='$name'> $name</option>";
                    }
                    
                }
                catch(PDOException $ex){
                    echo $ex->GetMessage();
                }
            ?>
            </select>
        
            <input type = 'submit' value = "Get">
        </form>

        <b>Вывести рассписание преподавателя</b> 
        <form action = 'show2.php' method = "POST">
            <select name="teachClSch">
            <?php
                try{
                    $sql = 'SELECT name FROM teacher';
                    foreach($dbh->query($sql) as $row){
                        $name = $row[0];
                        print"<option value='$name'> $name</option>";
                    }
                }
                catch(PDOException $ex){
                    echo $ex->GetMessage();
                }

            ?>
            </select>
        
            <input type = 'submit' value = "Get">
        </form>

        <b>Вывести расписание для аудитории</b> 
        <form action = 'show3.php' method = "POST">
            <select name="audClSch">
            <?php
                try{
                    $sql = 'SELECT auditorium FROM lesson';
                    foreach($dbh->query($sql) as $row){
                        $name = $row[0];
                        print"<option value='$name'> $name</option>";
                    }
                }
                catch(PDOException $ex){
                    echo $ex->GetMessage();
                }

            ?>
            </select>
            <input type = 'submit' value = "Get">
        </form>

        
        <br>
        <b>Добавление нового ПЗ</b>
        <form action = 'Add.php' method = 'post'>
            Введите день недели   
            <input type = 'text' placeholder = "Введите день недели" name = 'weekDayAdd' /><br />

            Введите номер пары   
            <input type = 'number' placeholder = "Введите номер пары" name = 'lessonNumAdd' /><br />

            Введите номер аудитории   
            <input type = 'text' placeholder = "Введите номер аудитории" name = 'auditAdd' /><br />

            Введите название дисплины   
            <input type = 'text' placeholder = "Введите название дисплины" name = 'discAdd' /><br />


            <b>Выберите преподователя</b>
            <select name="teachClAdd">
            <?php
                try{
                    $sql = 'SELECT name FROM teacher';
                    foreach($dbh->query($sql) as $row){
                        $name = $row[0];
                        print"<option value='$name'> $name</option>";
                    }
                }
                catch(PDOException $ex){
                    echo $ex->GetMessage();
                }
            ?>
            </select>

            
            <b>Выберите группу</b>
            <select name="grClAdd">
            <?php
                try{
                    
                    $sql = 'SELECT title FROM groups';
                    foreach($dbh->query($sql) as $row){
                        $name = $row[0];
                        print"<option value='$name'> $name</option>";
                    }
                    
                }
                catch(PDOException $ex){
                    echo $ex->GetMessage();
                }
            ?>
            </select>

            <br>
            <input type = 'submit' value = 'Добавить' />
        </form>
    </div>
</body>
</html>