	chat.service ( 'httpService', serviceFunction);
	
	function serviceFunction($http, $q){
		this.getHistory = function (updateTime){
			return $http.get('assets/fakeData/chat.json')
			// return $http.get('app/services/json.php?function=get') -- для бэкэнда
			.then(function (data){
				messageData = data.data;
				newHistory = messageData.filter(
					function (value){
						return (value.timestamp > updateTime);
					}
				);
				return newHistory
			});
		};
		this.postMessage = function (user, msg){
			datetime = new Date();
			message = '{"user":"'+user+'","msg":"'+msg+'","timestamp":"'+datetime.getTime()+'"}';
			//return $http.get('app/services/json.php?msg=' + message);  -- для бэкэнда
			alert('Chat with Back-end: http://j296223m.bget.ru/');
			return true;
		};
	};
		
