@extends('layouts.master')
@section('title', 'Home')
@section('content')
   <div class="col-md-8 col-md-offset-2" data-ng-controller='PhonebookController'> 
     <div class="col-md-4 form-group">
     	   <input type="text" class="form-control" data-ng-model="search" name="search" placeholder="Search Contact">
     </div>
	  <table class="table .table-striped">
		  	<thead>
		  		<tr>
		  			<th>#</th>
		  			<th>{{ trans('app.Name') }}</th>
		  			<th>{{ trans('app.Email') }}</th>
		  			<th>{{ trans('app.Contact') }} #</th>
		  			<th>{{ trans('app.Action') }}</th>
		  		</tr>
		  	</thead>
		  	<tbody>
		  		<tr data-ng-repeat="(key,contact) in contacts | filter:search">
		  		    <td><% key+1 %></td>
		  			<td><% contact.name %></td>
		  			<td><% contact.email %></td>
		  			<td><% contact.msisdn %></td>
		  			<td>
		  				<button data-ng-click="updateContact(contact.id)" class="btn btn-info">Edit</button>
		  				<button data-ng-click="deleteContact(contact.id)" data-ng-confirm-click="You are about to delete your Contact !! Are you SURE you want to delete?" class="btn btn-danger">Delete</button>
		  			</td>
		  		</tr>
		  	</tbody>
	  </table>
	  <div class="col-md-8 col-md-offset-2">
	    <!-- Create Contact -->
	      <div class="panel panel-primary" data-ng-show="create==true">
	          <div class="panel-heading">
	          	<h2>{{ trans('app.create_contact_head') }}</h2>
	          </div>
	          <div class="panel-body">
	          	<form data-ng-submit="contactSubmit()" name="create_contact">
					  <div class="form-group">
					    <label for="name">Name:</label>
					    <input type="text" class="form-control" id="name" data-ng-model="contactData.name" name="name">
					    <span ng-show="create_contact.name.$error.required">The name is required.</span>
					  </div>
					  <div class="form-group">
					    <label for="email">Email:</label>
					    <input type="email" class="form-control" id="email" data-ng-model="contactData.email" name="email">
					  </div>
					  <div class="form-group">
					    <label for="number">Contact No:</label>
					    <input type="text" class="form-control" id="number" data-ng-model="contactData.msisdn" name="msisdn">
					  </div>
					  {{csrf_field()}}
				     <button type="submit" class="btn btn-default">Submit</button>
			      </form>
	          </div>
	      </div>
         <!-- Edit form -->
	      <div class="panel panel-warning" data-ng-show="edit==true">
	          <div class="panel-heading">
	          	<h2>Edit Contact</h2>
	          </div>
	          <div class="panel-body">
	          	<form data-ng-submit="contactUpdate(singleContact.id)">
					  <div class="form-group">
					    <label for="name">Name:</label>
					    <input type="text" class="form-control" id="name" data-ng-model="singleContact.name" name="name">
					  </div>
					  <div class="form-group">
					    <label for="email">Email:</label>
					    <input type="email" class="form-control" id="email" data-ng-model="singleContact.email" name="email">
					  </div>
					  <div class="form-group">
					    <label for="number">Contact No:</label>
					    <input type="text" class="form-control" id="number" data-ng-model="singleContact.msisdn" name="msisdn" >
					  </div>
					  {{csrf_field()}}
				     <button type="submit" class="btn btn-warning">Update</button>
			      </form>
	          </div>
	      </div>
      </div>
   </div>
@stop