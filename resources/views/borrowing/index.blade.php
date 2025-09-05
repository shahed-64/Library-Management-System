@extends('layouts.app')

@section('main')
                <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">All Borrows</h3>

							</div>
						</div>
					</div>
					<!-- /Page Header -->
                        <a class="btn btn-primary" href="{{ route('borrow.search') }}"> Create a Borrow</a>
                </br>

                @include('layouts.components.massage')
						<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>#</th>
                                                    <th>Name</th>
													<th>Book</th>
													<th>Issue Date</th>
													<th>Return Date</th>
													<th>Status</th>
                                                    <th>Created At</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

                                            @foreach ( $borrows as $item )
                                                <tr>
													<td>{{ $loop -> iteration; }}</td>
													<td><img style="width:50px; height:60px;" src="{{ URL::to('media/students/' . $item -> photo) }}" alt=""> {{ $item -> name }}</td>

                                                    <td><img style="width:50px; height:60px;" src="{{ URL::to('media/book/' . $item -> cover) }}" alt="">{{ $item -> title}}</td>

                                                    <td>{{ date('F d, i', strtotime($item -> issue_date)) }}</td>




                                                    @if (ceil( \carbon\carbon::now() -> diffInDays(\carbon\carbon::parse($item -> return_date, false ))) <= 0)

                                                        <td class="text-danger">{{ abs(ceil( \carbon\carbon::now() -> diffInDays(\carbon\carbon::parse($item -> return_date, false ))))}} days</td>

                                                    @else
                                                     <td class="text-success">{{ ceil( \carbon\carbon::now() -> diffInDays(\carbon\carbon::parse($item -> return_date, false )))}} days</td>



                                                        @endif


                                                    @if ($item -> status == 'pending')
                                                      <td > <span class="btn btn-warning btn-sm btn-rounded btn-sm">{{ $item -> status }}</span></td>

                                                     @elseif($item -> status == 'returned')
                                                        <td > <span class="btn btn-success btn-sm btn-rounded btn-sm">{{ $item -> status }}</span></td>


                                                     @else
                                                      <td > <span class="btn btn-danger btn-sm btn-rounded btn-sm">{{ $item -> status }}</span></td>

                                                      @endif


                                                    <td>{{ \carbon\carbon::parse($item -> created_at) -> diffForHumans() }}</td>
													<td>

                                                         @if ( $item -> status != 'over dew' && ceil( \carbon\carbon::now() -> diffInDays(\carbon\carbon::parse($item -> return_date ))) <= 0 )
                                                          <a class="btn btn-danger btn-sm" href="{{ route('borrow.overdew', $item -> id) }}">Over Dew</a>


                                                          @endif

                                                        @if ( $item -> status !== 'returned')

                                                        <a class="btn btn-success btn-sm" href="{{ url('borrow-return/' . $item->id . '/' . $item->book_id) }}"> Returned</a>
                                                        @endif
                                                                                                            </td>
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
