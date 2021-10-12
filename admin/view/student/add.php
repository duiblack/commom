<?php
    if(Helper::is_submit('addstd')){
        if(!empty(Helper::input_value('Name'))){
            $student = new Student();
        $student->setTen(Helper::input_value('Name'));
        $student->setTin(Helper::input_value('tin'));
        $student->setTac(Helper::input_value('tac'));
        $student->setMo(Helper::input_value('mo'));
        $student->setNam(Helper::input_value('nam'));
        $student->setTrang(Helper::input_value('trang'));
        if(!empty($student) && StudentDB::addStudent($student)){
            Helper::redirect(Helper::get_url('admin/?page=1'));
        }
        }
    }
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
    <form action="" method ="post" name = "form1" onsubmit="return cc()">
    <table class="table table-hover">
        <tr>
            <td>Tên học phần</td>
            <td>
                <input type="text" name="Name" id="">
            </td>
        </tr>
        <tr>
            <td>Số tín chỉ</td>
            <td>
                <input type="text" name="tin" id="">
            </td>
        </tr>
        <tr>
            <td>Tên tác giả</td>
            <td>
                <input type="text" name="tac" id="">
            </td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td>
                <input type="text" name="mo" id="">
            </td>
        </tr>
        <tr>
            <td>Năm sản xuất</td>
            <td>
                <input type="text" name="nam" id="">
            </td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <input type="text" name="trang" id="">
            </td>
        </tr>
        <tr>
            <input type="hidden" name = "action" value="addstd">
            <input type="submit" value="Thêm học phần"  class = "btn btn-success">
        </tr>
    </table>
    </form>
    <p>
    <a href="<?php echo Helper::get_url('admin/?c=liststd') ?>" class = "btn btn-primary">Trở về</a>
</p>

<script type="text/javascript">
    function cc() {
        var name = document.form1.Name.value;
        var tin = document.form1.tin.value;
        var tac = document.form1.tac.value;
        var mo = document.form1.mo.value;
        var nam = document.form1.nam.value;
        var trang = document.form1.trang.value;
        if (name=="" || tin =="" || tac == ""  || nam == "" || trang == "") {
            alert('Please enter');
            return false;
        }
      
    }
</script>
</body>
</html>