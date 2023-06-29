@include('admin.header');

        @if(session('success'))
    <div class="flex bg-green-100 sm:w-1/2 mt-20 rounded-lg p-4 mb-4 text-sm text-green-800 mx-auto" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-bold text-2xl">{{ session('success') }}</span> 
        </div>
    </div>
@endif

        <div class=" mx-auto md:ml-24 bg-white rounded-lg w-4/5 sm:w-1/3 lg:w-1/4  shadow">
            <div class="bg-gradient-to-r from-gray-300 to-blue-300">
                <h1 class="text-center p-3 font-bold text-xl text-blue-900 tracking-wider uppercase">Add Scales to Allowance</h1>
            </div>
            
            <form action="{{route('admin.add')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="px-5 pb-5 m-4">
               <input name="scale"  placeholder="scale" id="scale"  class="block w-full px-2 text-bold rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-blue-400 placeholder:text-gray-400 my-5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
               <input name="rate" id="rate"  placeholder="rate" class="block w-full px-2 text-bold rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-blue-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"> 
               <div class="flex items-center pt-3">
                <input type="checkbox" id="check" name="check" class="w-4 h-4 text-black bg-gray-300 border-none rounded-md focus:ring-transparent">
                <label for="check" class="block ml-2 text-sm text-gray-900">make it active</label></div>
            </div>
            <hr class="mt-4">
            <div class="flex flex-row-reverse p-3">
               <div class="flex-initial pl-3">
                  <button type="submit" name="submit" id="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                     <span class="pl-2 mx-1">Add scale</span>
                  </button>
               </div>
            </div>

            </form>
        </div>
        


        <!-- table -->
        <div class="  my-24 min-w-table md:w-3/4 mx-auto border-4 bg-white shadow-lg rounded-sm  border-gray-200 ">
            <header class="px-5 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-300 to-blue-300" >
                    <h2 class="font-bold  text-blue-900 text-center tracking-wider uppercase  text-2xl">Allowance scale</h2>
            </header>
                <div class="p-3">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">scalename</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">rate</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">status</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">created at (ET)</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">updated at (ET)</div>
                                </th>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">Action</div>
                                </td>
                            </tr>
                        </thead>

                        
                        <tbody class="text-sm divide-y divide-gray-100">
                          @foreach($scales as $scale)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">{{$scale->scale}}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$scale->rate}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-green-500">{{$scale->status}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">{{$scale->created_at}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">{{$scale->updated_at}}</div>
                                </td>
                                <td >
                                  <a href="{{url('/admin/editscale/'.$scale->id)}}" class=" px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">Edit</a>
                                  |<a href="{{url('/admin/removescale/'.$scale->id)}}"  class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-rose-600 border border-transparent rounded-md active:bg-rose-600 hover:bg-rose-700 focus:outline-none focus:shadow-outline-purple">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                     </div>
                 </div>

        
            </div>
        </div>



</div>
</body>
</html>