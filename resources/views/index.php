<!DOCTYPE html>
<html lang="en-US" ng-app="restaurantRecords">
    <head>
        <title>Laravel 5 AngularJS CRUD Example</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    </head>
    <body>
        <h2>restaurants Database</h2>
        <div  ng-controller="restaurantsController">

            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add',0)">Add New restaurant</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="restaurant in restaurants">
                        <td>{{  restaurant.id_restaurant }}</td>
                        <td>{{ restaurant.name }}</td>
                        <td>{{ restaurant.address }}</td>
                        <td>{{ restaurant.phone }}</td>
                        <td>{{ restaurant.img }}</td>
                        <td>
                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', restaurant.id_restaurant)">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(restaurant.id_restaurant)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmrestaurants" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" value="{{name}}" 
                                        ng-model="restaurant.name" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmrestaurants.name.$invalid && frmrestaurants.name.$touched">Name field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{address}}" 
                                        ng-model="restaurant.address" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmrestaurants.address.$invalid && frmrestaurants.address.$touched">Valid address field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{phone}}" 
                                        ng-model="restaurant.phone" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="frmrestaurants.phone.$invalid && frmrestaurants.phone.$touched">Phone number field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="img" name="img" placeholder="Image" value="{{img}}"
                                        ng-model="restaurant.img" ng-required="true">
                                    <span class="help-inline"
                                        ng-show="frmrestaurants.img.$invalid && frmrestaurants.img.$touched">Image field is required</span>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id_restaurant)" ng-disabled="frmrestaurants.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/restaurants.js') ?>"></script>
    </body>
</html>