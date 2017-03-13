var app=angular.module('mainCntrl',[])
        .controller('PhonebookController',function($scope,$http,PhoneBook){
        // object to hold all the data for the new contacts form
		$scope.contacts = {};

		// loading variable to show the spinning loading icon
		$scope.loading = true;
		$scope.create=true;
		// get all the contacts first and bind it to the $scope.contacts object
		PhoneBook.get()
			.success(function(data) {
				$scope.contacts = data;
				$scope.loading = false;
			});
					// function to handle submitting the form
		$scope.contactSubmit = function() {
			$scope.loading = true;
            $scope.create=true;
			// save the comment. pass in contact data from the form
			PhoneBook.save($scope.contactData)
				.success(function(data) {
					$scope.contactData = {};
					// if successful, we'll need to refresh the contact list
					PhoneBook.get()
						.success(function(getData) {
							$scope.contacts = getData;
							$scope.loading = false;
						});

				})
				.error(function(data) {
					console.log(data);
				});
		};
		//delete the contact
        $scope.deleteContact=function(id){
        	$scope.loading=true;
        	$scope.create=true;
        	$scope.edit=false;
            if (confirm('Are u sure u want to delete this Contact?')) {
            	PhoneBook.destroy(id)
        	       .success(function(){
                      // if successful, we'll need to refresh the contact list
					   PhoneBook.get()
						.success(function(getData) {
							$scope.contacts = getData;
							$scope.loading = false;
						});
        	       });
            };
        };
        $scope.updateContact=function(id){
            $scope.loading=true;
            $scope.edit=true;
            $scope.create=false;
            PhoneBook.show(id)
                     .success(function(data){
                           $scope.singleContact=data;
                     	    PhoneBook.get()
                     	    	.success(function(getData){
                     	    		$scope.contacts = getData;
							        $scope.loading = false;
                     	    	});
                            
                     });
        };
        $scope.contactUpdate=function(id){
            $scope.loading=true;
            $scope.create=true;
            $scope.edit=false;
            PhoneBook.update($scope.singleContact,id)
                     .success(function(){
                     	    PhoneBook.get()
                     	    	.success(function(getData){
                     	    		$scope.contacts = getData;
							        $scope.loading = false;
                     	    	});
                            
                     });
        };
        });