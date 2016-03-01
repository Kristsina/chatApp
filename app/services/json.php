	<?php
	
	if(isset($_GET["msg"])){
		$data = stripslashes($_GET["msg"]);
		$inp = file_get_contents('../../assets/fakeData/chat.json');
		$tempArray = json_decode($inp);
		array_push($tempArray, $data);
		$jsonData = json_encode($tempArray);		
		$clearJsonData = stripslashes(str_replace('}"', "}", str_replace('"{', "{", $jsonData)));
		file_put_contents('../../assets/fakeData/chat.json', $clearJsonData);
	}
	
	if(isset($_GET["function"]) && $_GET["function"] == "clear"){
		$data = $_GET["function"];
		echo $data;
		$jsonData = '[{"user":"Petr","time":"07:12","msg":"Gaming application","timestamp":"1"},{"user":"Ivan","time":"07:44","msg":"Gifts for friends","timestamp":"1"},{"user":"Sergey","time":"08:11","msg":"Page ranks increasing","timestamp":"1"},{"user":"Kristina","time":"08:14","msg":"Gaming application","timestamp":"1"},{"user":"Sergey","time":"08:15","msg":"Advertising","timestamp":"1"}]';
		file_put_contents('../../assets/fakeData/chat.json', $jsonData);
	}
	
	if(isset($_GET["function"]) && $_GET["function"] == "get"){
		$inp = file_get_contents('../../assets/fakeData/chat.json');
			
		function json_encode_cyr($str) {
			$arr_replace_utf = array('u0410', 'u0430','u0411','u0431','u0412','u0432',
			'u0413','u0433','u0414','u0434','u0415','u0435','u0401','u0451','u0416',
			'u0436','u0417','u0437','u0418','u0438','u0419','u0439','u041a','u043a',
			'u041b','u043b','u041c','u043c','u041d','u043d','u041e','u043e','u041f',
			'u043f','u0420','u0440','u0421','u0441','u0422','u0442','u0423','u0443',
			'u0424','u0444','u0425','u0445','u0426','u0446','u0427','u0447','u0428',
			'u0448','u0429','u0449','u042a','u044a','u042d','u044b','u042c','u044c',
			'u042d','u044d','u042e','u044e','u042f','u044f');
			$arr_replace_cyr = array('А', 'а', 'Б', 'б', 'В', 'в', 'Г', 'г', 'Д', 'д', 'Е', 'е',
			'Ё', 'ё', 'Ж','ж','З','з','И','и','Й','й','К','к','Л','л','М','м','Н','н','О','о',
			'П','п','Р','р','С','с','Т','т','У','у','Ф','ф','Х','х','Ц','ц','Ч','ч','Ш','ш',
			'Щ','щ','Ъ','ъ','Ы','ы','Ь','ь','Э','э','Ю','ю','Я','я');
			$str1 = json_encode($str);
			$str2 = str_replace($arr_replace_utf,$arr_replace_cyr,$str1);
			return $str2;
		}
			
		$utf = json_encode_cyr($inp);
		$clearJsonData = stripslashes(str_replace('"[', "[", str_replace(']"', "]", $utf)));
		echo $clearJsonData;
	}
	
	?>