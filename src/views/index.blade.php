<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-4 text-center">Coupons List</h1>
            
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('coupons.create.view') }}" class="btn btn-success">
                    Create New Coupon
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    @if(isset($coupons) && is_array($coupons) && count($coupons) > 0)
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Active</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $coupon)
                                <tr>
                                    <td class="align-middle">{{ $coupon['code'] ?? '' }}</td>
                                    <td class="align-middle"><span class="badge bg-info text-dark">{{ ucfirst($coupon['type'] ?? '') }}</span></td>
                                    <td class="align-middle">
                                        @if(($coupon['type'] ?? '') == 'percentage')
                                            {{ $coupon['value'] ?? 0 }}%
                                        @else
                                            ${{ number_format($coupon['value'] ?? 0, 2) }}
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if(!empty($coupon['is_active']))
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('coupons.show', $coupon['id']) }}" class="btn btn-sm btn-outline-primary">View</a>
                                        <a href="{{ route('coupons.edit.view', $coupon['id']) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="{{ route('coupons.destroy', $coupon['id']) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning text-center mb-0">
                            No coupons found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>