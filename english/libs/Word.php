<?php

class Word
{
    protected $myPDO;
    public function __construct()
    {
	$this->myPDO = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME ,DB_USER, DB_PASS);
       $this->myPDO->exec("set names utf8");	
    }

    public function add($wordEn, $wordRu)
    {
	#echo " $wordEn -- $wordRu ";
	//INSERT INTO words_en (word) VALUES ('word');

	$q = 'select * from words_en where word = ?  LIMIT 1';

	$t=$this->myPDO->prepare($q);
	$t->execute(array($wordEn));
	
	if($t->rowCount() > 0)
	{
	    return false;
	}
	
	
	$q = 'INSERT INTO words_en (word) VALUES (:val)';
	$t=$this->myPDO->prepare($q);
	$t->execute(array(':val'=> $wordEn));
	$idEn = $this->myPDO->lastInsertId();
	
	$q = 'INSERT INTO words_ru (word) VALUES (:val)';
	$t=$this->myPDO->prepare($q);
	$t->execute(array(':val'=> $wordRu));
	$idRu = $this->myPDO->lastInsertId();

	$q = ' INSERT INTO ru2en (idRu, idEn) VALUES (:ru, :en)';
	$t=$this->myPDO->prepare($q);
	$t->execute(array(':ru'=> $idRu , ':en'=>$idEn ));

	return true;
	
    }

    public function showAll()
    {
	$q = 'select words_ru.word as Ru, words_en.word as En  from ru2en, words_en, words_ru 
	    where ru2en.idRu = words_ru.id AND ru2en.idEn = words_en.id;' ;

	$result = $this->myPDO->query($q);
	
	$arr = array();
	while($row = $result->fetch())
	{
	    // в результате получаем ассоциативный массив
	    #print_r($row);

	    $arr[] =  $row;


	}
	
	

	return $arr;

    }

    public function search($word)
    {
    
    }
}
