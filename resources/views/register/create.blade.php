<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
<script src="/static/admin/js/jquery-3.2.1.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<h2></h2>
<h2></h2>
<h2></h2>
<h2></h2>
<h2></h2>

<font style="color:red">用户注册</font>

<form class="form-horizontal" role="form" method="post" action="{{url('/regdo')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">公司名</label>
            <div class="col-sm-5">
                <input type="text" class="form-control bname" name="corp" id="firstname" placeholder="请输入公司名称">
            </div>
        </div>

        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">法人</label>
            <div class="col-sm-5">
                <input type="text" class="form-control bname" name="person" id="firstname"
                       placeholder="请输入法人名称">
            </div>
        </div>

        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">营业执照</label>
            <div class="col-sm-5">
                <input type="file" class="form-control bname" name="scope">
            </div>
        </div>

        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">联系人电话</label>
            <div class="col-sm-5">
                <input type="text" class="form-control bname" name="tel" placeholder="请输入联系人电话">
            </div>
        </div>

        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-5">
                <input type="text" class="form-control bname" name="email" placeholder="请输入联系人Email">
            </div>
        </div>

        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-5">
                <input type="password" class="form-control bname" name="pass">
            </div>
        </div>

        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">公司地址</label>
            <div class="col-sm-5">
                <textarea placeholder="请输入公司地址" class="form-control area"  name="address"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">注册</button>
            </div>
        </div>

</form>

</body>
</html>
    <script src="/static/admin/js/jquery-3.2.1.min.js"></script>