<footer class="bg-stone-900 text-stone-300">
    <section class="py-16 border-b border-stone-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12">

                <div class="lg:col-span-4 flex flex-col justify-between">
                    <div>
                        <div class="mb-5">
                            <h4 class="text-white text-lg font-bold uppercase tracking-wider">About Us</h4>
                        </div>
                        <p class="text-sm text-stone-400 leading-relaxed mb-6">
                            We are passionate about delivering quality products with modern design and reliable service.
                            Our goal is to provide customers with a smooth shopping experience, affordable pricing,
                            and trusted support. From trendy collections to everyday essentials, we carefully select
                            products that match your lifestyle and needs.
                        </p>
                    </div>
                    <div>
                        <h5 class="text-white text-sm font-semibold uppercase tracking-wider mb-3">Follow Us</h5>
                        <ul class="flex items-center space-x-4">
                            <li>
                                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-stone-800 hover:bg-amber-600 hover:text-white transition duration-300">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-stone-800 hover:bg-amber-600 hover:text-white transition duration-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-stone-800 hover:bg-amber-600 hover:text-white transition duration-300">
                                    <i class="fab fa-skype"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-stone-800 hover:bg-amber-600 hover:text-white transition duration-300">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="lg:col-span-2 lg:col-start-6">
                    <div class="mb-5">
                        <h4 class="text-white text-lg font-bold uppercase tracking-wider">My Account</h4>
                    </div>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 capitalize">my account</a></li>
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 capitalize">wishlist</a></li>
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 capitalize">login</a></li>
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 capitalize">addresses</a></li>
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 uppercase">FAQ</a></li>
                    </ul>
                </div>

                <div class="lg:col-span-2">
                    <div class="mb-5">
                        <h4 class="text-white text-lg font-bold uppercase tracking-wider">Support</h4>
                    </div>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 capitalize">help</a></li>
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 capitalize">contact us</a></li>
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 capitalize">feedback</a></li>
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 capitalize">custom service</a></li>
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 capitalize">reservations</a></li>
                        <li><a href="#" class="text-stone-400 hover:text-amber-500 transition duration-200 capitalize">store locations</a></li>
                    </ul>
                </div>

                <div class="lg:col-span-3">
                    <div class="mb-5">
                        <h4 class="text-white text-lg font-bold uppercase tracking-wider">Contact Us</h4>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3.5">
                            <div class="text-amber-500 mt-1">
                                <i class="flaticon-phone text-xl"></i>
                            </div>
                            <div>
                                <h5 class="text-white text-xs font-semibold uppercase tracking-wider mb-0.5">Phone</h5>
                                <p class="text-sm text-stone-400">(+88) 01765456090</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3.5">
                            <div class="text-amber-500 mt-1">
                                <i class="flaticon-mail text-xl"></i>
                            </div>
                            <div>
                                <h5 class="text-white text-xs font-semibold uppercase tracking-wider mb-0.5">Email</h5>
                                <p class="text-sm text-stone-400">parthokar90@gmail.com</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3.5">
                            <div class="text-amber-500 mt-1">
                                <i class="flaticon-placeholder text-xl"></i>
                            </div>
                            <div>
                                <h5 class="text-white text-xs font-semibold uppercase tracking-wider mb-0.5">Address</h5>
                                <p class="text-sm text-stone-400">Kuril, Dhaka</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <section class="py-6 bg-stone-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm text-stone-500 text-center md:text-left">
                    <p>&copy; {{ date('Y') }}, All Rights Reserved.</p>
                </div>
                <div>
                    <ul class="flex flex-wrap items-center justify-center md:justify-end gap-3">
                        <li><a href="#!" class="block bg-stone-900 p-1 rounded hover:bg-stone-800 transition"><img src="{{asset('front/assets/images/home1/payment/visa.png')}}" alt="Visa" class="h-6 object-contain" /></a></li>
                        <li><a href="#!" class="block bg-stone-900 p-1 rounded hover:bg-stone-800 transition"><img src="{{asset('front/assets/images/home1/payment/master.png')}}" alt="Master" class="h-6 object-contain" /></a></li>
                        <li><a href="#!" class="block bg-stone-900 p-1 rounded hover:bg-stone-800 transition"><img src="{{asset('front/assets/images/home1/payment/paypal.png')}}" alt="Paypal" class="h-6 object-contain" /></a></li>
                        <li><a href="#!" class="block bg-stone-900 p-1 rounded hover:bg-stone-800 transition"><img src="{{asset('front/assets/images/home1/payment/skrill.png')}}" alt="Skrill" class="h-6 object-contain" /></a></li>
                        <li><a href="#!" class="block bg-stone-900 p-1 rounded hover:bg-stone-800 transition"><img src="{{asset('front/assets/images/home1/payment/maestro.png')}}" alt="Maestro" class="h-6 object-contain" /></a></li>
                        <li><a href="#!" class="block bg-stone-900 p-1 rounded hover:bg-stone-800 transition"><img src="{{asset('front/assets/images/home1/payment/electron.png')}}" alt="Electron" class="h-6 object-contain" /></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</footer>