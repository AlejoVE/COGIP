<?php
declare(strict_types=1);

// namespace Becode\MVCBoilerplate\Model;

class Manager
{
	protected function connectDb()
	{
		try {
			$db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $error) {
			echo $error->getMessage();
			exit;
		}
	}

}