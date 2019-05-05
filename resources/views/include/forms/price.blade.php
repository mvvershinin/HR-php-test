<form class="form-inline js-price-update" action="{{ route('ajax.products.update.price') }}" method="post">
    @csrf
    @method('POST')
    <input hidden value="{{ $product->id }}" name='id'>
    <input class="form-control" type="number" value="{{ $product->price }}" name='price'>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
