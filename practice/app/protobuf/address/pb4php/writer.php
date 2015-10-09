<?php
namespace tutorial;

// first include pb_message
require_once('message/pb_message.php');

// include the generated file
require_once('./pb_proto_addressbook.php');


$string = file_get_contents("adressbook.pb");
$book = new AddressBook();
$book->parseFromString($string);

$person = $book->add_person();
$person->set_id(mt_rand(10,100));
$person->set_name(substr(md5(mt_rand(1,100000)), 0, 4));
//$person->set_surname('Nikolai');

$phone_number = $person->add_phone();
$phone_number->set_number('1320000' . mt_rand(1000, 9999));
$phone_number->set_type(Person_PhoneType::WORK);

$phone_number = $person->add_phone();
$phone_number->set_number('1320000' . mt_rand(1000, 9999));
$phone_number->set_type(Person_PhoneType::MOBILE);

// serialize
$string = $book->SerializeToString();

// write it to disk
file_put_contents('adressbook.pb', $string);

