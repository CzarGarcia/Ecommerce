
@if(count($breadcrumbs))
<nav class="mb-4">
   <ol class=" flex flex-wrap"> 
        @foreach($breadcrumbs as $breadcrumb)
            <li class="text-sm leading-normal text-slate-700 {{!$loop->first ? "pl-2  before:float-left before:pr-2 before:content-['/']" :''}}">
            {{-- <a href="#" class="opacity-50">
               {{$breadcrumb['name']}}
            </a> --}}
            @isset($breadcrumb['route'])
                <a href="{{ $breadcrumb['route'] }}" class="opacity-50">
                    {{$breadcrumb['name']}}
                </a>
            @else
                {{$breadcrumb['name']}}
            @endisset
            </li>

            
        @endforeach
   </ol>
   @if(count($breadcrumbs) > 1)
    
   <h6>{{end($breadcrumbs)['name']}}</h6>
    @endif
</nav>
@endif


{{-- <li class="text-sm leading-normal text-slate-700 pl-2 before:float-left before:pr-2 before:content-['/']">
            <a href="#" class="opacity-50">
                Producto 
            </a>
            </li>
            
            <li class="text-sm leading-normal text-slate-700 pl-2 before:float-left before:pr-2 before:content-['/'] ">
            
                Nuevo 
            </li> --}}