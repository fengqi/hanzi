<?php

use fengqi\Hanzi\Hanzi;

$chs = '中国人';
$cht = '中國人';

// 简繁体获取拼音
var_dump(Hanzi::SimplifiedToPinyin($chs));
var_dump(Hanzi::SimplifiedToPinyin($cht));

// 简繁体转换
var_dump(Hanzi::SimplifiedTurnTraditional($chs));
var_dump(Hanzi::SimplifiedTurnTraditional($cht, false, true));
