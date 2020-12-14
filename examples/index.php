<?php
include __DIR__ . '/../autoload.php';

use lyhiving\filedb\filedb;

$db = new filedb(['dir' => __DIR__ . '/db/']);

$item = [
    'name' => 'John-insert',
    'surname' => 'DEMOTE',
    'age' => '20',
    'email' => 'demo@test.com',
];
$newid = $db->insert('test', $item);

$item = [
    '@id@' => 9,
    'name' => 'Smith',
    'surname' => 'Local',
    'age' => '18',
    'email' => 'smith@test.com',
];
$db->insert('test', $item);

var_dump($newid);

echo 'Insert new record:' . PHP_EOL;
$item = [
    'name' => 'John-insert' . date('Y-m-d_His'),
    'surname' => 'Doe',
    'age' => '45',
    'email' => 'test@test.com',
];
$result = $db->insert('test', $item);

if ($result) {
    echo 'Insert new success!' . PHP_EOL;
} else {
    echo 'Insert new faild!' . PHP_EOL;
}
echo PHP_EOL;

//Select All
echo 'Find all records:' . PHP_EOL;
$result = $db->select('test'); //or $db->select_all('test');
var_dump($result);
echo PHP_EOL;

echo 'Find record by id:' . PHP_EOL;
$row = $db->select('test', 9);
var_dump($row);
echo PHP_EOL;

echo 'Find record with where situation:' . PHP_EOL;
//Select with where situation
$rows = $db->select('test', array('name' => 'John-insert'));
var_dump($rows);
echo PHP_EOL;

echo 'Update record:' . PHP_EOL;
$update = [
    'name' => 'Jehn NEW UPDATE',
    'surname' => 'Doe',
    'age' => '26',
    'email' => 'jehn.demo@jehn.com',
];
$result = $db->update('test', $update, $newid);
if ($result) {
    echo 'Update success!' . PHP_EOL;
} else {
    echo 'Update  faild!' . PHP_EOL;
}
echo PHP_EOL;

echo 'Save records to a csv file:' . PHP_EOL;
//Select with where situation
$result = $db->save_to_csv($db->select_all('test'));
//$db->save_to_csv($db->select_all('test'), __DIR__ . '/logs/tt.csv');
if ($result) {
    echo 'Save to csv file success!' . PHP_EOL;
} else {
    echo 'Save to csv file faild!' . PHP_EOL;
}
echo PHP_EOL;

echo 'Clone db:' . PHP_EOL;
$result = $db->clone_to_db('test_clone');
if ($result) {
    echo 'Clone db success!' . PHP_EOL;
} else {
    echo 'Clone db  faild!' . PHP_EOL;
}
echo PHP_EOL;

echo 'Delete record by id:' . PHP_EOL;
$result = $db->delete('test', $newid);
if ($result) {
    echo 'Delete success!' . PHP_EOL;
} else {
    echo 'Delete  faild!' . PHP_EOL;
}
echo PHP_EOL;

echo 'Delete all records:' . PHP_EOL;
$result = $db->delete('test');
if ($result) {
    echo 'Delete all success!' . PHP_EOL;
} else {
    echo 'Delete all faild!' . PHP_EOL;
}
echo PHP_EOL;
