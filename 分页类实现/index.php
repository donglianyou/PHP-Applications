    <?php
    include 'config.php';
    include 'Page.class.php';

    //总页数
    $sqltot="select count(*) from user";
    $smtot=$pdo->prepare($sqltot);
    $smtot->execute();
    $tot = $smtot->fetchColumn();
    $page=new Page($tot,3);

    //页面数据
    $sql="select * from user limit {$page->offset},{$page->length}";
    $smt=$pdo->prepare($sql);
    $smt->execute();
    $rows=$smt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>用户列表</title>
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
        <script type="text/javascript" src="./js/jquery.js"></script>
        <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
        <style>
        th,td{
            text-align: center;
        }
        .nowPage{
            width: 35px;
            padding: 0;
            float: left;
            margin-right: 3px;
            line-height: 1.3;
            text-align: center;
        }
        .goPage{
            padding: 0 5px;
        }
        .nowlink{
            padding: .4rem .5rem;
        }
        .btn-group-sm>.btn, .btn-sm{
            line-height: 1.4;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1 class="page-header">用户管理 <a href="add.php" class="btn btn-success btn-lg" title="">添加</a></h1>
                <table class="table table-striped table-sm table-hover table-bordered">
                    <tr><th>编号</th><th>用户名</th><th>密码</th><th>修改</th><th>删除</th></tr>
                    <?php
                    foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['username']}</td>";
                        echo "<td>{$row['password']}</td>";
                        echo "<td><a href='edit.php?id={$row["id"]}' class='btn btn-warning btn-sm'>修改</a></td>";
                        echo "<td><a href=javascript:if(confirm('删除之后不可恢复，确定要删除吗?'))location='delete.php?id={$row["id"]}' class='btn btn-danger btn-sm'>删除</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table> 
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    
                    <li class="page-item"><a class="page-link" href="index.php?p=1">首页</a></li>
                    <li class="page-item">
                      <a class="page-link" href="index.php?p=<?php echo $page->prevPage;?>" aria-label="Previous">
                        <span aria-hidden="true">上一页</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="index.php?p=<?php echo $page->nextPage;?>" aria-label="Next">
                    <span aria-hidden="true">下一页</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="index.php?p=<?php echo $page->totPage;?>">末页</a></li>
            <li class="page-item"><a class="page-link">总计<?php echo $page->totPage;?>页</a></li>
            <li class="page-item">
                <form action="index.php" method="get" accept-charset="utf-8">
                    <a class="page-link nowlink" href="#"><input type="number" name="p" min="1" max="<?php echo $page->totPage;?>" class="form-control nowPage" value="<?php echo $page->curr;?>" placeholder=""><input type="submit" name="" class="btn btn-success btn-sm goPage" value="Go"></a>
                </form>
            </li>
        </ul>
    </nav>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
