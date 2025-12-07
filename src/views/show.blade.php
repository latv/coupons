<!DOCTYPE html>
<html>
<head>
    <title>Show Coupon</title>
</head>
<body>
    <h1>Coupon Details</h1>
    <p><strong>ID:</strong> {{ $coupon['id'] }}</p>
    <p><strong>Code:</strong> {{ $coupon['code'] }}</p>
    <p><strong>Type:</strong> {{ $coupon['type'] }}</p>
    <p><strong>Value:</strong> {{ $coupon['value'] }}</p>
    <p><strong>Expires At:</strong> {{ $coupon['expires_at'] ?? 'Never' }}</p>
    <p><strong>Max Uses:</strong> {{ $coupon['max_uses'] ?? 'Unlimited' }}</p>
    <p><strong>Active:</strong> {{ $coupon['is_active'] ? 'Yes' : 'No' }}</p>

    <a href="{{ route('coupons.index') }}">Back to List</a> | 
    <a href="{{ route('coupons.edit.view', $coupon['id']) }}">Edit</a>
</body>
</html>