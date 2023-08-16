<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight
                   text-xl text-gray-800 dark:text-gray-200">
            {{ __('Ratings') }}
        </h2>
    </x-slot>

    <table class="table w-full text-gray-900 dark:text-gray-200">
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
                    @for($count=1; $count <= $rating->stars; $count++)
                        <i class="fa fa-{{ $rating->icon }}"></i>
                    @endfor
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
            <td colspan="4"></td>
        </tr>
        </tfoot>
    </table>

</x-guest-layout>
