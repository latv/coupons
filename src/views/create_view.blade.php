<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Create Coupon</h1>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('coupons.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" class="form-control " id="code" name="code" value="{{ old('code') }}" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="type" class="form-label">Type</label>
                                <select class="form-select" id="type" name="type">
                                    <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                    <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="value" class="form-label">Value</label>
                                <input type="number" step="0.01" class="form-control" id="value" name="value" value="{{ old('value') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="expires_at" class="form-label">Expires At</label>
                                <input type="datetime-local" class="form-control" id="expires_at" name="expires_at" value="{{ old('expires_at') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="max_uses" class="form-label">Max Uses</label>
                                <input type="number" class="form-control" id="max_uses" name="max_uses" value="{{ old('max_uses') }}">
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                            <label class="form-check-label" for="is_active">Is Active</label>
                        </div>

                        <div class="d-flex justify-content-between pt-3">
                            <a href="{{ route('coupons.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Coupon</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>