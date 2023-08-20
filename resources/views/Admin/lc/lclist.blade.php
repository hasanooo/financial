@extends('Admin.layouts.dashboard')
@section('titel')
    lcform
@endsection
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <body>
        <div class="container mt-5">
            <h1>LC List</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"> Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Issue Date</th>
                        <th scope="col">Payment Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach ($lc as $i => $item)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->bank_name }}</td>
                            <td>{{ $item->total_amount }}</td>
                            <td>{{ $item->issue_date }}</td>
                            <td>{{ $item->payment_date }}</td>
                            <td>
                                @if (Str::endsWith($item->file, ['.pdf', '.doc', '.docx', '.jpg', '.jpeg', '.png', '.gif']))
                                    <a href="#" class="view-file" data-toggle="modal" data-target="#fileModal"
                                        data-file="{{ asset('FileManeger/File/' . $item->file) }}">
                                        <i class="fas fa-file"></i>
                                    </a>
                                @else
                                    <p>no file</p>
                                @endif
                            </td>


                            <td>
                                <button class="btn btn-danger">
                                    <a href="{{route('lc.delete',$item->id)}}" class="text-white text-decoration-none">Delete</a>
                                </button>
                                <button class="btn btn-primary">
                                    <a href="{{route('lc.edit',$item->id)}}" class="text-white text-decoration-none">Edit</a>
                                </button>

                            </td>

                        </tr>

                    </tbody>
                @endforeach

            </table>

            <!-- Modal -->
            <div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 60%; max-height: 80%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fileModalLabel">File Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="fileDetails"></div>
                        </div>
                        <div class="modal-footer">
                            <a id="downloadLink" class="btn btn-primary" href="#" download>Download</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Include Bootstrap JS (popper.js and bootstrap.min.js are recommended) -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.view-file').on('click', function() {
                        var fileUrl = $(this).data('file');
                        var fileType = $(this).find('i').hasClass('fa-file') ? 'pdf' : 'image';

                        $('#fileDetails').html('');

                        if (fileType === 'pdf') {
                            $('#fileDetails').append('<embed src="' + fileUrl +
                                '" type="application/pdf" width="100%" height="400">');
                        } else if (fileType === 'image') {
                            $('#fileDetails').append('<img src="' + fileUrl + '" alt="Image" width="100%">');
                        } else if (fileType === 'doc' || fileType === 'docx') {
                            $('#fileDetails').append(
                                '<iframe src="https://view.officeapps.live.com/op/view.aspx?src=' +
                                encodeURIComponent(fileUrl) + '" width="100%" height="600"></iframe>');
                        }

                        // Update download link
                        $('#downloadLink').attr('href', fileUrl);
                    });
                });
            </script>
    </body>
@endsection
