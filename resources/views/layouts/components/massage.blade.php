    @if(Session::has('success'))
   
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Success!</strong> Your <a href="#" class="alert-link">message</a>{{ Session::get('success'); }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

    @if($errors -> any())
   
<div class="alert alert-success alert-dismissible fade show btn btn-danger col-md-12" style="text-align:left;" role="alert">
	<strong >{{ $errors -> first(); }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
	</button>
</div>
@endif