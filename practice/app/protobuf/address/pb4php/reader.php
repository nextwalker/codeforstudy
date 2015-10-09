<?php
namespace tutorial;

// first include pb_message
require_once('message/pb_message.php');

// include the generated file
require_once('./pb_proto_addressbook.php');

if (!isset($argv[1])) {
    echo "Usage php file.pb\n";
    exit(0);
}
if (!file_exists($argv[1])) {
    echo "$argv[1] not exists\n";
    exit(0);
}

$book = new AddressBook();


$string = file_get_contents($argv[1]);

$book->parseFromString($string);

$arrPerson  = $book->get_persons();
foreach($arrPerson as $person) {
    echo "id:", $person->id(), "\n";
    echo "name:", $person->name(), "\n";
    $phones = $person->get_phones();
    if (!empty($phones)) {
        foreach($phones as $phone) {
            echo "-phone:", $phone->number(), "\n"; 
        }
    }

    //var_dump($person->phones_size());
    //echo "phone:", $person->phone($person->phones_size()), "\n";

    echo "\n";
}

