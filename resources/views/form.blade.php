<div class="container pt-5">
    <form method="POST" action="{{route('form.store')}}">
        @csrf
        <div class="mb-3">
          <label for="item_name" class="form-label">item name</label>
          <input type="text" class="form-control" name="item_name" id="item_name" aria-describedby="text">
          <div id="text" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="item_quantity" class="form-label">quantity</label>
          <input type="number" class="form-control" name="item_quantity" id="item_quantity">
        </div>
        <div class="mb-3">
          <label for="price_per_item" class="form-label">price</label>
          <input type="number" class="form-control" name="price_per_item" id="price_per_item">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
