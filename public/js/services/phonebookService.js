angular.module('phonebookService', [])

	.factory('PhoneBook', function($http) {

		return {
           	get : function() {
				return $http.get('api/contacts');
			},
			save:function(contactData){
			    return $http({
					method: 'POST',
					url: 'api/contact',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(contactData)
				});

			},
		    destroy : function(id) {
				return $http.delete('api/contact/' + id);
			},
			show : function(id){
                return $http.get('api/contact/' + id);
			},
			update : function(singleContact,id){
				return $http({
					method:'PUT',
					url: 'api/contact/'+id,
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(singleContact)
				});
			}
		}

	});