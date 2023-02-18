@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<div class="form-group m-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name', $product->name)}}" placeholder="Enter name">
            </div>
            <div class="form-group m-2">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" id="price" value="{{old('price', $product->price)}}" placeholder="Enter price">
            </div>
            <div class="form-group m-2">
                <label for="item_number">Item Number</label>
                <input type="text" class="form-control" name="item_number" id="item_number" value="{{old('item_number', $product->item_number)}}" placeholder="Enter item number">
            </div>
            <div class="form-group m-2">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" value="{{old('description', $product->description)}}"></input>
            </div>
