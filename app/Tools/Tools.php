<?php
class Tools
{
    /**
     * 无限极分类
     * @param array $arr[要排序的数组]
     * @param integer $pid[父id]
     * @return array [排序好的数组]
     */
    public static function tree($arr,$pid=0,$lenvel=0)
    {
//        dd(132);
    static $res = array();
    foreach($arr as $v){
    if ($v['p_id'] == $pid){//找到顶级id
        $v['lenvel'] = $lenvel;
        $res[] = $v;
        self::tree($arr,$v['c_id'],$lenvel+1);
    }
}
    return $res;
}
}
