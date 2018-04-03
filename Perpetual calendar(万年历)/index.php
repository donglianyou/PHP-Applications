<?php 
header("Content-type:text/html;charset=utf-8");
//获取年份
$year = isset($_GET['y'])?$_GET['y']:date('Y',time());
//获取月份
$month = isset($_GET['m'])?$_GET['m']:date('n',time());
//获取当前月总数
$days = date('t',strtotime("{$year}-{$month}-1"));
//本月一号是周几
$week = date('w',strtotime("{$year}-{$month}-4"));
//每月的第一天
$first=1-$week;
//下一个月
$nextMonth=$month+1;
$nextYear=$year+1;
//月数大于等于十二月份，则年+1，月变成下一年的1月份
if ($month>=12) {
    $nextYear+1;
    $nextMonth=1;
}else{
    $nextYear=$year;
    $nextMonth=$month+1;
}
//月数小于一月份，则年-1，月变成上一年的12月份
if ($month<=1) {
    $prevYear=$year-1;
    $prevMonth=12;
}else{
    $prevYear=$year;
    $prevMonth=$month-1;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>万年历</title>  
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<style type="text/css" media="screen">
.table td:hover {
  background-color: #f5f5f5;
}
</style>
</head>
<body>
<div class="container">
    <div class="col-5">
    <table class="table table-sm text-center">
        <h2 class="text-center">万年历-<? echo $year;?>年<? echo $month;?>月</h2>
        <thead>
            <tr class="table-info">
                <th>周日</th>
                <th>周一</th>
                <th>周二</th>
                <th>周三</th>
                <th>周四</th>
                <th>周五</th>
                <th>周六</th>
            </tr>
        </thead>
        <tbody>
        <? 
        for ($i=$first; $i <=$days;) { 
            echo "<tr>";
            for ($j=0; $j < 7; $j++) { 
                if ($i<=$days && $i>=1) {
                    echo "<td>{$i}</td>";
                }else{
                    echo "<td>&nbsp;</td>";
                }
                $i++;
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <div class="text-center"><h4><a href="index.php?y=<?php echo $prevYear;?>&m=<?php echo $prevMonth;?>">上一月</a> | <a href="index.php?y=<?php echo $nextYear;?>&m=<?php echo $nextMonth;?>">下一月</a></h4></div>
    </div>
</div>
</body>
</html>