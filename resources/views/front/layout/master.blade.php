<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{asset('front/assets/images/favicon.png')}}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        jost: ['Jost', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('css')
</head>

<body class="font-jost antialiased bg-gray-50 text-gray-900">
    @include('front.include.header')
    <div class="top-to fixed bottom-6 right-6 z-50 hidden">
        <button class="bg-black text-white p-3 rounded-full hover:bg-gray-800 transition duration-300 shadow-lg">
            <i class="fas fa-long-arrow-alt-up"></i>
        </button>
    </div>
    <main class="min-h-screen">
        @yield('content')
    </main>
    @include('front.include.footer')
    @if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    </script>
    @endif

    @if(session('warning'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'warning',
            title: "{{ session('warning') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    </script>
    @endif

    <script>
        const scrollTopBtn = document.querySelector('.top-to button');

        // Show button when user scrolls down
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopBtn.parentElement.classList.remove('hidden');
            } else {
                scrollTopBtn.parentElement.classList.add('hidden');
            }
        });

        // Scroll to top on click
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

    <div id="exampleModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50 items-center justify-center p-4">
        <div class="bg-white rounded-lg max-w-4xl w-full relative shadow-xl overflow-hidden">
            <div class="absolute top-4 right-4 z-10">
                <button type="button" class="text-gray-500 hover:text-black text-xl p-2 transition" onclick="document.getElementById('exampleModal').classList.replace('flex', 'hidden')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6 md:p-8">
                <section class="shop-detail">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                        <div class="md:col-span-5">
                            <div class="space-y-4">
                                <div class="border border-gray-200 rounded-lg overflow-hidden">
                                    <div class="item">
                                        <img class="w-full h-auto object-cover" src="{{asset('front/assets/images/shop/shop1.jpg')}}" alt="Product">
                                    </div>
                                </div>
                                <div class="grid grid-cols-4 gap-2">
                                    <div class="border border-gray-200 rounded cursor-pointer hover:border-black transition">
                                        <img class="w-full h-auto object-cover" src="{{asset('front/assets/images/shop/shop-sm1.jpg')}}" alt="Product">
                                    </div>
                                    <div class="border border-gray-200 rounded cursor-pointer hover:border-black transition">
                                        <img class="w-full h-auto object-cover" src="{{asset('front/assets/images/shop/shop-sm2.jpg')}}" alt="Product">
                                    </div>
                                    <div class="border border-gray-200 rounded cursor-pointer hover:border-black transition">
                                        <img class="w-full h-auto object-cover" src="{{asset('front/assets/images/shop/shop-sm3.jpg')}}" alt="Product">
                                    </div>
                                    <div class="border border-gray-200 rounded cursor-pointer hover:border-black transition">
                                        <img class="w-full h-auto object-cover" src="{{asset('front/assets/images/shop/shop-sm4.jpg')}}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-7">
                            <div class="space-y-4">
                                <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded uppercase">in stock</span>
                                <h4 class="text-2xl font-bold text-gray-900">Flower Check Flannel Jacket</h4>
                                <div class="flex items-center space-x-3">
                                    <ul class="flex text-amber-400 text-sm space-x-1">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p class="text-sm text-gray-500">(2 customer review)</p>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">$671.73 – <span class="text-gray-400 line-through font-normal">$921.45</span></h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Crescendo lacusque ut utramque. Rapidisqur descen Diversa plagae minantia terras! Naturae super perveniunt Fixo fronde tellure orbis consistere margine sole toto tu </p>

                                <div class="flex items-center space-x-4">
                                    <p class="text-sm font-medium uppercase tracking-wider text-gray-700">color : </p>
                                    <ul class="flex space-x-2">
                                        <li><a href="#!" class="inline-block w-6 h-6 rounded-full bg-blue-600 hover:scale-110 transition"></a></li>
                                        <li><a href="#!" class="inline-block w-6 h-6 rounded-full bg-red-600 hover:scale-110 transition"></a></li>
                                        <li><a href="#!" class="inline-block w-6 h-6 rounded-full bg-pink-500 hover:scale-110 transition"></a></li>
                                    </ul>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <p class="text-sm font-medium uppercase tracking-wider text-gray-700">size : </p>
                                    <ul class="flex space-x-2">
                                        <li><a href="#!" class="border border-gray-300 text-sm font-medium px-3 py-1 uppercase rounded hover:border-black transition">s</a></li>
                                        <li><a href="#!" class="border border-gray-300 text-sm font-medium px-3 py-1 uppercase rounded hover:border-black transition">m</a></li>
                                        <li><a href="#!" class="border border-gray-300 text-sm font-medium px-3 py-1 uppercase rounded hover:border-black transition">l</a></li>
                                        <li><a href="#!" class="border border-gray-300 text-sm font-medium px-3 py-1 uppercase rounded hover:border-black transition">xl</a></li>
                                    </ul>
                                </div>
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex flex-wrap items-center gap-4">
                                        <div class="flex items-center border border-gray-300 rounded overflow-hidden">
                                            <input type="text" class="w-12 text-center py-2 focus:outline-none font-semibold text-gray-800" value="1">
                                        </div>
                                        <a href="#!" class="bg-black text-white text-sm font-semibold tracking-wider uppercase px-6 py-3 rounded hover:bg-gray-800 transition">add to cart</a>
                                        <a href="#!" class="p-3 border border-gray-300 rounded text-gray-600 hover:text-black hover:border-black transition"><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>