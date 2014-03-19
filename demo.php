<?php
/**
 * #description
 *
 * @author  fengqi <lyf362345@gmail.com>
 * @version $Id: $
 */

include 'Hanzi.php';

$str = '中国人';
var_dump(Hanzi::SimplifiedToPinyin($str));
var_dump(Hanzi::SimplifiedTurnTraditional($str));
