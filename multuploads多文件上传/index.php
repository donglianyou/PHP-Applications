<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>多文件上传</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-4">
            <h3>多文件上传：</h3>
            <hr>
            <form action="up.php" method="post" enctype="multipart/form-data">
                <div class="custom-file form-group mt-2">
                    <input type="file" name="img1" class="custom-file-input" value="上传图片" placeholder="上传图片">
                    <label class="custom-file-label" for="customFile">请选择图片1</label>
                </div>
                <div class="custom-file form-group mt-2">
                    <input type="file" name="img2" class="custom-file-input" value="上传图片" placeholder="上传图片">
                    <label class="custom-file-label" for="customFile">请选择图片2</label>
                </div>
                <div class="custom-file form-group mt-2">
                    <input type="file" name="img3" class="custom-file-input" value="上传图片" placeholder="上传图片">
                    <label class="custom-file-label" for="customFile">请选择图片3</label>
                </div>
                <div class="custom-file form-group mt-2">
                    <input type="file" name="img4" class="custom-file-input" value="上传图片" placeholder="上传图片">
                    <label class="custom-file-label" for="customFile">请选择图片4</label>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" name="" class="btn btn-primary" value="上传">
                </div>
            </form>
        </div>
    </div>
</body>
</html>