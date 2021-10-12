<?php
$qua = 4;
$coutrow = StudentDB::getRow();

$page = ceil($coutrow[0]['Row'] / $qua);
$index = 1;
if(isset($_GET['page'])){
    $index = $_GET['page'];
}

$student = StudentDB::getStudentPag($index,$qua);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <table class = "table table-hover table-striped">
        <thead>
            <th>ID</th>
            <th>Tên học phần</th>
            <th>Số tín chỉ</th>
            <th>Tên tác giả</th>
            <th>Mô tả</th>
            <th>Năm sản xuất</th>
            <th>Trạng thái</th>
        </thead>
        <tbody>
        <?php
        if(!empty($student)):
            foreach($student as $row):
        ?>
        <tr>
            <td><?php echo $row->getId(); ?></td>
            <td><?php echo $row->getTen(); ?></td>
            <td><?php echo $row->getTin(); ?></td>
            <td><?php echo $row->getTac(); ?></td>
            <td><?php echo $row->getMo(); ?></td>
            <td><?php echo $row->getNam(); ?></td>
            <td><?php echo $row->getTrang(); ?></td>
            <td>
                <a href="<?php echo Helper::get_url('admin/?c=editstd&id=' . $row->getId()) ?>" 
                class="btn btn-success">Edit</a>
            </td>

            <td>
            <a href="<?php echo Helper::get_url('admin/?c=deletestd&id=' . $row->getId()) ?>" 
            class= "btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach; endif; ?>

        </tbody>
    </table>
    <h2>
    <a href="<?php echo Helper::get_url('admin/?c=addstd') ?>" class="btn btn-primary">Add</a>
    </h2>

    <ul class="pagination">

<?php
for ($i=1; $i <= $page ; $i++) { 
   # code...
$main='';
   if($index==$i) {
      $main='active';
   }
   echo '<li class="page-item '.$main.'  "><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
}

?>
  
</ul>
</body>
</html>