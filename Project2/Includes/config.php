<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is used to make a connection with XML file and perform various IO operations
-->


<?php

class config{
    private $userFile;
    public function __construct(){
        $this->userFile = 'XML/user.xml';

        if(!file_exists($this->userFile)) {
            $xml = new DOMDocument('1.0', 'UTF-8');

            $root = $xml->createElement('User');
            $xml->appendChild($root);

            $xml->formatOutput = true;
            $xml->save($this->userFile);
            unset($xml);
        }
    }

    public function saveUser($name, $surname, $email, $password, $admin){
        $xml = new DOMDocument('1.0', 'UTF-8');
        $xml->loadXML('<?xml version="1.0" encoding="UTF-8"?><User/>');
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;
        $xml->load($this->userFile);

        $newUser = $xml->createElement('user');
        $newUser->appendChild($xml->createElement('name', $name));
        $newUser->appendChild($xml->createElement('surname', $surname));
        $newUser->appendChild($xml->createElement('email', $email));
        $newUser->appendChild($xml->createElement('password', $password));
        $newUser->appendChild($xml->createElement('admin', $admin));


        $root = $xml->getElementsByTagName('User')->item(0);
        $root->appendChild($newUser);
        $xml->save($this->userFile);

        return true;
    }
    public function getUser($email){
        $xml = new DOMDocument();
        $xml->load($this->userFile);

        $emails = $xml->getElementsByTagName('email');
        foreach ($emails as $user) {
            $emailValue = $user->nodeValue;
            if ($emailValue === $email) {
                return true;
            }
        }
        return false;
    }
}
?>