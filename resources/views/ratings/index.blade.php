<x-guest-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold leading-tight
                    grow
                   text-xl text-gray-800 dark:text-gray-200">
                {{ __('Ratings') }}
            </h2>
            <p>
                <a href="{{ route('ratings.create') }}"
                   class="rounded-lg p-2 bg-blue-900 text-white
                        hover:bg-blue-100 hover:text-blue-900
                        transition ease-in-out duration-500"
                >Add New Rating</a>
            </p>
        </div>
    </x-slot>

    @if(session()->has('created'))
        <div class="w-full p-2 m-0 mb-6">
            <p class="w-full p-4 bg-green-500 text-white rounded">
                <i class="text-xl fa fa-check-circle text-green-200 bg-green-800 rounded-full mr-4 p-2"></i>
                The rating "{{ session()->get('created') }} was created successfully.
            </p>
        </div>
    @endif
    @if(session()->has('updated'))
        <div class="w-full p-2 m-0 mb-6">
            <p class="w-full p-4 bg-amber-500 text-white rounded">
                <i class="fa fa-check-circle text-amber-200 bg-amber-800 rounded-full mr-4 p-2"></i>
                The rating "{{ session()->get('updated') }} was updated successfully.
            </p>
        </div>
    @endif
    @if(session()->has('deleted'))
        <div class="w-full p-2 m-0 mb-6">
            <p class="w-full p-4 bg-purple-500 text-white rounded">
                <i class="fa fa-check-circle text-purple-200 bg-purple-800 rounded-full mr-4 p-2"></i>
                The rating "{{ session()->get('deleted') }} was deleted successfully.
            </p>
        </div>
    @endif

    <table class="table bg-gray-100 rounded-lg  w-full text-gray-900 dark:text-gray-200">
        <thead>
        <tr>
            <th>Row</th>
            <th>Name</th>
            <th>Stars</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ratings as $rating)
            <tr>
                <td class="p-2">{{ $loop->index + 1 }}</td>
                <td class="p-2">{{ $rating->name }}</td>
                <td class="p-2">
                    @for($count=1; $count <= $rating->stars / 2; $count++)
                        <i class="fa fa-{{ $rating->icon }}"></i>
                    @endfor
                     ({{ $rating->stars / 2 }})
                </td>
                <td class="p-2">
                    <a href="{{ route('ratings.show',['rating'=>$rating->id]) }}"
                       class="text-center p-2 grow
                          text-white rounded-l-md
                          bg-green-500 hover:bg-green-900
                          dark:bg-green-800 dark:hover:bg-green-500
                          transition ease-in-out duration-350">
                        <i class="fa fa-eye"></i>
                        <span class="sr-only">Show</span>
                    </a>

                    <a href="{{ route('ratings.edit',['rating'=>$rating->id]) }}"
                       class="text-center p-2 grow
                          text-white
                          bg-orange-500 hover:bg-orange-900
                          dark:bg-orange-800 dark:hover:bg-orange-500
                          transition ease-in-out duration-350">
                        <i class="fa fa-edit"></i>
                        <span class="sr-only">Edit</span>
                    </a>

                    <a href="{{ route('ratings.delete',['rating'=>$rating->id]) }}"
                       class="text-center p-2 grow rounded-r-md
                          text-white
                          bg-red-500 hover:bg-red-900
                          dark:bg-red-800 dark:hover:bg-red-500
                          transition ease-in-out duration-350">
                        <i class="fa fa-times"></i>
                        <span class="sr-only">Delete</span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="p-2 border-none">
                {{ $ratings->links() }}
            </td>
        </tr>
        </tfoot>
    </table>

</x-guest-layout>
