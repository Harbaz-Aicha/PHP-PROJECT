<html>
    <head>
        <title>Todo List Application</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="header">
            <h1>Todo List Application</h1>
        </div>
        <form method="post" action="">
        <?php $db = mysqli_connect("localhost","root","","todo") or dir("Query Failed" . mysqli_error($db));?>
        <?php 
        if(isset($_POST['submit'])){
        $task = $_POST['task'];
        $query ="INSERT INTO tasks (task) VALUES('$task')";
        $run_query = mysqli_query($db,$query);
        }
        ?>
            <input type="text" name="task" class="task">
<button type="submit" name="submit" class="btn">Add Task</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>N</th>
                    <th></th>
                    
                    <th>Tasks</th>
                    <th></th>
                    <th>Action</th>
                    
                    <th></th>
                    
                    
                    <th>Time</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            $run_task =mysqli_query($db,"SELECT *FROM tasks LIMIT 20");
            while($row = mysqli_fetch_assoc($run_task)){
                $id = $row['id'];
                $task1 = $row['task'];
                $name = "<i style='color:#999;'>Arnuald </i>";
                $time = $row['time'];
            
            ?>
                <tr>
                    <td><?php echo $id;?></td>
                    <td></td>
                    <td><?php echo $task1;?></td>
                    <td></td>
                    
              
                    <td class="delete"><a href="index.php?delete=<?php echo $id;?>">x</a></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $time; ?></td>
                    
                </tr>
                <?php } ?>
            </tbody>
            <?php
            if(isset($_GET['delete'])){
$delete = $_GET['delete'];
$query = "DELETE FROM tasks WHERE id = '$delete'";
$run = mysqli_query($db,$query);
    header('location: index.php');

            }
            ?>
        </table>
    </body>
</html>