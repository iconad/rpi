
@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.order', $order) }}

<div id="dashboard">

    <div class="content mt-12 mb-32">
        <div class="flex justify-center">
            <div class="border border-b-0 border-gray-200 w-full text-center px-4 py-2 capitalize font-semibold text-gray-700">
                @if ($order->product)
                {{$order->product->title}}
                @else
                <span class="text-red-500">product not found</span>
                @endif
                <span class="text-gray-500">/ ORD-{{$order->id}}</span>
            </div>
        </div>
        <div class="table table-fixed w-full bg-gray-100 border border-gray-200 p-3">

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Order ID </div>
                <div> ORD-{{$order->id}}</div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Date </div>
                <div> {{date('d M, Y', strtotime($order->created_at))}} </div>
            </div>

            {{-- Print Product --}}
            @if ($order->product_type == 'paper')
            <template>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Paper </div>
                    <div> {{$order->paper}}</div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Sides </div>
                    <div> {{$order->paper_color}}</div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Size </div>
                    <div> {{$order->paper_size}}</div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Quantity </div>
                    <div> {{$order->paper_quantity}}</div>
                </div>

                <div class="flex items-center border-b border-gray-300 px-2">
                    <div class="w-64 font-semibold"> Finishings </div>
                    <ul>
                        @foreach (json_decode($order->paper_finishings) as $item)
                            <li class="font-semibold">{{$item->name}}
                                <ul class="ml-3 font-normal">
                                @foreach ($item->options as $option)
                                    <li>
                                        @if (!is_object($option))
                                            {{$option}}
                                        @else
                                            @foreach ($option as $key => $corner)
                                                <span class="uppercase">{{$key}}</span>
                                            @endforeach
                                        @endif
                                    </li>
                                @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </template>
            @endif
            {{-- Print Product End --}}


            {{-- Shirt Product --}}
            @if ($order->product_type == 'shirt')
            <template>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Shirt Sizes / Quantity </div>
                    <div>
                        @foreach (json_decode($order->shirt_sizes) as $item)
                            {!! $item->title !!} ({!! $item->quantity !!})
                        @endforeach
                    </div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Shirt Printings </div>
                    <order-selected-shirt-printings :printings="{{$order->shirt_printings}}"></order-selected-shirt-printings>
                </div>

            </template>
            @endif
            {{-- Shirt Product End --}}

            {{-- Gift Product --}}
            @if ($order->product_type == 'gift')
            <template>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Quantity </div>
                    <div> {{$order->gift_quantity}} </div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Color </div>
                    <div> {{$order->gift_color}} </div>
                </div>

            </template>
            @endif
            {{-- Gift Product End --}}

            {{-- Wallpaper Product --}}
            @if ($order->product_type == 'wallpaper')
            <template>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Width </div>
                    <div> {{$order->width}} (CM) </div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Height </div>
                    <div> {{$order->height}} (CM) </div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Installation </div>
                    <div> {{$order->installation}} </div>
                </div>

                @if ($order->installation == 'yes')
                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Installation </div>
                    <div> {{$order->installation_state}} </div>
                </div>
                @endif

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Quantity </div>
                    <div> {{$order->wallpaper_quantity}} </div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Material </div>
                    @foreach ($order->product->variants as $item)
                    <div>
                        {{$item->material->title}}
                    </div>
                    @endforeach
                </div>

            </template>
            @endif
            {{-- Wallpaper Product End --}}

            @if ($order->turnaround)
            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Turnaround  </div>
                <div> {{$order->turnaround}} business days </div>
            </div>
            @endif

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Price  </div>
                <div class="price flex-none">

                    @if ($order->price_product)
                    <div class="flex items-center space-x-2 mb-1">
                        <div class="font-medium w-24">Product</div>
                        <div>{{$order->price_product}} AED</div>
                    </div>
                    @endif

                    @if ($order->price_extra)
                    <div class="flex items-center space-x-2 mb-1">
                        <div class="font-medium w-24">Extra</div>
                        <div>{{$order->price_extra}} AED</div>
                    </div>
                    @endif

                    @if ($order->installation == 'yes')
                        <div class="flex items-center space-x-2 mb-1">
                            <div class="font-medium w-24">Installation</div>
                            <div>{{$order->installation_price}} AED</div>
                        </div>
                    @endif

                    @if ($order->price_printing)
                    <div class="flex items-center space-x-2 mb-1">
                        <div class="font-medium w-24">Printing</div>
                        <div>{{$order->price_printing}} AED</div>
                    </div>
                    @endif

                    @if ($order->price_vat)
                    <div class="flex items-center space-x-2 mb-1">
                        <div class="font-medium w-24">Vat</div>
                        <div>{{$order->price_vat}} AED</div>
                    </div>
                    @endif

                    @if ($order->price_total)
                    <div class="flex items-center space-x-2 mb-1">
                        <div class="font-medium w-24">Total</div>
                        <div>{{$order->price_total}} AED</div>
                    </div>
                    @endif

                </div>
            </div>

            @if ($order->files)
            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Files  </div>
                <div class="flex flex-col space-y-2">
                    @foreach ($order->files as $file)
                    @if ($file->cloud != null)
                            <div class="flex flex-col space-y-2">
                                <a class="block theme-link" target="_blank" href="{{$file->cloud}}">
                                    Clound Link
                                </a>
                            </div>
                    @else
                        <a class="block theme-link" download target="_blank" href="{{ URL::asset("storage/".$file->media[0]->id."/".$file->media[0]->file_name) }}">
                            {{$file->title}}
                        </a>
                    @endif
                    @endforeach
                </div>

            </div>
            @endif


            @if ($order->proof)
            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Payment </div>
                <div class="flex flex-col space-y-2">
                    @if($order->pendingproof->status === 'pending')
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-orange-100 text-orange-600">
                        {{$order->pendingproof->status}}
                    </span>
                    @elseif($order->pendingproof->status === 'declined')
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-red-100 text-red-600">
                        {{$order->pendingproof->status}}
                    </span>
                    @else
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-green-100 text-green-600">
                        {{$order->pendingproof->status}}
                    </span>
                    @endif
                </div>
            </div>
            @endif

            <div class="flex items-center justify-between p-2 pb-0">
                <div class="flex items-center">
                    <div class="w-64 font-semibold"> Status </div>
                    <div>
                        @if ($order->status === 'cart')
                        <span class="capitalize text-base leading-5 font-semibold rounded-full bg-blue-100 text-blue-600"> {{$order->status}} </span>
                        @elseif($order->status === 'pending' || $order->status === 'pending-proof')
                            <span class="capitalize text-base leading-5 font-semibold rounded-full bg-orange-100 text-orange-600"> Waiting for approval </span>
                        @elseif($order->status === 'confirmed')
                            <span class="capitalize text-base leading-5 font-semibold rounded-full bg-gray-100 text-gray-600"> {{$order->status}} </span>
                        @elseif($order->status === 'delivered')
                            <span class="capitalize text-base leading-5 font-semibold rounded-full bg-green-100 text-green-600"> {{$order->status}} </span>
                        @elseif ($order->status === 'paid-pending')
                            <span class="capitalize text-base leading-5 font-semibold rounded-full bg-green-50 text-green-400"> {{$order->status}} </span>
                        @elseif($order->status === 'on-hold')
                            <span class="capitalize text-base leading-5 font-semibold rounded-full bg-orange-100 text-orange-600"> {{$order->status}} </span>
                        @elseif($order->status === 'cancelled')
                            <span class="capitalize text-base leading-5 font-semibold rounded-full bg-red-100 text-red-600"> {{$order->status}} </span>
                        @else
                            <span class="capitalize text-base leading-5 font-semibold rounded-full bg-red-100 text-red-600"> {{$order->status}} </span>
                        @endif
                    </div>
                </div>

                <div class="hidden">
                    <form action="/profile/orders/{{$order->id}}/cancel" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        @if ($order->status == 'cancelled')
                            <input type="hidden" name="status" value="pending">
                            <button class="text-sm uppercase font-semibold tracking-wide focus:outline-none text-green-500" type="submit">Resubmit this order</button>
                        @else
                            <input type="hidden" name="status" value="cancelled">
                            <button class="text-sm uppercase font-semibold tracking-wide focus:outline-none text-red-500" type="submit">Cancel This Order</button>
                        @endif

                    </form>
                </div>
            </div>
        </div>


        @if ($order->proof)
        <div class="table table-fixed w-full bg-gray-100 border border-gray-200 p-3 mt-5">
            <div class="text-xl font-semibold mb-3">Pending Proof</div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Pending Proof ID </div>
                <div> PP-{{$order->proof->id}}</div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Order ID </div>
                <div> ORD-{{$order->proof->order->id}}</div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Due Ammount </div>
                <div class="font-semibold"> {{$order->proof->order->price_total}} AED </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Due Ammount </div>
                <div> {{date('d M, Y', strtotime($order->proof->created_at))}} </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> User </div>
                <div>
                    <a href="/manage/users/{{ $order->proof->user->id }}" class="hover:underline hover:text-red-500">{{ $order->proof->user->name }}</a>
                </div>
            </div>

            <div class="flex items-center p-2 {{$order->proof->order->status == 'confirmed' ? '' : 'pb-0' }}">
                <div class="w-64 font-semibold"> Status </div>
                <div>
                    @if($order->proof->status === 'pending')
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-orange-100 text-orange-600">
                        {{$order->proof->status}}
                    </span>
                    @elseif($order->proof->status === 'declined')
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-red-100 text-red-600">
                        {{$order->proof->status}}
                    </span>
                    @else
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-green-100 text-green-600">
                        {{$order->proof->status}}
                    </span>
                    @endif
                </div>
            </div>

        </div>
        @endif

        @if ($order->status != 'pending-proof' && $order->status != 'pending' && $order->status !== 'delivered')
        <div class="mt-5 table table-fixed w-full bg-gray-100 border border-gray-200 p-3">
            <div class="text-gray-900 font-semibold text-lg">Action </div>

            <div class="mt-3">
                <form action="/profile/orders/{{$order->id}}/update-order" method="POST">
                    @csrf
                    {{method_field('PUT')}}

                    <div>
                        <select name="status" class="capitalize px-3 py-1 rounded bg-transparent focus:outline-none active:outline-none border border-gray-300">
                            @php
                                if($order->status == 'paid-pending'){
                                    $status = ['confirmed', 'delivered', 'on-hold', 'cancelled'];
                                }elseif($order->status == 'confirmed'){
                                    $status = ['delivered', 'on-hold', 'cancelled'];
                                }elseif($order->status == 'on-hold'){
                                    $status = ['delivered', 'confirmed','cancelled'];
                                }else{
                                    $status = ['cart', 'pending', 'confirmed', 'on-hold', 'cancelled'];
                                }
                            @endphp
                            @foreach ($status as $item)
                                @if ($item == $order->status)
                                    <option class="capitalize" selected value="{{$item}}">{{$item}}</option>
                                @else
                                    <option class="capitalize" value="{{$item}}">{{$item}}</option>
                                @endif
                            @endforeach
                            @if ($order->status == 'confirmed')
                            <option class="capitalize" value="delivered">delivered</option>
                            @endif
                        </select>
                    </div>
                    <input type="hidden" value="{{$order->id}}" name="order_id">
                    <input type="hidden" value="{{$order->user_id}}" name="user_id">
                    <div class="mt-3">
                        <label for="message" class="text-gray-800 block mb-1">Message(optional)</label>
                        <textarea name="message" class="p-3 focus:outline-none active:outline-non w-full border border-gray-300 rounded" id="message" cols="30" rows="3"></textarea>
                        <span class="mt-1 leading-none text-xs text-gray-700 font-medium">Default message will be sent if you leave this empty.</span>
                    </div>

                    <div class="mt-3">
                        <button class="theme-button" type="submit">Update</button>
                    </div>


                </form>
            </div>

        </div>
        @endif




    </div>

</div>


@endsection
