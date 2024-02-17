<div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
    <div class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 border-none">
        <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden" src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
        <span class="hidden md:block">ADMIN</span>
    </div>
    <div class="flex justify-between items-center h-14  header-right">
        <ul class="flex items-center">
            <li class="flex gap-2 items-center mr-4 hover:text-blue-100">
                @auth
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2">
                        <span>
                            {{ auth()->user()->name }}
                        </span>
                        <div class="h-[40px] w-[40px] rounded-md" style="background-image: url('{{ auth()->user()->getImageURL() }}'); background-size:cover;background-position: center"></div>
                    </a>
                @endauth
            </li>
        </ul>
    </div>
</div>
