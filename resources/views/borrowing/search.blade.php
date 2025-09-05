@extends('layouts.app')

@section('main')
                <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">

						@include('layouts.components.massage')
                                <div class="row">
						<div class="col-xl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Search a Student</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('borrow.students-search') }}" method="POST" >
                                        @csrf
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Student Id/ Email / Phone</label>
											<div class="col-lg-9">
												<input name="search" type="text" class="form-control">
											</div>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>


							</div>
						</div>
					</div>
					<!-- /Page Header -->

  <div class="row">
    @foreach ( $students as $item )
		<div class="col-12 col-md-3 col-lg-3 d-flex">
			<div class="card flex-fill">
				<img alt="Card Image" style="height:140px; width:100%;" src="{{ URL::to('media/students/'. $item -> photo) }}" class="card-img-top">
				<div class="card-header">
					<h5 class="card-title mb-0">{{ $item -> name }}</h5>
				</div>
				<div class="card-body">
					<a class="btn btn-primary" href="{{ route('borrow.students-assign', $item -> student_id) }}">Assign Book</a>
				</div>
			</div>
		</div>
    @endforeach
</div>




				</div>
			</div>
@endsection
