<!DOCTYPE html>
<html>
<head>
    <title>Create Coupon</title>
</head>
<body>
    <h1>Create Coupon</h1>
    


    <form action="{{ route('coupons.store') }}" method="POST">
        @csrf
        
        <label>Code:</label><br>
        <input type="text" name="code" value="{{ old('code') }}" required><br><br>

        <label>Type:</label><br>
        <select name="type">
            <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed</option>
            <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
        </select><br><br>

        <label>Value:</label><br>
        <input type="number" step="0.01" name="value" value="{{ old('value') }}" required><br><br>

        <label>Expires At:</label><br>
        <input type="datetime-local" name="expires_at" value="{{ old('expires_at') }}"><br><br>

        <label>Max Uses:</label><br>
        <input type="number" name="max_uses" value="{{ old('max_uses') }}"><br><br>

        <label>Is Active:</label>
        <input type="checkbox" name="is_active" value="1" checked><br><br>

        <button type="submit">Create</button>
    </form>
</body>
</html>