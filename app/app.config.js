
chat.config(config);

function config ($stateProvider){
  $stateProvider
    .state('root', {
			url: "",
      views: {
        'chat': {
          templateUrl: 'app/chat/chat.html',
          controller: 'dataCtrl'
        }
			}	
		})
}		
	