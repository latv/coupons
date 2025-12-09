<!DOCTYPE html>
<html>
<head>
    <title>Edit Coupon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-label {
            padding-top: 0.5rem;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="col-md-8 mx-auto">
            <h1 class="mb-4">Edit Coupon: {{ $coupon['code'] }}</h1>
        
            <div class="card p-4 shadow-sm">
                <form action="{{ route('coupons.update', $coupon['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="code" class="form-label">Code:</label>
                        <input type="text" id="code" name="code" class="form-control" 
                               value="{{ old('code', $coupon['code']) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type:</label>
                        <select id="type" name="type" class="form-select">
                            <option value="fixed" {{ old('type', $coupon['type']) == 'fixed' ? 'selected' : '' }}>Fixed</option>
                            <option value="percentage" {{ old('type', $coupon['type']) == 'percentage' ? 'selected' : '' }}>Percentage</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="value" class="form-label">Value:</label>
                        <input type="number" id="value" step="0.01" name="value" class="form-control" 
                               value="{{ old('value', $coupon['value']) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="expires_at" class="form-label">Expires At:</label>
                        <input type="datetime-local" id="expires_at" name="expires_at" class="form-control" 
                               value="{{ old('expires_at', isset($coupon['expires_at']) ? date('Y-m-d\TH:i', strtotime($coupon['expires_at'])) : '') }}">
                        <div class="form-text">Leave blank if the coupon never expires.</div>
                    </div>

                    <div class="mb-3">
                        <label for="max_uses" class="form-label">Max Uses:</label>
                        <input type="number" id="max_uses" name="max_uses" class="form-control" 
                               value="{{ old('max_uses', $coupon['max_uses']) }}">
                        <div class="form-text">Leave blank for unlimited uses.</div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $coupon['is_active']) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Is Active</label>
                    </div>

                    <div class="d-flex justify-content-between pt-3">
                        <a href="{{ route('coupons.show', $coupon['id']) }}" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Update Coupon
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>