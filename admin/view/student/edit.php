<?php
    $student = StudentDB::getStudentByID(Helper::input_value('id'));
    if(Helper::is_submit('edit')){
        $student->setTen(Helper::input_value('Name'));
        $student->setTin(Helper::input_value('tin'));
        $student->setTac(Helper::input_value('tac'));
        $student->setMo(Helper::input_value('mo'));
        $student->setNam(Helper::input_value('nam'));
        $student->setTrang(Helper::input_value('trang'));
        if(!empty($student) && StudentDB::update($student)){
            Helper::redirect(Helper::get_url('admin/?page=1'));
        }
        Helper::redirect(Helper::get_url('admin/?page=1'));
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
<form action="" method = "post">
    <table class="table table-hover">
        <tr>
            <td>Tên học phần</td>
            <td>
                <input type="text" name="Name" id="" value="<?php echo !empty($student)?$student->getTen():"";  ?>">
            </td>
        </tr>
        <tr>
            <td>Số tín chỉ</td>
            <td>
                <input type="text" name="tin" id="" value="<?php echo !empty($student)?$student->getTin():"";  ?>">
            </td>
        </tr>
        <tr>
            <td>Tên tác giả</td>
            <td>
                <input type="text" name="tac" id="" value="<?php echo !empty($student)?$student->getTac():"";  ?>">
            </td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td>
                <input type="text" name="mo" id="" value="<?php echo !empty($student)?$student->getMo():"";  ?>">
            </td>
        </tr>
        <tr>
            <td>Năm sản xuất</td>
            <td>
                <input type="text" name="nam" id="" value="<?php echo !empty($student)?$student->getNam():"";  ?>">
            </td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <input type="text" name="trang" id="" value="<?php echo !empty($student)?$student->getTrang():"";  ?>">
            </td>
        </tr>
        <tr>
            <input type="hidden" name = "action" value="edit">
            <input type="submit" value="Edit" class = "btn btn-success">
        </tr>
    </table>
    </form>
    <p>
    <a href="<?php echo Helper::get_url('admin/?c=liststd') ?>" class = "btn btn-primary">Trở về</a>
</p>
    </form>
</body>
</html>