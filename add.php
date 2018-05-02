<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加用户</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1 class="page-header">用户管理 </h1>
                <form action="insert.php" method="post" accept-charset="utf-8">
                    <div class="form-group">
                        <label>用户名：</label>
                        <input type="text" name="username" class="form-control" placeholder="用户名">
                    </div>
                    <div class="form-group">
                        <label>密码：</label>
                        <input type="text" name="password" class="form-control" placeholder="密码">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="添加" class="btn btn-primary btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
