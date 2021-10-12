<?php
    if(Helper::is_submit('delete')){
        $student = new Student();
        $student->setId(Helper::input_value('id'));
        if(!empty($student) && StudentDB::delete($student)){
            Helper::redirect(Helper::get_url('admin/'));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h1>Bạn có mún xóa không</h1>
        <input type="hidden" name = "action" value="delete">
        <input type="submit" value="Chấp nhận" class = "btn btn-danger">
        <a href="<?php echo Helper::get_url('admin/?c=liststd') ?>" class = "btn btn-primary">Không</a>
    </form>
</body>
</html>