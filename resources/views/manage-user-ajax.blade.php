<!DOCTYPE html>
<html>
<head>
	<title>Address Book Web App</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
</head>
<body>

	<div class="container">

		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		            <h2>Address Book</h2>
		        </div>
		        <div class="pull-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-user">
					  Create User
				</button>
		        </div>
		    </div>
		</div>

		<table class="table table-bordered">
			<thead>
			    <tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th width="200px">Action</th>
			    </tr>
			</thead>
			<tbody>
			</tbody>
		</table>

		<ul id="pagination" class="pagination-sm"></ul>

	    <!-- Create User Modal -->
		<div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Create User</h4>
		      </div>
		      <div class="modal-body">

		      		<form data-toggle="validator" action="{{ route('user-ajax.store') }}" method="POST">
						<div class="form-group">
							<label class="control-label" for="title">First Name:</label>
							<input type="text" name="first_name" class="form-control" data-error="Please enter First Name." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Last Name:</label>
							<textarea name="last_name" class="form-control" data-error="Please enter Last Name." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Phone:</label>
							<textarea name="phone" class="form-control" data-error="Please enter Phone num." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Email:</label>
							<textarea name="email" class="form-control" data-error="Please enter Email address." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn crud-submit btn-success">Submit</button>
						</div>
		      		</form>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Edit User Modal -->
		<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
		      </div>
		      <div class="modal-body">

		      		<form data-toggle="validator" action="/user-ajax/14" method="put">
		      			<div class="form-group">
							<label class="control-label" for="title">First Name:</label>
							<input type="text" name="first_name" class="form-control" data-error="Please enter First Name." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Last Name:</label>
							<textarea name="last_name" class="form-control" data-error="Please enter Last Name." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Phone:</label>
							<textarea name="phone" class="form-control" data-error="Please enter Phone num." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Email:</label>
							<textarea name="email" class="form-control" data-error="Please enter Email address." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
						</div>
		      		</form>

		      </div>
		    </div>
		  </div>
		</div>

	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="js\jquery-3.1.1.js"></script>-->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">


</body>
</html>