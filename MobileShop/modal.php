<html>
    <head>
        <script language="javascript">
            function validateForm()
            {
                var tendangnhap = document.getElementById("tendangnhap").value;
                var matkhau = document.getElementById("matkhau").value;
                var xacnhanmatkhau = document.getElementById("xacnhanmatkhau").value;
                var hoten = document.getElementById("hoten").value;
                var diachi = document.getElementById("diachi").value;
                if (tendangnhap == '') {
                    alert('Bạn chưa nhập tên đăng nhập');
                } else if (matkhau == '')
                {
                    alert('Bạn chưa nhập mật khẩu');
                }else if(xacnhanmatkhau ==''){
                    alert('Bạn chưa nhập mật khẩu xác nhận');
                }else if(matkhau != xacnhanmatkhau){
                    alert('Mật khẩu xác nhận không trùng khớp');
                }else if(hoten == ''){
                    alert('Bạn chưa nhập họ tên');
                }else if(diachi == ''){
                    alert('Bạn chưa nhập địa chỉ');
                }
                else {
                    return true;
                }
                return false;
            }
        </script>
    </head>
    <div class="modal fade" id="dangnhap" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Đăng nhập</h4>
                </div>
                <div class="modal-body">
                    <form action="dangnhap.php" method="post">
                        <input style="margin-bottom: 10px; border-radius:5px; width: 100%;" placeholder="Tên đăng nhập" name="tendangnhap">
                        <input style="margin-bottom: 10px; border-radius:5px; width: 100%;" placeholder="Mật khẩu" type="password" name="matkhau">
                        <button style="width: 100%" class="btn btn-sm btn-success" name="login" value="1">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="taotaikhoan" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tạo tài khoản</h4>
                </div>
                <div class="modal-body">
                    <form action="dangky.php" onsubmit="return validateForm()" method="POST">
                        <input id="tendangnhap" style="margin-bottom: 10px; border-radius:5px; width: 100%;" name="tendangnhap" placeholder="Tên đăng nhập">
                        <input id="matkhau" type="password" style="margin-bottom: 10px; border-radius:5px; width: 100%;" name="matkhau" placeholder="Mật khẩu">
                        <input id="xacnhanmatkhau" type="password" style="margin-bottom: 10px; border-radius:5px; width: 100%;" name="xacnhanmatkhau" placeholder="Xác nhận mật khẩu">
                        <input id="hoten" style="margin-bottom: 10px; border-radius:5px; width: 100%;" name="hoten" placeholder="Họ tên">
                        <input id="diachi" style="margin-bottom: 10px; border-radius:5px; width: 100%;" name="diachi" placeholder="Địa chỉ">
                        <input id="email" type="email" style="margin-bottom: 10px; border-radius:5px; width: 100%;" name="email" placeholder="Email">
                        <button class="btn btn-sm btn-success" name="dangky" value="1">Tạo tài khoản</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</html>

