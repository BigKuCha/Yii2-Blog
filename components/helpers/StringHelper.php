<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\helpers;

/**
 * StringHelper
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Alex Makarov <sam@rmcreative.ru>
 * @since 2.0
 */
class StringHelper extends BaseStringHelper
{
    /**
    * 打印数组
    * @param type $vars 要打印的数组
    * @param type $label 标注
    * @param type $return 是否断点
    * @return string|null
    */
   public static function dump($vars, $label = '', $return = false)
   {
       if (ini_get('html_errors'))
       {
           $content = "<pre>\n";
           if ($label != '')
               $content .= "<strong>{$label} :</strong>\n";
           $content .= htmlspecialchars(print_r($vars, true));
           $content .= "\n</pre>\n";
       } else
           $content = $label . " :\n" . print_r($vars, true);
       if ($return)
           return $content;
       echo $content;
       return null;
   }
    /**
     * /获取utf8单个字符字节数
     * @param type $str
     * @param type $startpos
     * @return int
     */
    public static function utf8strcount($str,$startpos=0)
    {
        $c = substr($str,$startpos,1); 
        if(ord($c)<0x80)
            return 1;
        else
        {
            if((ord($c)|0x1f)==0xdf)
                return 2;
            else
            {
                if((ord($c)|0xf)==0xef)
                    return 3;
                else
                {			
                    if((ord($c)|0x7)==0xf7)
                        return 4;
                    else
                        return 0;
                }
            }
        }	
    }
    /**
     * 按字符宽度截取utf8字符串，返回 "字符.."
     * @param type $in
     * @param type $num
     * @param type $endstr
     * @return string
     */
    public static function SubstrUTF8($in,$num,$endstr="...") 
    { 
        $pos = 0; 
        $strnum = 0;
        $parity = 0;
        $out = ""; 
        while($pos<strlen($in)) 
        { 
            $count = static::utf8strcount($in,$pos);
            if($count >0 )
            {
                if($count == 1)
                    $parity++;
                else
                    $parity+=2;
                if($parity/2 >= $num)
                {
                    $out .= $endstr;
                    break;
                }
                $c=substr($in,$pos,$count); 
                //遇到回车符跳出
                if($c=="\n" or $c=="\r") 
                    $c = " ";
                $out.=$c;
                $pos += $count; 
            }
            else
                break;
        } 
        return $out; 
    }  
}
