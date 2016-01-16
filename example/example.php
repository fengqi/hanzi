<?php

use fengqi\Hanzi\Hanzi;

$chs = '中国人';
$cht = '中國人';

// 简繁体获取拼音
var_dump(Hanzi::pinyin($chs));
var_dump(Hanzi::pinyin($cht));

// 简繁体转换
var_dump(Hanzi::turn($chs));
var_dump(Hanzi::turn($cht, true));

// 版本
var_dump(Hanzi::VERSION);
