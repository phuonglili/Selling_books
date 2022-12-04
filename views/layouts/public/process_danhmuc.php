 <?php
 if(isset($_GET['id']))
     {
        $id = $_GET['id'];
     }
    switch ($id)
    {
    case '1':
        $sql = "select * from sach where theloai = 'kinh tế'";
        $thongtinsach = executeResult($sql);
        break;
    case '2':
        $sql = "select * from sach where theloai = 'lịch sử'";
        $thongtinsach = executeResult($sql);
        break;
    case '3':
        $sql = "select * from sach where theloai = 'tâm lý'";
        $thongtinsach = executeResult($sql);
        break;
    case '4':
        $sql = "select * from sach where theloai = 'văn học việt nam' and theloai = 'văn học việt nam'";
        $thongtinsach = executeResult($sql);
        break;
    case '5':
        $sql = "select * from sach where theloai = 'thiếu nhi'";
        $thongtinsach = executeResult($sql);
        break;   
    case '6':
        $sql = "select * from sach where theloai = 'Giáo Dục - Gia Đình'";
        $thongtinsach = executeResult($sql);
        break;
    
 }
       
?>