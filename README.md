Hanzi
=====

获取汉字的拼音, 或者简繁体转换

# 安装方法
命令行下, 执行 composer 命令安装:
````
composer require fengqi/hanzi
````

# 使用示例
````
use fengqi\Hanzi\Hanzi;

$chs = '中国人';
$cht = '中國人';

// 简繁体获取拼音
var_dump(Hanzi::pinyin($chs));
var_dump(Hanzi::pinyin($cht));

// 简繁体转换
var_dump(Hanzi::turn($chs));
var_dump(Hanzi::turn($cht, true));
````

# 关于部分无法正确转换
> 可以自行补充 src/ 下 Dict.php 中的字典
