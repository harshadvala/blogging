<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center text-sm text-light  mb-2">
            @if($blogs->count()>1)
                <a href="?orderBy={!! (request()->get('orderBy','desc')=='asc')?'desc':'asc' !!}">
                    <img src="{!! asset('images/sort.svg') !!}" class="bg-gray-100 border border-transparent w-7">
                </a>
            @endif
            @auth
                <span class="ml-auto">
                    <a href="{!! route('blogs.create') !!}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mr-3 sm:mr-0">
                    New Blog
                </a>
                </span>
            @endauth

        </div>


        <div class="w-full">

            @if(!$blogs->count())
                <div class=" px-6 py-4 border-0 rounded relative mb-4 bg-gray-200 mt-5">
                <span class="inline-block align-middle mr-8">
                          No blogs found!
                </span>
                </div>
            @endif

            @foreach($blogs as $blog)
                <div class="bg-white overflow-hidden shadow-sm mb-5">
                    <div class="bg-white border-b border-gray-200">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-0 text-lg text-gray-600 leading-7 font-semibold">
                                    {!! $blog->title !!}
                                </div>
                            </div>

                            <div class="ml-0">
                                <div class="mt-2 text-sm text-gray-500">
                                    {!! $blog->description !!}
                                </div>
                            </div>

                            <div class="flex items-center text-sm text-light mt-5">
                                <img
                                    src="{!! asset('images/no-avatar.gif') !!}"
                                    class="w-10 h-10 rounded-full" title="James Brooks">

                                <span class="ml-2">{!! $blog->user->name !!}</span>
                                <span class="ml-auto">{!! $blog->publication_date->format('M, d Y') !!}
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $blogs->links() }}
    </div>
</div>
