@props([
    'data',
    'col_title2',
    'col_title3',
    'col_title4',
    'col_title5',
    'col_title6',
    'response',
    'val1',
    'val2',
    'val3',
    'val4',
    'val5',
    'folder',
    'delroute',
    'editroute',
])

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-header">
                <!-- Alert message -->
                @if ($response)
                    <div class="alert alert-success alert-dismissible fade show shadow-sm border-theme-white-2 rounded-pill"
                        role="alert">
                        <div
                            class="d-inline-flex justify-content-center align-items-center thumb-xs bg-success rounded-circle mx-auto me-1">
                            <i class="fas fa-check align-self-center mb-0 text-white "></i>
                        </div>
                        <strong>Well done!</strong> {{ $response }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive" style="max-width: 750px; margin: auto;">
                    <table class="table datatable" id="datatable_1">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 30px;">#</th>
                                @if ($col_title2)
                                    <th style="width: 150px;">{{ $col_title2 }}</th>
                                @endif
                                @if ($col_title3)
                                    <th style="width: 150px;">{{ $col_title3 }}</th>
                                @endif
                                @if ($col_title4)
                                    <th style="width: 150px;">{{ $col_title4 }}</th>
                                @endif
                                @if ($col_title5)
                                    <th style="width: 150px;">{{ $col_title5 }}</th>
                                @endif
                                @if ($col_title6)
                                    <th style="width: 150px;">{{ $col_title6 }}</th>
                                @endif

                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>

                                    @if ($col_title2)
                                        <td>{{ $item->{$val1} }}</td>
                                    @endif

                                    @if ($col_title3)
                                        <td>{{ $item->{$val2} }}</td>
                                    @endif

                                    @if ($col_title4)
                                        <td>{{ $item->{$val3} }}</td>
                                    @endif

                                    @if ($col_title5)
                                        <td><img src="{{ asset("storage/uploads/$folder/" . ($item->{$val4} ?? '')) }}"
                                                alt="{{ $item->{$val4} ?? 'image' }}" style="width:150px; height:auto;"
                                                loading="lazy" decoding="async"></td>
                                    @endif
                                    @if ($col_title6)
                                        <td><img src="{{ asset("storage/uploads/$folder/" . ($item->{$val5} ?? '')) }}"
                                                alt="{{ $item->{$val5} ?? 'image' }}" style="width:150px; height:auto;"
                                                loading="lazy" decoding="async"></td>
                                    @endif
                                    <td class="d-flex">
                                        <a href="{{ route($editroute, $item->id) }}">
                                            <button type="button" class="btn rounded-pill btn-success">Edit</button>
                                        </a>&nbsp;&nbsp;
                                        <form action="{{ route($delroute, $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure want to delete?')"
                                                type="submit" class="btn rounded-pill btn-danger">Delete</button>
                                        </form>
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
