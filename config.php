<?php

$config['settings'] = array(
    'path' => "library",                                    // 图书文件路径，一定要放在当前站点下，否则有可能读取不到
    'title' => "Ebook Library",                             // 标题
    'user' => 'Annun',                                      // 右侧用户名，当前仅占位使用
    // 'isKindle' => true,                                  // 是否在 Kindle 上访问：false true，默认会识别设备，如果设备没有被识别，请开启该配置
    'ext' => array("awz", "txt", "pdf",  "prc", "epub")     // 需要配置的文件格式
);

