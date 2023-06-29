<!DOCTYPE html>
<html class="h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>Laravel</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
 <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>

        </style>
    </head>
    <body class="w-full">


        <div class="flex w-full flex-col justify-center  text-4xl  font-bold  py-12 lg:px-8 tracking-widest">

                <div>
            <header>
                
<nav class="bg-white dark:bg-gray-900   z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="https://flowbite.com/" class="flex items-center">
      <span class="self-center text-4xl font-bold whitespace-nowrap dark:text-white">payroll Calculator</span>
  </a>
  <div class="items-center justify-between w-full flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex gap-8 p-4 md:p-0 mt-4 font-bold border border-gray-100 rounded-lg bg-gray-50 flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="{{route('salarypage')}}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">salary</a>
      </li>
      <li>
        <a href="{{ route('userlogout') }}" class="block py-2 pl-3 pr-4 bg-red-400 p-4 text-white rounded hover:bg-gray-100 md:hover:bg-red-600 md:p-0 md:dark:hover:font-bold dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Logout</a>
      </li>
      <li>
        
      </li>
    </ul>
  </div>
  </div>
</nav>

            </header>
        </div>


                @if(session('success'))
    <div class="flex bg-green-100 sm:w-1/2 mt-20 rounded-lg p-4 mb-4 text-sm text-green-800 mx-auto" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-bold text-2xl">{{ session('success') }}</span> 
        </div>
    </div>
@endif
        <!-- calculation form -->
            <div id="closeeventhandler" class="sm:max-w-4xl min-h-1/2   w-full border-blue-400 shadow-md px-16 mt-32 border-2 mx-auto rounded-lg">
            <div class="sm:mx-auto border-b-2 border-blue-200">
                <h1 class="mt-10 text-center text-5xl font-bold leading-10  text-gray-900">የውሎአበል መጠየቂያና መፍቀጃ ቅጽ</h1>
            </div>


            
            <div class="mt-10  sm:mx-auto">
                
                <form id="calendar-form"  action="{{route('printpdf')}}" method="GET" enctype="multipart/form-data">
                     @csrf
                <div class="sm:grid my-5 sm:grid-cols-2 gap-2 sm:gap-4">
                    <div>
                        <label class="block text-4xl  font-bold leading-10 text-gray-900" for="">የጉዞ መነሻ ቦታ</label>
                    <div class="mt-2">
                        <select name="start_city" class="block w-full px-2 text-bold rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-blue-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-10 ">
                            @foreach($cities as $city)
                            <option>{{$city->city}}</option>
                        @endforeach
                        </select>
                    </div>
                    </div>

                    <div >
                        <label class="block text-4xl  font-bold leading-10 text-gray-900" for="">የጉዞ መድረሻ ቦታ</label>
                    <div class="mt-2">
                        <select name="end_city" class="block w-full px-2 text-bold rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-blue-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-10 ">

                        @foreach($cities as $city)
                            <option>{{$city->city}}</option>
                        @endforeach
                        </select>
                        
                    </div>
                    </div>
                </div>

                <div class="sm:grid my-5 sm:grid-cols-2 gap-2 sm:gap-4 ">
                    <div >
                        <label class="block text-4xl  font-bold leading-10 text-gray-900" for="">ቁርስ</label>
                    <div class="mt-2">
                        <select id="brake-fast" name="brake_fast" required type="text" class="block w-full px-2 text-bold rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-blue-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-10">
                        @foreach($cities as $city)
                            <option>{{$city->city}}</option>
                        @endforeach
                        </select>
                    </div>
                    </div>

                    <div >
                        <label class="block text-4xl  font-bold leading-10 text-gray-900" for="">ምሳ</label>
                    <div class="mt-2">
                        <select id="lanch" name="lanch" required type="text" class="block w-full px-2 font-bold rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-blue-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-10">
                        @foreach($cities as $city)
                            <option>{{$city->city}}</option>
                        @endforeach
                        </select>
                    </div>
                    </div>
                </div>


                <input name="date_diference" class="date_difference hidden" value="" type="text">


                <div class=" my-5 sm:w-5/6 mx-auto">
                    <div >
                        <label class="block text-4xl text-center font-bold leading-10 text-gray-900" for="">የጉዞ መነሻ እና መድረሻ ቀን</label>
                    <div class="mt-2 grid grid-cols-2   dateinputs  ">
                     <div>
                           <input autocomplete="off" id="from" placeholder="21-12-2014" name="start_date" required type="text" class=" updatenput datepicker-input ">

                     </div>
                        <div>
                            <input id="to" name="end_date" autocomplete="off" placeholder="26-12-2014" required  type="text" class="updateenddate ">
                        </div>
                    </div>

                    <label  id="datewarning" class="text-red-600 font-serif hidden text-md datewarning" for="">see your histories  </label>
                    </div>
                </div>
            </div>

            <div class="my-10 justify-center">
                        <button  onclick="checkDates(event)"  class="submitbutton flex mx-auto w-2/3 justify-center rounded-md bg-indigo-600 px-3 py-3 text-3xl font-bold leading-10 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" >preview pdf</button>
                    </div>
            </from>
            </div>

            <div class="my-10 justify-center">
                        <button type="button" id="histrycontroller" onclick="historyControle()"  class=" hidden  mx-auto w-1/4 justify-center rounded-md bg-red-600 px-3 py-3 text-3xl font-bold leading-10 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600" >show history</button>
                    </div>
        </div>


        

        
