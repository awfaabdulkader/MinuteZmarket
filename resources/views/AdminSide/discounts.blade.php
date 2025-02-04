
@extends('components.layout')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Discounts</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h4 class="card-title">Table des Discounts</h4>
                </div>
                <!--end col-->
                <div class="col-auto ms-auto">
                    <div class="bg-primary-subtle p-2 border-dashed border-primary rounded">
                        <span class="text-primary fw-semibold">Note :</span>
                        <span class="text-primary fw-normal">
                            Si vous souhaitez modifier des données, double-cliquez sur une ligne du tableau.
                        </span>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end card-header-->
        <div class="card-body pt-0">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Applies To</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($discounts as $discount)
                        <tr>
                            <td>{{ $discount->name }}</td>
                            <td>{{ ucfirst($discount->type) }}</td>
                            <td>
                                @if($discount->type === 'percentage')
                                    {{ $discount->percentage }}%
                                @else
                                    €{{ number_format($discount->percentage, 2) }}
                                @endif
                            </td>
                            <td>{{ ucfirst($discount->applies_to) }}</td>
                            <td>{{ $discount->start_date ? $discount->start_date->format('Y-m-d') : 'N/A' }}</td>
                            <td>{{ $discount->end_date ? $discount->end_date->format('Y-m-d') : 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ $discount->is_active ? 'success' : 'danger' }}">
                                    {{ $discount->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('discounts.edit', $discount) }}" 
                                       class="btn btn-sm btn-soft-primary">
                                        <i class="las la-pen text-secondary font-16"></i>
                                    </a>
                                    <form action="{{ route('discounts.destroy', $discount) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this discount?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-soft-danger">
                                            <i class="las la-trash text-secondary font-16"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>

<footer class="footer text-center text-sm-start d-print-none">
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card mb-0 rounded-bottom-0">
                    <div class="card-body">
                        <p class="text-muted mb-0">
                            <span class="text-muted d-none d-sm-inline-block float-end">©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                MinutZMarket
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


@endsection