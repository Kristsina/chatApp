	chat.controller ( 'dataCtrl', getData);

	function getData ($scope, $http, httpService, $timeout ) {
		var updateTime = 0;
		$scope.homepage = true;
		$scope.showData = function (){
			var user = "Anonymous";
			httpService.postMessage($scope.user, $scope.msg);
				$scope.msg = "";
				console.log("Sended");
		}
		
		$scope.changeWindow = function (){
			$scope.homepage = !$scope.homepage;
			if (typeof $scope.user == 'undefined') {$scope.user = "Anonymous"};
		}
			
		$scope.messageData = [];
		$scope.load = function (){
			httpService.getHistory(updateTime).then(success, error);
			function success(responce){
				if (responce.length > 0){
					updateTime = responce[0].timestamp;
					for (i = 0; i < responce.length; ++i){
						if (responce[i].timestamp > updateTime) updateTime = responce[i].timestamp;
						var current1 = responce[i].timestamp;
						var newTime = new Date(parseInt(current1));
						responce[i].time = newTime.getHours() + ':' + newTime.getMinutes();
					}
					$scope.messageData = $scope.messageData.concat(responce);
					if ($scope.messageData.length > 10) {$scope.messageData.splice(0, ($scope.messageData.length - 10))};
				}
			}
			function error(error){
				console.log("Something goes wrong", error);
			}
		};
		
		var update = function(){
			$scope.load();
			$timeout(update, 1000);
			console.log('Updated');
		};
		update();
	};