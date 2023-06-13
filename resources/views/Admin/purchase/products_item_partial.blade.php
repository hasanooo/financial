<tr data-product-id="{{$p->id}}">
    <td>
        <input type="hidden" name="product_id[]" value="{{$p->id}}">
        <img style="width:50px;" src="/Product/Image/{{$p->image}}" alt="none">
    </td>
    <td>
        <input type="text" disabled class="form-control" value="{{$p->name}}" placeholder="0" style="width: 200px;">
    </td>
    <td>
        <input type="text" disabled class="form-control" value="{{$p->category->name}}" placeholder="" style="width: 200px;">
    </td> 
    <td>
        <input type="number" class="form-control p_qty" name="p_qty[]" value="" placeholder="0" style="width: 80px;">
    </td>
    <td>
        <input type="number" class="form-control price" value="{{$p->purchase_price}}" placeholder="0" style="width: 200px;">
    </td>
    <td>
        <input type="number" disabled class="form-control total_amount" value="" placeholder="0">
    </td>
    <td>
        <button class="btn btn-sm delete-item">
            <i class="fa-solid fa-trash text-danger"></i>
        </button>
    </td>
</tr>
