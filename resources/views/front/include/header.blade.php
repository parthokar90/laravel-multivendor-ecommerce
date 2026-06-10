<header class="w-full">

    <section class="bg-gray-950 text-white text-sm py-2 px-4 border-b border-gray-800">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <div>
                <p class="text-center md:text-left tracking-wide">New Offers This Weekend only to Get 50% Flate</p>
            </div>
            <div class="flex justify-center md:justify-end items-center">
                <ul class="flex items-center space-x-4">
                    <li><a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-google-plus-g"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="bg-white py-4 px-4 border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-12 gap-4 items-center">

            <div class="col-span-1 md:col-span-3 order-1">
                <a href="{{route('home.page')}}" class="no-underline inline-block">
                    <h3 class="text-2xl font-extrabold text-gray-900 m-0 tracking-tight">
                        Multivendor
                    </h3>
                </a>
            </div>

            <div class="col-span-2 md:col-span-7 order-3 md:order-2 mt-2 md:mt-0">
                <form action="{{route('item.search')}}" method="get" class="flex items-center w-full max-w-2xl border border-gray-300 rounded-lg overflow-hidden focus-within:border-black transition">
                    <div class="bg-gray-50 border-r border-gray-200 px-2">
                        <select class="bg-transparent text-sm text-gray-700 py-2.5 px-2 focus:outline-none cursor-pointer capitalize" name="cat_id">
                            <option value="">all categories</option>
                            @foreach($allCategory as $categorys)
                            <option value="{{$categorys->id}}">{{$categorys->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="search" name="search" placeholder="search for products..." class="w-full text-sm py-2.5 px-4 focus:outline-none text-gray-800">
                    <button type="submit" class="bg-black hover:bg-gray-800 text-white text-sm font-semibold uppercase px-6 py-2.5 transition shrink-0">
                        search
                    </button>
                </form>
            </div>

            <div class="col-span-1 md:col-span-2 order-2 md:order-3">
                <ul class="flex justify-end items-center space-x-5 text-gray-700">
                    @if(Auth::guard('vendor')->check())
                    @php $url=route('vendor.dashboard'); @endphp
                    @elseif(Auth::guard('web')->check())
                    @php $url=route('customer.dashboard'); @endphp
                    @else
                    @php $url=route('customer.login'); @endphp
                    @endif

                    <li class="relative group">
                        <a href="{{$url}}" class="hover:text-black transition text-xl">
                            <i class="far fa-user"></i>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('wishlist.index')}}" class="hover:text-black transition text-xl relative inline-block">
                            <i class="far fa-heart"></i>
                            <span class="absolute -top-2 -right-2.5 bg-red-500 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">
                                {{$wishlistCount}}
                            </span>
                        </a>
                    </li>

                    <li class="relative inline-block text-left" x-data="{ open: false }">
                        <button onclick="toggleCartDropdown()" class="hover:text-black transition text-xl relative inline-block focus:outline-none">
                            <i class="fas fa-shopping-basket"></i>
                            <span class="absolute -top-2 -right-2.5 bg-black text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">
                                {{$cartCount}}
                            </span>
                        </button>

                        <div id="cartDropdown" class="hidden absolute right-0 mt-3 w-80 bg-white border border-gray-200 rounded-lg shadow-xl z-50 p-4">
                            <div class="flex justify-between items-center border-b border-gray-100 pb-3 mb-3">
                                <h5 class="font-bold text-gray-900 text-sm uppercase">{{$cartCount}} items</h5>
                                <a href="{{route('cart.index')}}" class="text-xs font-semibold text-gray-500 hover:text-black underline uppercase">view cart</a>
                            </div>

                            <ul class="max-h-60 overflow-y-auto space-y-3 divide-y divide-gray-50">
                                @foreach($cartItem as $key => $item)
                                <li class="pt-3 first:pt-0">
                                    <div class="flex items-start space-x-3 relative">
                                        <img class="w-16 h-16 object-cover rounded border border-gray-100" src="{{ asset($item['image']) }}" alt="Product Image" />
                                        <div class="flex-1 min-w-0 pr-6">
                                            <h5 class="text-xs font-bold text-gray-900 truncate mb-1">{{ $item['product_name'] }}</h5>
                                            @if($item['attribute'])
                                            <p class="text-[11px] text-gray-500">Attr: {{ $item['attribute'] }}</p>
                                            @endif
                                            <p class="text-xs text-gray-600 mt-0.5">
                                                {{ $item['quantity'] }} x <span class="font-semibold text-gray-900">{{ number_format($item['price']) }}</span>
                                            </p>
                                        </div>
                                        <a href="{{ route('cart.destroy', $key) }}" class="absolute right-0 top-0 text-gray-400 hover:text-red-500 transition">
                                            <i class="far fa-times-circle text-sm"></i>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                            <div class="flex justify-between items-center border-t border-gray-100 pt-3 mt-3 font-bold text-sm text-gray-900 uppercase">
                                <p>total</p>
                                <p>{{number_format($subTotal)}}</p>
                            </div>
                            <div class="mt-4">
                                <a href="{{route('checkout.page')}}" class="block w-full bg-black hover:bg-gray-800 text-white text-center text-xs font-bold tracking-wider uppercase py-3 rounded transition">
                                    checkout
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="bg-white border-b border-gray-200 relative hidden md:block">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between">

            <div class="relative group py-3">
                <button class="bg-black text-white text-xs font-bold uppercase tracking-wider px-5 py-3 rounded flex items-center space-x-3 focus:outline-none">
                    <i class="fas fa-bars text-sm"></i>
                    <span>browse categories</span>
                    <i class="fas fa-caret-down"></i>
                </button>

                <div class="absolute left-0 top-full w-64 bg-white border border-gray-200 rounded-b-lg shadow-xl hidden group-hover:block z-40 transition duration-300">
                    <ul class="divide-y divide-gray-50 py-1">
                        @foreach($latestCategory as $categorys)
                        <li class="relative group/sub">
                            <a href="{{route('category.product',array('id'=>$categorys->id,'slug'=>$categorys->slug))}}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-black transition">
                                <span class="flex items-center gap-2"><i class="far fa-check-circle text-xs text-gray-400"></i>{{$categorys->category_name}}</span>
                                @if(count($categorys->subCategory) > 0)
                                <i class="fas fa-chevron-right text-[10px] text-gray-400"></i>
                                @endif
                            </a>
                            @if(count($categorys->subCategory) > 0)
                            <ul class="absolute left-full top-0 w-60 bg-white border border-gray-200 shadow-xl rounded-r-lg hidden group-hover/sub:block z-50 py-1">
                                @foreach($categorys->subCategory as $child)
                                <li>
                                    <a href="{{route('category.product',array('id'=>$child->id,'slug'=>$child->slug))}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-black">
                                        {{$child->category_name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                        <li>
                            <a href="{{route('all.category')}}" class="block px-4 py-3 text-sm font-semibold text-center text-black bg-gray-50 hover:bg-gray-100 transition">
                                View All Category
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex-1 px-8">
                <ul class="flex items-center space-x-8 text-sm font-semibold uppercase tracking-wider text-gray-700">
                    <li class="border-b-2 border-black py-4"><a href="{{route('home.page')}}" class="text-black">home</a></li>

                    <li class="relative group py-4">
                        <a href="#!" class="hover:text-black flex items-center gap-1">Account <i class="fas fa-chevron-down text-[10px]"></i></a>
                        <ul class="absolute top-full left-0 w-48 bg-white border border-gray-200 rounded-b shadow-lg hidden group-hover:block z-50 py-1 normal-case font-medium text-gray-600">
                            <li><a href="{{route('admin.login')}}" class="block px-4 py-2 hover:bg-gray-50 hover:text-black">Admin Login</a></li>
                            <li><a href="{{route('customer.login')}}" class="block px-4 py-2 hover:bg-gray-50 hover:text-black">Customer Login</a></li>
                            <li><a href="{{route('vendor.login')}}" class="block px-4 py-2 hover:bg-gray-50 hover:text-black">Vendor Login</a></li>
                        </ul>
                    </li>


                    <li class="static group/mega py-4">
                        <a href="#!" class="text-gray-700 hover:text-amber-600 font-semibold text-sm transition flex items-center gap-1.5 uppercase tracking-wider">
                            Categories
                            <i class="fas fa-chevron-down text-[10px] group-hover/mega:rotate-180 transition-transform duration-300"></i>
                        </a>

                        <div class="absolute left-0 right-0 top-full w-full bg-white border-t border-b border-stone-200 shadow-xl hidden group-hover/mega:block z-50 p-8 transition duration-300 animate-fadeIn">
                            <div class="max-w-7xl mx-auto grid grid-cols-12 gap-8">

                                <div class="col-span-12 md:col-span-9 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                                    @foreach($parentCategory as $parent)
                                    <div class="space-y-3">
                                        <h4 class="font-bold text-stone-900 border-b border-stone-100 pb-2 text-xs uppercase tracking-widest text-left">

                                            <a href="{{ route('category.product', ['id' => $parent->id, 'slug' => $parent->slug]) }}"
                                                class="hover:text-amber-600 hover:pl-1 transition-all duration-200 block text-stone-600">
                                                {{ $parent->category_name }}
                                            </a>
                                        </h4>

                                        <ul class="space-y-2 normal-case font-medium text-stone-600 text-sm text-left">
                                            @foreach($parent->subCategory as $child)
                                            <li>
                                                <a href="{{ route('category.product', ['id' => $child->id, 'slug' => $child->slug]) }}"
                                                    class="hover:text-amber-600 hover:pl-1 transition-all duration-200 block text-stone-600">
                                                    {{ $child->category_name }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="hidden md:col-span-3 border-l border-stone-100 pl-8 md:flex items-center justify-center">
                                    <div class="w-full h-full min-h-[180px] bg-stone-50 rounded-xl overflow-hidden relative group/banner border border-stone-200">
                                        <a href="#" class="block w-full h-full">
                                            <img src="{{ asset('front/assets/images/home1/advertise.png') }}"
                                                alt="Advertise"
                                                class="w-full h-full object-cover group-hover/banner:scale-105 transition duration-500"
                                                onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center p-4 text-center text-xs font-bold uppercase tracking-wider text-stone-400\'>Premium Quality<br>Collection 2026</div>';" />
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>


                    <li class="py-4"><a href="#" class="hover:text-black">blog</a></li>
                    <li class="py-4"><a href="{{route('contact.page')}}" class="hover:text-black">contact</a></li>
                </ul>
            </div>

            <div class="flex items-center space-x-3 text-gray-700 py-4 shrink-0">
                <i class="fas fa-headset text-2xl text-gray-400"></i>
                <div class="leading-none">
                    <p class="text-[10px] uppercase text-gray-400 font-bold tracking-wider mb-0.5">call now</p>
                    <p class="text-sm font-bold text-black">+8801765456090</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white border-b border-gray-200 py-3 px-4 md:hidden flex justify-between items-center">
        <button onclick="toggleMobileCanvas()" class="text-gray-800 text-xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
        <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Menu</span>
    </section>

    <div id="mobileCanvas" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden transition-opacity duration-300">
        <div class="fixed top-0 left-0 bottom-0 w-4/5 max-w-xs bg-white h-full shadow-2xl p-6 overflow-y-auto flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                    <h4 class="font-extrabold text-lg text-gray-900">Navigation</h4>
                    <button onclick="toggleMobileCanvas()" class="text-gray-400 hover:text-black text-xl focus:outline-none">
                        <i class="far fa-times-circle"></i>
                    </button>
                </div>

                <ul class="space-y-4 text-sm font-bold uppercase tracking-wide text-gray-700">
                    <li class="border-b border-gray-50 pb-2"><a href="{{route('home.page')}}" class="text-black">home</a></li>
                    <li class="border-b border-gray-50 pb-2"><a href="#" class="hover:text-black">about</a></li>

                    <li class="border-b border-gray-50 pb-2">
                        <p class="mb-2 text-gray-400 text-xs">Account</p>
                        <ul class="pl-4 space-y-2 normal-case font-medium text-gray-600">
                            <li><a href="{{route('customer.login')}}" class="hover:text-black">Customer Login</a></li>
                            <li><a href="{{route('vendor.login')}}" class="hover:text-black">Vendor Login</a></li>
                        </ul>
                    </li>
                    <li class="border-b border-gray-50 pb-2"><a href="!#" class="hover:text-black">blog</a></li>
                    <li><a href="{{route('contact.page')}}" class="hover:text-black">contact</a></li>
                </ul>
            </div>

            <div class="border-t border-gray-100 pt-4 mt-6">
                <p class="text-xs text-gray-400 font-bold uppercase">Support Line</p>
                <p class="text-base font-bold text-black mt-1">+8801765456090</p>
            </div>
        </div>
    </div>
</header>

<script>
    function toggleCartDropdown() {
        const cart = document.getElementById('cartDropdown');
        cart.classList.toggle('hidden');
    }

    function toggleMobileCanvas() {
        const canvas = document.getElementById('mobileCanvas');
        if (canvas.classList.contains('hidden')) {
            canvas.classList.remove('hidden');
            setTimeout(() => canvas.classList.add('bg-opacity-50'), 10);
        } else {
            canvas.classList.add('hidden');
        }
    }

    // Close elements when clicking outside
    window.addEventListener('click', function(e) {
        const cartDropdown = document.getElementById('cartDropdown');
        if (!e.target.closest('#cartDropdown') && !e.target.closest('button[onclick="toggleCartDropdown()"]')) {
            if (cartDropdown) cartDropdown.classList.add('hidden');
        }
    });
</script>