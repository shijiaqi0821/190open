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
<font style="color:red">用户登录</font>

<form class="form-horizontal" role="form" method="post" action="{{url('/logindo')}}">
        @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-5">
            <input type="text" class="form-control bname" name="name"  placeholder="请输入名称">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-5">
            <input type="password" class="form-control bname" name="pass">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">登录</button>
        </div>
    </div>
</form>

</body>
</html>
<script src="/static/admin/js/jquery-3.2.1.min.js"></script>