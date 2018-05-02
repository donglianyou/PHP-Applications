<?php 
/**
* 分页类
*/
class Page{
    public $offset;
    public $length;
    public $tot;
    public $prevPage;
    public $nextPage;
    public $totPage;
    public $curr;
    
    function __construct($tot,$length){
        $this->tot=$tot;
        $this->length=$length;
        //总页数
        $totPage=ceil($tot/$length);
        $this->totPage=$totPage;
        //当前页数
        $curr=@$_GET['p'];
        if ($curr>=$totPage) {
            $curr=$totPage;
        }
        if ($curr<=1) {
            $curr=1;
        }
        $this->curr=$curr;
        //前一页
        $prevPage=$curr-1;
        if ($prevPage<=1) {
            $prevPage=1;
        }
        $this->prevPage=$prevPage;
        //下一页
        $nextPage=$curr+1;
        if ($nextPage>=$totPage) {
            $nextPage=$totPage;
        }
        $this->nextPage=$nextPage;
        //每页当前条数起始和结束数据
        $offset=($curr-1)*$length;
        $this->offset=$offset;
    }
}
?>