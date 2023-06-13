
<tr class="text-center" data-single-id="{{$product->id}}">
    <td colspan="2">
        <input class="form-control" type="text" id="productname" name="pname[]"
            value="{{ $product->name }}" readonly>
            
            <input type="text" hidden name="p_id[]" id="v_id" hidden value="{{$product->id}}">
           
           

    </td>

   
    <td class="col-md-1">
        <input class="form-control kkpp" type="number" id="price_qty" name="quantity[]" value="1">
      
    </td>
   


     <td>
       
            <input disabled type="text"value="  {{ $product->selling_price }}"
                class="form-control price">
        


    </td>

    <td> 
        @if ($product->product_tax==null)
        <input disabled type="text"value="0" class="form-control">
        @else
        <input disabled type="text"value="{{ $product->product_price_tax->percentage }}" class="form-control">
        @endif
        

    </td>
   
    @php
        if($product->product_price_tax==null)
      {
         $tax=0;
      }
      else
      {
         $tax=($product->selling_price*$product->product_tax->percentage)/100;
      }
     
     
         
      $total=0;
         $totalprice=$product->selling_price+$tax;
         $total=$total+$totalprice;
      
      
    @endphp
   
    <td> 
        <input type="hidden" id="current_price" value="{{ $total }}">
        <input type="number" class="ppone form-control" id="ooo" name="" value="{{ $total }}"
            readonly>

    </td>
    <td><button class="btn btn-sm delete-double"><i class="fa-solid fa-trash text-danger"></i></button></td>

</tr> 
