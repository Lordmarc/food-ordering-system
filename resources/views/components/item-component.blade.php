@props(['item'])

<div class=" w-full shadow-lg h-64 rounded-md overflow-hidden hover:scale-105 duration-75 transition ease-in-out relative">
    <a href="{{ route('admin.edit.item', $item) }}" class="absolute top-0 right-0 bg-white/50 w-16 backdrop-blur-md rounded-bl-md group cursor-pointer text-center py-2 ">
        <i class="fa-solid fa-pencil text-white font-bold"></i>
         <span class="absolute right-full top-1/2 -translate-y-1/2 mr-2 
                     hidden group-hover:block bg-gray-800 text-white text-xs rounded-md px-2 py-1 shadow-lg">
            Edit
        </span>
    </a>
    <div class="h-40">
        
        <img src="{{$image}}" alt="" class="h-full w-full">
    </div>
    <div class="p-2 flex flex-col justify-between h-24">
        <h3>{{ $name }}</h3>
        <div class="text-end text-gray-500">
        <i class="fa-solid fa-peso-sign"></i><span>{{ $price }}</span>
        </div>
        
    </div>
    
</div>