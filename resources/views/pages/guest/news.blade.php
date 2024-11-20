@extends("layouts.guest")
@section('title', 'Berita')

@section('content')

<section class = "px-5 row"> 

    <article class="col-lg-8  pt-3 pb-5 ps-5 pe-5 ">
        <div class="container">
    @forelse ($news as $n)
         <div class="card shadow my-4 rounded" data-aos="fade-up" data-aos-delay="300" data-aos-duration="900" >
             <img src="{{ getFileInfo($n->image_url)['preview'] }}" class="card-img-top rounded" alt="...">
        <div class="card-body">
              <h3 class="card-title fw-semibold py-1"><a class ="a-news" href="{{route('news.detail', $n->id)}}">{{ $n->title }}</a></h3>
              <p style = "font-size:12px" class = "pb-3" >
                <span><i style = "font-size: 18px;" class="ti ti-user px-2"></i>{{$n->Author->name}}</span>
                <span><i style = "font-size: 18px;" class="ti ti-calendar-time px-2"></i><?php echo substr($n->created_at, 0, 10,)?></span>
             </p>
                <p class="card-text " >
                    <a class = "text-black-50" style ="font-size:16px" href="{{route('news.detail', $n->id)}}"><?php echo substr($n->description, 0, 200,)?>....</a>
                </p>
                <p class="text-end px-5 py-0 ">
                <a  href = "{{route('news.detail', $n->id)}}" class="btn-news btn px-3 py-2">Baca Selengkapnya</a>  
            </p> 
        </div>
        </div>
        @empty
            <p>Tidak ada berita yang ditemukan.</p>
        @endforelse
        </div>
        <div>
            {{$news->links(('layouts.partials.paginate-news'))}}
        </div>
        
    </article>

    <article class= " col-lg-4 pt-5 pb-5 ps-0 pe-5 container">   
    
        <div class="card rounded-0" style="background-color:var(--bs-gray-100);" >
         <div class ="container p-4">
       <!-- <h4 class ="text-black-60 fw-bold">Search</h4>-->
       <form action="{{route('search')}}" method ="GET">
        <div class="input-group mb-3 py-3">
         <input type="text" class="border border-dark-subtle opacity-50 form-control " placeholder="Search" name="search" value ="{{ old('cari')}}" aria-label="Recipient's Search" aria-describedby="basic-addon2">
         <button type="submit" style ="background-color:var(--bs-andini3);" class="border-0 input-group-text" id="basic-addon2"><i style = " font-size: 25px;" class="text-white ti ti-search"></i></button>
        </div>
        </form>

        <h4 class ="text-black-60 fw-bold" >Categories</h4>
        <hr class ="m-0" style = "background: linear-gradient(to right, var(--bs-andini1), var(--bs-andini3)); height:3px; border:none; opacity: 1;">
        <div class="card mb-5 bg-transparent my-2 mx-2" style="box-shadow:none; margin-bottom: 10px;">
      
                @foreach($kategoriNews as $k)
                <p class ="py-0 px-3 my-2 "><a href="{{route('news.kategori', $k->id)}}" class="a-news  fs-4">{{$k->name}}</a></p>
                @endforeach

         </div>

        <h4 class ="text-black-60 fw-bold" >Trending</h4>
        <hr class ="m-0" style = "background: linear-gradient(to right, var(--bs-andini1), var(--bs-andini3)); height:3px; border:none; opacity: 1;">
        @foreach ($newsNew as $n)
         <div class="card bg-transparent my-4" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-5">
                <img src="{{ getFileInfo($n->image_url)['preview'] }}" class="img-fluid h-100 rounded-start" alt="...">
                </div>
                <div class="col-md-7">
                    <div class="m-0 p-2 card-body">
                        <h5 class="card-title fs-2"><a class ="a-news" href="{{route('news.detail', $n->id)}}">{{ $n->title }}</a></h5>
                        <p class="m-0">
                            <span class ="fs-1"><i style = "font-size: 12px;" class="ti ti-user px-2 text-black fw-bold "></i>{{$n->Author->name}}</span>
                            <span class ="fs-1"><i style = "font-size: 12px;" class="ti ti-calendar-time px-2 text-black fw-bold"></i><?php echo substr($n->created_at, 0, 10,)?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
</article>

</section>


@endsection