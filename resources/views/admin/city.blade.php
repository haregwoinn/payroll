
@include('admin.header');


            <div class="  mx-auto md:ml-24 bg-white rounded-lg w-4/5 sm:w-1/3 lg:w-1/4  shadow">
            <div class="bg-gradient-to-r from-gray-300 to-blue-300">
                <h1 class="text-center p-3 font-bold text-xl text-blue-900 tracking-wider uppercase">Add new city</h1>
            </div>
            
            <form action="{{route('city.add')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="px-5 pb-5 m-4">
               <input name="city"  placeholder="city tobe register" id="city"  class="block my-5 w-full px-2 text-bold rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-blue-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
               <select name="level" id="level"  placeholder="level of city" class="block w-full px-2 text-bold rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-blue-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option>ፌደራል</option>
                            <option>ክልል</option>
                            <option>ዞን </option>
                            <option>ወረዳ</option>
                            <option>ቀበሌ</option>
                        </select> 
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



            

          <div class="my-24 min-w-table md:w-3/4 mx-auto border-4 bg-white shadow-lg rounded-sm  border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-300 to-blue-300" >
                    <h2 class="font-bold  text-blue-900 text-center tracking-wider uppercase  text-2xl">cities list</h2>
            </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">city</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">level</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">desert allowance</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">status</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">created at (ET)</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">updated at (ET)</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                            </tr>
                        </thead>

                        
                        <tbody class="text-sm divide-y divide-gray-100">
                          @foreach($cities as $city)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">{{$city->city}}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$city->level}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$city->desertalw}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-green-500">{{$city->status}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">{{$city->created_at}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">{{$city->updated_at}}</div>
                                </td>
                                <td >
                                  <a  href="{{url('/city/edit/'.$city->id)}}" id="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">Edit</a>
                                  |<a  href="{{url('/city/remove/'.$city->id)}}" id="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-rose-600 border border-transparent rounded-md active:bg-rose-600 hover:bg-rose-700 focus:outline-none focus:shadow-outline-purple">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                     </div>
                 </div>
        </div>
        </main>
      </div>
    </div>
  </body>
</html>