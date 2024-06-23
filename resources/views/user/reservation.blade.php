@extends('layouts.userLayout')

@section('title')
  <title>User - Reservations</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Reservations</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('user_reservations')}}">Reservations</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class='card-body'>
        <button type="submit" class="btn btn-success"><a href="{{route('user_make_reservations')}}"><i class="bi bi-file-earmark-plus"> </i>Make Reservation</a></button>
        <button type="reset" class="btn btn-danger"><a href="">Print Preview</a></button>
        <button type="reset" class="btn btn-danger"><a href="">Save CSV</a></button>
    </div>
</section>

<section class="section">
    <div class="row">
        <!-- Reservations -->
        <div class="col-12">
            <div class="card add-book overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">All Revervations <span></span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Shelf Location</th>
                                <th scope="col">Reserved date</th>
                                <th scope="col">Status</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <th scope="row">{{ $reservation -> id}}</th>
                                    <td>{{ $reservation -> title}}</td>
                                    <td>{{ $reservation -> shelfLocation}}</td>
                                    <td>{{ $reservation -> reserved_date}}</td>
                                    <td>
                                        @if (($reservation -> status) == 'Available')
                                            <span class="badge rounded-pill bg-success">Available</span>
                                        @elseif (($reservation -> status) == 'Borrowed')
                                            <span class="badge rounded-pill bg-secondary">Borrowed</span>
                                        @elseif (($reservation -> status) == 'Reserved')
                                            <span class="badge rounded-pill bg-warning text-dark">Reserved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class='text-center'>
                                            <div class="btn-group" role="group">
                                                <form method="POST" action="#">
                                                    @csrf
                                                    @method('GET')
                                                    <button type="submit" class="btn btn-info">View</button>
                                                </form>
                                                <form method="POST" action="#">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRevervationsModel">Delete</button>
                                                    <!-- Delete Revervations Modal -->
                                                    <div class="modal fade" id="deleteRevervationsModel" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete Revervation</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Once deleted, all of its resources and data will be permanently deleted. Before deleting, please download any data or information that you wish to retain.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">Delete Revervation</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Delete Revervations Modal-->
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Reservations  -->
    </div>
</section>

@endsection
