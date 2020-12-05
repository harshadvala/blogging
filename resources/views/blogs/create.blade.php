<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm">
                <!-- component -->
                <div class="grid place-items-center">
                    <div class="p-10 w-full">
                        <h1 class="text-xl font-semibold">Blog Detail
                        </h1>
                        <form action="{!! route('blogs.store') !!}" method="post" class="mt-6">
                            @csrf
                            <div>
                                <label for="title"
                                       class="block text-xs font-semibold text-gray-600 uppercase">Title</label>
                                <input id="title" type="text" name="title" placeholder="Title"
                                       autocomplete="given-name"
                                       class="border-solid border-gray-200 border-2 p-3 w-full @error('title') is-invalid @enderror"
                                />
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <label for="description"
                                       class="block text-xs font-semibold text-gray-600 uppercase">Description</label>
                                <textarea id="description" type="text" name="description" placeholder="description"
                                          autocomplete="given-name"
                                          class="border-solid border-gray-200 border-2 p-3  w-full  @error('description') is-invalid @enderror"
                                          rows="5"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Save
                                </button>

                                <a href="{!! route('home') !!}"
                                   class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs  uppercase tracking-widest hover:bg-gray-400 active:bg-gray-900 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Cancel
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
