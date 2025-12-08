<!DOCTYPE html>
<html>
<head>
    <title>Show Coupon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Coupon Details</h4>
                        <span class="badge bg-secondary">ID: {{ $coupon['id'] }}</span>
                    </div>

                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted">Code:</div>
                            <div class="col-sm-8 fw-bold">{{ $coupon['code'] }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted">Type:</div>
                            <div class="col-sm-8">{{ ucfirst($coupon['type']) }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted">Value:</div>
                            <div class="col-sm-8">
                                {{ $coupon['value'] }} 
                                {{ $coupon['type'] === 'percentage' ? '%' : 'EUR' }}
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted">Expires At:</div>
                            <div class="col-sm-8">{{ $coupon['expires_at'] ?? 'Never' }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted">Max Uses:</div>
                            <div class="col-sm-8">{{ $coupon['max_uses'] ?? 'Unlimited' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Status:</div>
                            <div class="col-sm-8">
                                @if($coupon['is_active'])
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex justify-content-between border-top pt-3">
                            <a href="{{ route('coupons.index') }}" class="btn btn-outline-secondary">
                                &larr; Back to List
                            </a>
                            <a href="{{ route('coupons.edit.view', $coupon['id']) }}" class="btn btn-primary">
                                Edit Coupon
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>