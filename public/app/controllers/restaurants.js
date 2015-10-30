app.controller('restaurantsController', function($scope, $http, API_URL) {
    //retrieve restaurants listing from API
    $http.get(API_URL + "restaurants")
            .success(function(response) {
                $scope.restaurants = response;
            }).
            error(function(response) {
                            console.log(response);
                            alert('This is embarrassing. An error has occured.');
                        });;

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;
        console.log(modalstate);
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Restaurant";
                break;
            case 'edit':
                $scope.form_title = "Restaurant Detail";
                $scope.id = id;
                $http.get(API_URL + "restaurants/" + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.restaurant = response;
                        }).
                        error(function(response) {
                           // console.log(response);
                            alert('This is embarrassing. An error has occured. Please check the log for details');
                        });
                break;
            default:
                break;
        }
        console.log("ID : " + id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
//        console.log("Save : " + modalstate + response);
        var url = API_URL + "restaurants";
        //append restaurant id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.restaurant),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'restaurants/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
});