<!DOCTYPE html>
<html>
<head>
    <title>Coupons</title>
</head>
<body>
    <h1>Coupons List</h1>
    <a href="{{ route('coupons.create.view') }}">Create New Coupon</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Type</th>
                <th>Value</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
            <tr>
                <td>{{ $coupon['id'] }}</td>
                <td>{{ $coupon['code'] }}</td>
                <td>{{ $coupon['type'] }}</td>
                <td>{{ $coupon['value'] }}</td>
                <td>{{ $coupon['is_active'] ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('coupons.show', $coupon['id']) }}">View</a>
                    <a href="{{ route('coupons.edit.view', $coupon['id']) }}">Edit</a>
                    <form action="{{ route('coupons.destroy', $coupon['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html><!DOCTYPE html>
<html>
<head>
    <title>Coupons</title>
</head>
<body>
    <h1>Coupons List</h1>
    <a href="{{ route('coupons.create.view') }}">Create New Coupon</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Type</th>
                <th>Value</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
            <tr>
                <td>{{ $coupon['id'] }}</td>
                <td>{{ $coupon['code'] }}</td>
                <td>{{ $coupon['type'] }}</td>
                <td>{{ $coupon['value'] }}</td>
                <td>{{ $coupon['is_active'] ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('coupons.show', $coupon['id']) }}">View</a>
                    <a href="{{ route('coupons.edit.view', $coupon['id']) }}">Edit</a>
                    <form action="{{ route('coupons.destroy', $coupon['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>