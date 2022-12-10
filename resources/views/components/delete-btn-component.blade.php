
{{-- <form action="{{ route('category.destroy', ['category' => 8]) }}" method="post"> --}}
<form action="{{ route($route, [$routeName => $routeKey]) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>