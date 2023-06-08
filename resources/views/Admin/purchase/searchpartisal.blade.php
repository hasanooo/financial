<thead>
    <tr>

        <th>Invoice</th>
        <th>Reference</th>
        <th>Supplier</th>
        <th>Purchase Amount</th>
        <th>Purchase Paid</th>
        <th>Return Amount</th>
        <th>Due Payment</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>


    
    <tr class="text-center">
        <td>
            <input type="hidden" id="uid" value="{{$p->id}}">
            <button id="modal_view" class="btn btn-sm">{{$p->invoice}}</button>
        </td>
        <td>{{ $p->ref }}</td>
        <td>{{ $p->purchase_invoice_supplier->name}}</td>
        <td>{{$p->payable_amount}} </td>
        <td>{{ $p->purchase_invoice_purchase_payment->pluck('amount_paid')->sum() }}</td>
        @php
        $return = 0;
        
        $purchase = $p->payable_amount;
        $paid = $p->purchase_invoice_purchase_payment->pluck('amount_paid')->sum();

        @endphp
        @if ($p->purchase_invoice_purchase_return!=null)
        @php
        $return = $p->purchase_invoice_purchase_return->pluck('return_price')->sum();

        @endphp
        @endif
        <td>

            {{$return}}

        </td>
       
        @php
        $due = ($purchase-$paid)-($return);
        @endphp
        <td><span id="d_amount" class="{{$due<0?'text-danger':'text-primary'}}">{{$due}}</span></td>
        
        <td>
            @if ($p->payable_amount == $due)
            <span class="badge badge-danger"> Unpaid</span>
            @elseif($due <=0) <span class="badge badge-success"> Paid</span>
                @else
                <span class="badge badge-primary"> Partial</span>
                @endif
        </td>
        <td>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="menu1"
                    data-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                    </svg></button>
                <ul class="dropdown-menu text-left px-3 " role="menu" aria-labelledby="menu1">

                    <li role="presentation"> <a data-bs-toggle="modal" class="btn btn-sm"
                            id="purchase_delete">
                            <i class="fa-solid fa-trash"></i>Delete </a></li>

                    <li>
                        <a class="btn btn-sm" href="{{route('purchase.edit',$p->id)}}"> <i
                                class="fa-solid fa-pen-to-square"></i> Edit</a>
                    </li>
                    <li>
                        @if ($due>0.00)
                        <a href="javascript:void(0)" class="btn btn-sm"
                            data-url="{{route('purchasedue.edit',$p->id)}}" id="make_payment"><i
                                class="fa-solid fa-pen-to-square"></i>Make
                            Payment</a>

                        @endif
                        <a href="{{route('purchase.return',$p->id)}}" class="btn btn-sm"><i
                                class="fa-solid fa-pen-to-square"></i>Return</a>
                    </li>
                    @if ($p->purchase_invoice_purchase_return->count()>1)

                    <li>
                        <a class="btn btn-sm" href="{{route('return.product',$p->id)}}"> <i
                                class="fa-solid fa-pen-to-square"></i> Return product</a>
                    </li>
                    @endif


                </ul>
            </div>
        </td>

    </tr>
   

</tbody>