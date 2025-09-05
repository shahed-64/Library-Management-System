@extends('layouts.app')

@section('main')
                <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">All Books</h3>

							</div>
						</div>
					</div>
					<!-- /Page Header -->
                        <a class="btn btn-primary" href="{{ route('book.create') }}"> Create a book</a>
                </br>
						<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>#</th>
                                                    <th>photo</th>
													<th>Title</th>
													<th>Author</th>
                                                    <th>Copy</th>
													<th>Available Copy</th>
													<th>Isbn</th>

                                                    <th>action</th>
												</tr>
											</thead>
											<tbody>

											@foreach( $books as $item);
												<tr>
													<td>{{ $loop -> iteration; }}</td>
                                                    <td> <img style="width:50px; height:60px;" src="{{ URL::to('media/book/' . $item -> cover) }}" alt=""> </td>

													<td>{{ $item -> title }}</td>
													<td>{{ $item -> author }}</td>
													<td>{{ $item -> copy }}</td>
                                                    <td>{{ $item -> available_copy }}</td>
													<td>{{ $item -> isbn }}</td>

													<td>$320,800</td>
												</tr>
											@endforeach


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
@endsection