<div>



  <div id="histrybord" class="w-full max-w-4xl mx-auto hidden bg-white shadow-lg rounded-sm border mb-48 border-blue-200">
            <header class="px-5 py-4 border-b border-blue-100">
                <h2 class="font-semibold text-4xl text-gray-800">Histories</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-2xl font-semibold  text-gray-900 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">nu</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">start date</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">end date</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">mission</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-2xl divide-y divide-gray-100">
 @php
$counter = 1;
@endphp


@foreach($datehistry as $history)
@php
    $startdate = explode('/', $history->start_date);
    $enddate = explode('/', $history->end_date);
    $index = $startdate[0]-1;
    $endindex = $enddate[0]-1;
@endphp
<tr>
    <td class="p-2 whitespace-nowrap">
        <div class="text-left">{{$counter++}}</div>
    </td>
    <td class="p-2 whitespace-nowrap">
        <div class="text-left">{{$ethiomonth[$index]."/".$startdate[1]."/".$startdate[2]}}</div>
    </td>
    <td class="p-2 whitespace-nowrap">
        <div class="text-left font-medium">{{$ethiomonth[$endindex]."/".$enddate[1]."/".$enddate[2]}}</div>
    </td>
    <td class="p-2 whitespace-nowrap">
        <div class="text-lg text-center">not defined</div>
    </td>
</tr>
@endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>



@php
    $histryarray = array();
@endphp

@foreach($datehistry as $datehis)
    @php
        $startdate = $datehis->start_date;
        $enddate = $datehis->end_date;

        $formattedStartDate = date('Y-m-d', strtotime(str_replace('-', '/', $startdate)));
        $formattedEndDate = date('Y-m-d', strtotime(str_replace('-', '/', $enddate)));

        $histryarray[] = '[new Date("' . $formattedStartDate . '"), new Date("' . $formattedEndDate . '")]';
    @endphp
@endforeach

<script> 
    var dateRanges = [ 
    @foreach ($histryarray as $dateRange)
        {!! $dateRange !!},
    @endforeach
];
histrycontroller

 
    function checkDates(event) { 
    var fromDate = document.getElementById("from").value;
var toDate = document.getElementById("to").value;
var datewarning = document.getElementById("datewarning");
var histrycontroller = document.getElementById("histrycontroller"); 
var histrybord = document.getElementById("histrybord"); 

// Split the date strings and rearrange the parts
var fromParts = fromDate.split("/");
var toParts = toDate.split("/");

var inputDate1 = new Date(fromParts[2], fromParts[1] - 1, fromParts[0]);
var inputDate2 = new Date(toParts[2], toParts[1] - 1, toParts[0]);

      console.log(inputDate1);
      console.log(inputDate2);
      var inRange = false; 
      for (var i = 0; i < dateRanges.length; i++) { 
        var rangeStart = dateRanges[i][0]; 
        var rangeEnd = dateRanges[i][1]; 
        console.log(rangeStart)
        console.log(rangeEnd)
        if ((inputDate1 >= rangeStart && inputDate1 <= rangeEnd) || (inputDate2 >= rangeStart && inputDate2 <= rangeEnd ) || (inputDate1 < rangeStart && inputDate2 > rangeEnd )) { 
          inRange = true; 
          break; 
        } 
      } 
      if (inRange) { 
        // alert("At least one input date is within range!"); 

        datewarning.classList.remove('hidden');
        histrycontroller.classList.remove('hidden');
        event.preventDefault();
        
        
      } else { 
        //alert("Both input dates are outside of range."); 
      } 
    } 

    function  historyControle(){
        histrybord.classList.remove('hidden');
    }
  </script>





<div class="hidden">
    <input class="st_date" value="" type="text">
    <input class="st_month" value="" type="text">
    <input class="st_year" value="" type="text">
</div>



</body>
    <script type="module" src="{{ asset('js/app.mjs') }}"></script>

    <script>
    
</html>
