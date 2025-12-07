<!DOCTYPE html>
<html>
<head>
    <title>Edit Coupon</title>
</head>
<body>
    <h1>Edit Coupon: {{ $coupon['code'] }}</h1>
    


    <form action="{{ route('coupons.update', $coupon['id']) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Code:</label><br>
        <input type="text" name="code" value="{{ old('code', $coupon['code']) }}" required><br><br>

        <label>Type:</label><br>
        <select name="type">
            <option value="fixed" {{ old('type', $coupon['type']) == 'fixed' ? 'selected' : '' }}>Fixed</option>
            <option value="percentage" {{ old('type', $coupon['type']) == 'percentage' ? 'selected' : '' }}>Percentage</option>
        </select><br><br>

        <label>Value:</label><br>
        <input type="number" step="0.01" name="value" value="{{ old('value', $coupon['value']) }}" required><br><br>

        <label>Expires At:</label><br>
        <input type="datetime-local" name="expires_at" value="{{ old('expires_at', isset($coupon['expires_at']) ? date('Y-m-d\TH:i', strtotime($coupon['expires_at'])) : '') }}"><br><br>

        <label>Max Uses:</label><br>
        <input type="number" name="max_uses" value="{{ old('max_uses', $coupon['max_uses']) }}"><br><br>

        <label>Is Active:</label>
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $coupon['is_active']) ? 'checked' : '' }}><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>