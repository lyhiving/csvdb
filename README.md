# filedb: File database

利用JSON的特性来写的一个文本数据库，主要用于简单的数据存储。


## 安装

使用 Composer

```json
{
    "require": {
            "lyhiving/filedb": "1.0.*"
    }
}
```

## 用法

初始化：
```php
<?php
use lyhiving\filedb\filedb;
//指定数据库目录
$db = new filedb(['dir' => __DIR__ . '/db/']);

```

新增数据，返回一个KEY为MD5的唯一值。
```php
$item = [
    'name' => 'John-insert',
    'surname' => 'DEMOTE',
    'age' => '20',
    'email' => 'demo@test.com',
];
$newid = $db->insert('test', $item);
```

如果要指定KEY值，请用@id@这个标签标示
```php
$item = [
    '@id@' =>9,
    'name' => 'Smith',
    'surname' => 'DEMOTE',
    'age' => '20',
    'email' => 'demo@test.com',
];
$newid = $db->insert('test', $item);
//$newid =9;
```


获取全部数据：
```php
$result = $db->select('test'); //or $db->select_all('test');
```

获取指定ID数据：
```php
$row = $db->select('test', 1);
```

获取指定条件（简单where）数据：
```php
$rows = $db->select('test', array('name' => 'John-insert'));
```

删除指定ID：
```php
$rows = $db->delete('test', $newid);
```

获取全表：
```php
$rows = $db->delete('test');
```

复制到另外一个表：
```php
$result = $db->clone_to_db('test_clone');
```

输出到csv文件：
```php
$result = $db->save_to_csv($db->select_all('test'));
```