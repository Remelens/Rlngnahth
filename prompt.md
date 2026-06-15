# 适配 Typecho 1.3.0：修复归档页面文章链接问题

## 问题描述

Typecho 1.2.1 主题 Rlngnahth 中的归档模板页 (`page_list.php`) 在 Typecho 1.3.0 下无法显示文章链接。

## 根因

`functions.php:343` 中的 `getArchives($widget)` 函数通过 `Typecho\Db` 直接查询 `table.contents` 表获取文章列表，然后调用 `$widget->filter($row)` 处理每一行数据。在 Typecho 1.2.1 中，`filter()` 方法返回的数组包含 `permalink` 字段；但在 Typecho 1.3.0 中，该字段不再通过数据库查询直接返回，导致 `$row['permalink']` 为空，所有文章链接失效。

## 要求

仅修复 `page_list.php` 和/或 `functions.php` 中 `getArchives()` 函数内的链接获取问题，使归档页面能正确生成每篇文章的链接。**请勿修改 `functions.php` 中其他函数或现有逻辑。**

## 参考

- 当前 `page_list.php` 中 PHP 代码段（行 17-18）为空，需补充调用逻辑
- 当前 `getArchives()` 位于 `functions.php:343-362`
- `$widget->filter($row)` 在 Typecho 1.3.0 中不再返回 `permalink` 字段，请自行搜索 Typecho 1.3.0 中文档中推荐的替代方式（如 `$widget->push($row)` 或手动构建路由）
