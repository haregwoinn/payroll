

@include('admin.header')
        <div class=" m-auto md:ml-24 bg-white rounded-lg w-4/5 sm:w-1/3 lg:w-1/4  shadow">
            <div class="bg-gradient-to-r from-gray-300 to-blue-300">
                <h1 class="text-center p-3 font-bold text-xl text-blue-900 tracking-wider uppercase">Add Scales to Allowance</h1>
            </div>
            
            <form action="{{route('scale.update')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="px-5 pb-5 m-4">
               <input name="scale" value="{{$scale->scale}}"   id="scale" placeholder="scale"  class="block w-full px-2 text-bold rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-blue-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 my-6">
               <input name="rate" value="{{$scale->rate}}" id="rate" placeholder="rate" class="block w-full px-2 text-bold rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-blue-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"> 
               <div class="flex items-center pt-3">
                <input type="text" name="id" value="{{$scale->id}}" id="id" class="hidden">
                <input type="checkbox" id="check" name="check" class="w-4 h-4 text-black bg-gray-300 border-none rounded-md focus:ring-transparent">
                <label for="check" class="block ml-2 text-sm text-gray-900">make it active</label></div>
            </div>
            <hr class="mt-4">
            <div class="flex flex-row-reverse p-3">
               <div class="flex-initial pl-3">
                  <button type="submit" name="submit" id="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                     <span class="pl-2 mx-1">update scale</span>
                  </button>
               </div>
            </div>

            </form>
        </div>
        


</div>
</body>
</html>