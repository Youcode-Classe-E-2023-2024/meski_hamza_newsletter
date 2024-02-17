
<div id="dashboard-container" class="mt-8 flex items-center justify-center">
    <section class="mt-10 w-full">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="backdrop-blur-sm relative shadow-md sm:rounded-lg overflow-hidden border-green-500 border-solid border-[.5px]" style="background-color: rgba(0, 0, 0, 0.403);">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                     fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>

                            <input
                                wire:model.live.debounce.300s = "search"
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="">
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-40 text-sm font-medium text-white">User Type :</label>
                            <select
                                wire:model.live = "admin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="ALL">All</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3 flex gap-2 items-center" wire:click="setSortBy('name')">
                                <span>name</span>
                                <ion-icon name="chevron-expand-outline" class="text-2xl text-black"></ion-icon>
                            </th>
                            <th scope="col" class="px-4 py-3">email</th>
                            <th scope="col" class="px-4 py-3">Role</th>
                            <th scope="col" class="px-4 py-3 flex gap-2 items-center" wire:click="setSortBy('created_at')">
                                <span>joind at</span>
                                <ion-icon name="chevron-expand-outline" class="text-2xl text-black"></ion-icon>
                            </th>
                            <th scope="col" class="px-4 py-3">updated at </th>
                            <th scope="col" class="px-4 py-3">
                                action
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            @if($user->roles->first()->name !== 'admin')
                                <tr  class="border-b dark:border-gray-700">
                                    <td scope="col" class="px-4 py-3 text-white" >{{ $user->name }}</td>
                                    <td scope="col" class="px-4 py-3">{{ $user->email }}</td>
                                    <td onclick="openModal('modelConfirm{{$user->id}}', {{$user->id}})" scope="col" class="px-4 py-3 text-white m-2 cursor-pointer {{ $user->roles->first()->name != 'member' ? 'bg-red-500': 'bg-green-500' }}">
                                        {{ $user->roles->first()->name? $user->roles->first()->name: 'user' }}</td>
                                    {{-- Give permission form start --}}
                                        <div id="modelConfirm{{$user->id}}" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                                            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

                                                <div class="flex justify-end p-2">
                                                    <button onclick="closeModal('modelConfirm{{$user->id}}')" type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                  clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </div>

                                                <form action="{{ route('users.assignRoleToUser', $user->id) }}" method="POST" class="rollForm p-6 pt-0 text-center">
                                                    @csrf
                                                    <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <h3 id="ttt" class="text-xl font-normal text-gray-500 mt-5 mb-6">Change the role of to:</h3>
                                                    <div class="">
                                                        <select name="role" class="py-3 px-4 pe-9 block w-full border-green-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                                            <option value="member">Member</option>
                                                            <option value="editor-lvl1">Editor lvl-1 (CRUD Template)</option>
                                                            <option value="editor-lvl2">Editor lvl-2 (CRUD + SEND Template)</option>
                                                            <option value="editor-lvl3">Editor lvl-3 (CRUD + SEND Template + HANDLE VIDEOS)</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="SUBMIT bg-green-500 px-8 py-2 rounded-md mt-6">submit</button>
                                                </form>

                                            </div>
                                        </div>
                                    {{-- Give permission form end --}}
                                    <td scope="col" class="px-4 py-3">{{ $user->created_at }}</td>
                                    <td scope="col" class="px-4 py-3">{{ $user->updated_at }}</td>
                                    <td scope="col" class="px-4 py-3 flex items-center justify-end">
                                        <button onclick="confirm('Are you sure you want to delete {{ $user->name }} ?') ? '' : event.stopImmediatePropagation()" wire:click="delete({{ $user->id }})" class="px-3 py-1 bg-red-500 text-white rounded">X</button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm text-white font-bold">Per Page</label>
                            <select
                                wire:model.live = 'perPage'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
