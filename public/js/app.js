var phonebookApp = angular.module('phonebookApp', ['mainCntrl', 'phonebookService'],function($interpolateProvider){
	    $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
});
