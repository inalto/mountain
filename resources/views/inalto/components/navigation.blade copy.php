<header class="fixed z-10 flex flex-wrap justify-between w-full p-0 m-0 bg-blue-800 pin-t">
    
        <div class="flex items-center mr-6 text-white flex-no-shrink">
			<a class="text-white no-underline hover:text-white hover:no-underline" href="{{ url('/') }}">
				<img class="w-16 p-1" src="/theme/logo.png" />
			</a>
		</div>
        

		<div class="block p-4 lg:hidden">
			<button id="nav-toggle" class="flex items-center px-3 py-2 text-gray-300 border border-gray-300 rounded hover:text-white hover:border-white">
				<svg class="w-3 h-3 fill-current"  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			</button>
		</div>

        <div class="flex-grow hidden w-full pt-0 lg:flex lg:items-center lg:w-auto lg:block lg:pt-0" id="nav-content">
               
{{--
        <x-jet-label for="inaltomenu" class="visible cursor-pointer sm:visible md:visible lg:hidden"><i class="my-auto text-3xl text-gray-100 icon-menu hover:text-qyorange-normal"></i></x-jet-label>
        </div>
    
        <input id="inaltomenu" type="checkbox" name="inaltomenu" class="hidden">
 --}}
        
        
        <div id="main-menu" class="relative flex flex-col flex-wrap justify-start hidden w-full px-10 uppercase lg:-px-3 sm:flex-col md:flex-col lg:flex-row sm:hidden md:hidden lg:flex xl:flex neu-dark z-2" >
        
        
            


            <a href="#" class=" px-3 transition ease-in-out duration-700 <!--text-qyorange-normal --> text-gray-200  text-center sm:text-center md:text-center lg:text-left xl:text-left block py-3 sm:py-3 sm:w-full md:text-lg md:w-auto px-1 hover:text-gray-100 hover:bg-blue-600">test</a>
            <a href="#" class=" px-3 transition ease-in-out duration-700 <!--text-qyorange-normal --> text-gray-200  text-center sm:text-center md:text-center lg:text-left xl:text-left block py-3 sm:py-3 sm:w-full md:text-lg md:w-auto px-1 hover:text-gray-100 hover:bg-blue-600">test</a>
            
            {{--
            {% if user %}
                        <div class="relative group dropdown">
                            <a class="px-3 transition ease-in-out duration-700 {% if (this.page.id in 'account' )%} text-qyorange-normal {% else %} text-gray-200 {% endif %}  text-center sm:text-center md:text-center lg:text-left  block sm:py-3 sm:w-full md:text-lg md:w-auto px-1 hover:text-qyorange-normal cursor-pointer hover:bg-black ">My Account <i class="icon-down"></i></a>
                            <div class="animated fadeIn menu sm:relative md:relative lg:absolute xl:absolute group-hover:block">
                                <a href="/{{ activeLocale }}/account/orders" class="{% if ('orders' in this.param.page )%} text-qyorange-normal {% else %} text-gray-200 {% endif %}  text-center sm:text-center md:text-center lg:text-left xl:text-left no-underline block px-4 py-3 hover:text-white hover:bg-qyorange-normal whitespace-no-wrap">{{ 'offline.mall::frontend.orders' | trans }}</a>
                                <a href="/{{ activeLocale }}/account/addresses" class="{% if ('addresses' in this.param.page )%} text-qyorange-normal {% else %} text-gray-200 {% endif %}  text-center sm:text-center md:text-center lg:text-left xl:text-left no-underline block px-4 py-3 hover:text-white hover:bg-qyorange-normal whitespace-no-wrap">{{ 'offline.mall::frontend.addresses' | trans }}</a>
                                <a href="/{{ activeLocale }}/account/profile" class="{% if ('profile' in this.param.page )%} text-qyorange-normal {% else %} text-gray-200 {% endif %}  text-center sm:text-center md:text-center lg:text-left xl:text-left no-underline block px-4 py-3 hover:text-white hover:bg-qyorange-normal whitespace-no-wrap">{{ 'offline.mall::frontend.profile' | trans }}</a>
                                <a class="block px-4 py-3 text-center text-gray-200 no-underline whitespace-no-wrap sm:text-center md:text-center lg:text-left xl:text-left hover:text-white hover:bg-qyorange-normal" href="javascript:;" data-request="onLogout" data-request-data="redirect: '/'"> {{ 'offline.mall::frontend.session.logout' | trans }}</a>
                            </div>
                        </div>
            {% else %}
                <a href="{{'login'|page}}" class="px-3 transition ease-in-out duration-700 {% if ( 'account' in this.page.id )%} text-qyorange-normal {% else %} text-gray-200 {% endif %}  block py-3 sm:py-3 sm:w-full text-center sm:text-center md:text-center lg:text-left xl:text-left md:text-lg md:w-auto px-1 hover:text-qyorange-normal hover:bg-black">Login</a>
            {% endif %}
--}}


    <div class="flex-grow"></div>
            
        </div>
    </div>
</header>