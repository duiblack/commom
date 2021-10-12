<?php
    class Helper
    {
        public static function get_url($url = '')
        {
            $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
            $app_path = explode('/', $uri);
            return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $app_path[1] . '/' . $url;
        }
    
        public static function redirect($url)
        {
            header("Location:{$url}");
            exit();
        }
    
        public static function input_value($inputname, $filter = FILTER_DEFAULT, $option = FILTER_SANITIZE_STRING)
        {
            $value = filter_input(INPUT_POST, $inputname, $filter, $option);
            if ($value === null) {
                $value = filter_input(INPUT_GET, $inputname, $filter, $option);
            }
            return $value;
        }
    
        public static function is_submit($hidden)
        {
            return (!empty(self::input_value('action')) && self::input_value('action') == $hidden);
        }
    }

    class Database
    {
        private static $dsn = 'mysql:host=localhost;dbname=test04';
        private static $username = "root";
        private static $password = "";
        private static $con = null;
        
        public function __construct()
        {
           self::db_connect();    
        }

        public function __destruct()
        {
            self::db_disconnect();
        }

        public static function db_connect()
        {
            try {
                if (is_null(self::$con)) {
                    self::$con = new PDO(self::$dsn, self::$username, self::$password);
                    self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                    //echo "Ket noi thanh cong";               
                }
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include_once '../errors/database_error.php';
            }
        }
    
        public static function db_disconnect()
        {
            if (!is_null(self::$con)) {
                $con = null;
            }
        }
        
        public static function db_execute($sql = '', $params = [])
        {
            if (!is_null(self::$con)) {
                $result = self::$con->prepare($sql);
                $result->execute($params);
                if ($result->rowCount() > 0) {
                    $result->closeCursor();
                    return true;
                }
            }
            return false;
        }
    
        public static function db_get_list($sql = '')
        {
            if (!is_null(self::$con)) {
                $result = self::$con->prepare($sql);
                $result->execute();
                if ($result->rowCount() > 0) {
                    $rows = $result->fetchAll();
                    $result->closeCursor();
                    return $rows;
                }
            }
            return false;
        }
    
        public static function db_get_list_condition($sql = '', $params = [])
        {
            if (!is_null(self::$con)) {
                $result = self::$con->prepare($sql);
                $result->execute($params);
                if ($result->rowCount() > 0) {
                    $rows = $result->fetchAll();
                    $result->closeCursor();
                    return $rows;
                }
            }
            return false;
        }
    
        public static function db_get_row($sql = '', $params = [])
        {
            if (!is_null(self::$con)) {
                $result = self::$con->prepare($sql);
                $result->execute($params);
                if ($result->rowCount() > 0) {
                    $row = $result->fetch();
                    $result->closeCursor();
                    return $row;
                }
            }
            return false;
        }
    }
 

    class Student
    {
        private $id,$ten,$tin,$tacgia,$mota,$namsanxuat,$trangthai;
        public function getId(){
            return $this->id;
        }
        public function setId($value){
            $this->id=$value;
        }
        public function getTen(){
            return $this->ten;
        }
        public function setTen($value){
            $this->ten = $value;
        }
        public function getTin(){
            return $this->tin;
        }
        public function setTin($value){
            $this->tin =$value;
        }
        public function getTac(){
            return $this->tacgia;
        }
        public function setTac($value){
            $this->tacgia = $value;
        }
        public function getMo(){
            return $this->mota;
        }
        public function setMo($value){
            $this->mota = $value;
        }
        public function getNam(){
            return $this->namsanxuat;
        }
        public function setNam($value){
            $this->namsanxuat = $value;
        }
        public function getTrang(){
            return $this->trangthai;
        }
        public function setTrang($value){
            $this->trangthai = $value;
        }
    }

    class StudentDB extends Database
    {
        public static function getStudent()
        {
            $sql = "select * from hocphan";
            if(!empty(self::db_get_list($sql)))
            {
                foreach(self::db_get_list($sql) as $row){
                    $student = new Student();
                    $student->setId($row['id']);
                    $student->setTen($row['tenhp']);
                    $student->setTin($row['sotinchi']);
                    $student->setTac($row['tentacgia']);
                    $student->setMo($row['mota']);
                    $student->setNam($row['namsanxuat']);
                    $student->setTrang($row['trangthai']);
                    $std[] = $student;
                }
                return $std;
            }
        }

        public static function getStudentByID($ID){
            $sql = "select * from hocphan where id=?";
            $params = [$ID];
            $row = self::db_get_row($sql,$params);
            if(!empty($row)){
                $student = new Student();
                $student->setId($row['id']);
                $student->setTen($row['tenhp']);
                $student->setTin($row['sotinchi']);
                $student->setTac($row['tentacgia']);
                $student->setMo($row['mota']);
                $student->setNam($row['namsanxuat']);
                $student->setTrang($row['trangthai']);
                return $student;
            }
        }

        public static function addStudent($student){
            $sql = "insert into hocphan(tenhp,sotinchi,tentacgia,mota,namsanxuat,trangthai) values (?,?,?,?,?,?)";
            $params = [
                $student->getTen(),
                $student->getTin(),
                $student->getTac(),
                $student->getMo(),
                $student->getNam(),
                $student->getTrang()
            ];
            if(self::db_execute($sql,$params))
            return true;
            else
            return false;
        }

        public static function update($student){
            $sql = "update hocphan set tenhp = ? , sotinchi = ? , tentacgia = ? , mota = ? , namsanxuat = ? , trangthai = ? where id = ?";
            $params = [
                $student->getTen(),
                $student->getTin(),
                $student->getTac(),
                $student->getMo(),
                $student->getNam(),
                $student->getTrang(),
                $student->getId()
            ];
            if(self::db_execute($sql,$params))
                return true;
            else
                return false;
        }

        public static function delete($student){
            $sql = "delete from hocphan where id = ?";
            $params = [
                $student->getId()
            ];
            if(self::db_execute($sql,$params))
                return true;
            else
                return false;
        }
        
        public static function getRow(){
            $sql = "select count(id) as Row from hocphan";
            if(!empty(self::db_get_list($sql))){
                $row = self::db_get_list($sql);
                return $row;
            }
        }

        public static function getStudentPag($current,$count){
            $index = ($current - 1) *$count;
            $sql = 'SELECT * FROM hocphan limit '.$index.' , '.$count.'';
            if(!empty(self::db_get_list($sql))){
                foreach(self::db_get_list($sql) as $row){
                    $student = new Student();
                    $student->setId($row['id']);
                    $student->setTen($row['tenhp']);
                    $student->setTin($row['sotinchi']);
                    $student->setTac($row['tentacgia']);
                    $student->setMo($row['mota']);
                    $student->setNam($row['namsanxuat']);
                    $student->setTrang($row['trangthai']);
                    $std[] = $student;
                }
                return $std;
            }
        }
    }


?>
