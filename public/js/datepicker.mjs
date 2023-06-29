class DatePicker {
    constructor(obj) {
        this.uid = obj.id;
        // this.startdate = obj.startDate;
        // this.monthlength = obj.monthlength
        this.inputElement = document.getElementById(this.uid);
    }

    addHTML() {
        const html = `
<div class="datepicker u-div-show text-sm tracking-tighter font-light" id="datepicker-${this.uid}">
            <div class="datepicker-calendar">
                <div class="datepicker-calendar--header">
                    <div class="datepicker-calendar--header__dates">
                        <button class="month-change go-to-previous-month"></button>
                            <span class="datepicker-calendar--header__dates year-and-month">
                                <span class="pick-year">
                                    <select class="pick-year-select">
                                        <option selected class"years" value="2015">2015</option>
                                        <option class"years" value="2016">2016</option>
                                        <option class"years" value="2017">2017</option>
                                        <option class"years" value="2018">2018</option>
                                    </select>
                                </span>
                                <span class="pick-month">
                                    <select class="pick-month-select">
                                        <option selected value="0">መስከረም</option>
                                        <option value="1">ጥቅምት</option>
                                        <option value="2">ኅዳር</option>
                                        <option value="3">ታኅሳስ</option>
                                        <option value="4">ጥር</option>
                                        <option value="5">የካቲት</option>
                                        <option value="6">መጋቢት</option>
                                        <option value="7">ሚያዝያ</option>
                                        <option value="8">ግንቦት</option>
                                        <option value="9">ሰኔ</option>
                                        <option value="10">ሐምሌ</option>
                                        <option value="11">ነሐሴ</option>
                                        <option value="12">ጷጉሜን</option>
                                    </select>
                                </span>
                            </span>
                        <button class="month-change go-to-next-month">></button>
                    </div>
                    <div class="datepicker-calendar--header__days-row">
                        <div class="day-unit">ሰኞ</div>
                        <div class="day-unit">ማክሰኞ</div>
                        <div class="day-unit">ረቡዕ</div>
                        <div class="day-unit">ሀሙስ</div>
                        <div class="day-unit">አርብ</div>
                        <div class="day-unit">ቅዳሜ</div>
                        <div class="day-unit">እሁድ</div>
                    </div>
                </div>
                <div class="datepicker-calendar--body">
                     
                </div>
            </div>
        </div>
        `;


       

        this.inputElement.parentElement.insertAdjacentHTML("beforeend", html);

        this.datepickerDiv = document.getElementById(`datepicker-${this.uid}`);

        

        clanderbodyrender();


         const calendarContainer = document.querySelector(".datepicker");
         document.addEventListener("click", (event) => {
             const isClickedInsideCalendar = calendarContainer.contains(
                 event.target
             );
             if (!isClickedInsideCalendar) {
                 console.log("Clicked outside of the calendar");
                 if (
                     calendarContainer.className.indexOf(
                         "u-div-show"
                     ) > -1
                 )
                     calendarContainer.classList.remove(
                         "u-div-show"
                     );
             }
         });



        var selectedyearelement = document.querySelector(".pick-year-select");
        var eventselectedmonthelement = document.querySelector(".pick-month-select");


        var gotopriviousmonth = document.querySelector(".go-to-previous-month");
        var gotonextmonth = document.querySelector(".go-to-next-month");

       
        selectedyearelement.addEventListener("change", function () {
            const selectedyear = selectedyearelement.value;
            const selectedmonth = eventselectedmonthelement.value;

            // console.log(selectedmonth,selectedyear);
            clanderbodyrender(selectedyear, selectedmonth);
        });

        eventselectedmonthelement.addEventListener("change", function () {
            const selectedmonth = eventselectedmonthelement.value;
            const selectedyear = selectedyearelement.value;

            // console.log(selectedmonth,selectedyear);
            clanderbodyrender(selectedyear, selectedmonth);
        });

        gotopriviousmonth.addEventListener("click", function () {
            const selectedmonth = parseInt(eventselectedmonthelement.value) - 1;
            const selectedyear = selectedyearelement.value;

            // console.log(selectedmonth,selectedyear);
            clanderbodyrender(selectedyear, selectedmonth);

            console.log("clicked");
        });

        gotonextmonth.addEventListener("click", function () {
            const selectedmonth = parseInt(eventselectedmonthelement.value) + 1;
            const selectedyear = selectedyearelement.value;

            // console.log(selectedmonth,selectedyear);
            clanderbodyrender(selectedyear, selectedmonth);
        });

        function clanderbodyrender(selectedyear, selectedmonth) {
            var selectedyearelement =
                document.querySelector(".pick-year-select");
            var getselectedyearvalue = selectedyearelement.value;

            var selectedmonthelement =
                document.querySelector(".pick-month-select");
            var getselectedmonthvalue = selectedmonthelement.value;

            let startdate = 0;
            var monthlength = 30;
            if (parseInt(getselectedmonthvalue) === 12) {
                monthlength = 5;

                if (parseInt(getselectedyearvalue) === 2016) {
                    monthlength = 6;
                }
                console.log(monthlength);
            }

            let selectedyearvalue;

            if (selectedyear) {
                selectedyearvalue = parseInt(selectedyear);

                changeyear(
                    selectedyearvalue,
                    startdate,
                    getselectedmonthvalue,
                    monthlength,
                    selectedmonth
                );
                console.log(selectedyearvalue);
            } else {
                selectedyearvalue = parseInt(getselectedyearvalue);

                changeyear(
                    selectedyearvalue,
                    startdate,
                    getselectedmonthvalue,
                    monthlength,
                    selectedmonth
                );
            }
        }


        

        function adddate(startdate, monthlength) {
            startdate = startdate - 1;
            var calendarBody = document.querySelector(
                ".datepicker-calendar--body"
            );
            calendarBody.innerHTML = "";
            


            let startDate = null;
            let endDate = null;
            let counter = 0;

            calendarBody.addEventListener("click", (event) => {
                if (event.target.classList.contains("day1")) {
                    const selectedyearelement =
                        document.querySelector(".pick-year-select");
                    const eventselectedmonthelement =
                        document.querySelector(".pick-month-select");
                    const updatestartdate =
                        document.querySelector(".updatenput");
                    const updateenddate =
                        document.querySelector(".updateenddate");
                    const stdate = document.querySelector(".st_date");
                    const stmonth = document.querySelector(".st_month")
                    const styear = document.querySelector(".st_year")
                    const selectedmonth = parseInt(eventselectedmonthelement.value)+1;
                     let differentdate =document.querySelector(".date_difference" );

                    const selectedyear = selectedyearelement.value;
                    const selectedday = event.target.textContent;
                    let startdates = [];
                    let enddates = [];

                    
                
                    if (updatestartdate.value === "" && updateenddate.value === '') {
                        updatestartdate.value =
                            selectedday +
                            "/" +
                            selectedmonth +
                            "/" +
                            selectedyear;

                        stdate.value = selectedday;
                        stmonth.value = selectedmonth;
                        styear.value = selectedyear;

                        console.log(updatestartdate.value);
                        console.log(updateenddate.value);
                    } else {
                        console.log(updateenddate.value);
                        updateenddate.value =
                            selectedday +
                            "/" +
                            selectedmonth +
                            "/" +
                            selectedyear;

                        let yeardifference =
                            parseInt(styear.value) - parseInt(selectedyear);
                        let monthdifference = 0;
                        let daydeference = 0;
                        if (yeardifference <= 1) {
                            monthdifference =
                                parseInt(selectedmonth) -
                                parseInt(stmonth.value);

                            if (yeardifference === 0) {
                                monthdifference = monthdifference * 30;

                                daydeference =
                                    monthdifference +
                                    parseInt(selectedday) -
                                    parseInt(stdate.value);

                                differentdate.value = daydeference;

                                console.log(daydeference);
                            } else {
                                monthdifference = monthdifference + 12;
                                monthdifference = monthdifference * 30;

                                if (selectedyear !== 2016) {
                                    daydeference =
                                        monthdifference +
                                        parseInt(selectedday) -
                                        parseInt(stdate.value) +
                                        5;
                                    differentdate.value = daydeference;

                                    console.log(daydeference);
                                } else {
                                    daydeference =
                                        monthdifference +
                                        parseInt(selectedday) -
                                        parseInt(stdate.value) +
                                        6;
                                    differentdate.value = daydeference;

                                    console.log(daydeference);
                                }
                            }

                            console.log(
                                parseInt(selectedmonth) -
                                    parseInt(stmonth.value)
                            );
                        }
                    }
                    

                    if (enddates.length>0) {
                        console.log(enddates);
                        console.log(startdates);
                    }
                    
                   
                
                }
            });



            


            var totalDays = 42;

            var currentRow;
            for (var i = 0; i < totalDays; i++) {
                if (i % 7 === 0) {
                    currentRow = document.createElement("div");
                    currentRow.className =
                        "datepicker-calendar--body__days-row";
                    calendarBody.appendChild(currentRow);
                }

                if (i < startdate) {
                    var day = document.createElement("div");
                    day.id = "day" + i;
                    day.className = "day-units  datings";

                    var link = document.createElement("a");
                    link.href = "#";
                    link.className = "day1";

                    link.textContent = "";

                    day.appendChild(link);
                    currentRow.appendChild(day);
                } else {
                    var day = document.createElement("div");
                    day.id = "day" + i;
                    day.className = "day-units  datings";

                    var link = document.createElement("a");
                    
                    link.className = "day1";

                    link.textContent = (i + 1 - startdate).toString();

                    if (link.textContent > monthlength) {
                        link.textContent = "";
                    }

                    day.appendChild(link);
                    currentRow.appendChild(day);
                }
            }
        }

        function changeyear(
            selectedyearvalue,
            startdate,
            getselectedmonthvalue,
            monthlength,
            selectedmonth
        ) {
            if (selectedmonth) {
                getselectedmonthvalue = selectedmonth;
            }

            if (selectedyearvalue === 2015) {
                const yearmeskeremstartday = 7;
                startdate = getselectedmonthvalue * 2 + yearmeskeremstartday;
                //console.log(startdate)
                yeardatechange(startdate, monthlength);
            }
            if (selectedyearvalue === 2016) {
                const yearmeskeremstartday = 2;
                startdate = getselectedmonthvalue * 2 + yearmeskeremstartday;
                //console.log(startdate)
                yeardatechange(startdate, monthlength);
            }
            if (selectedyearvalue === 2017) {
                const yearmeskeremstartday = 3;
                startdate = getselectedmonthvalue * 2 + yearmeskeremstartday;
                //console.log(startdate)
                yeardatechange(startdate, monthlength);
            }
        }

        function yeardatechange(startdate, monthlength) {
            if (startdate > 28) {
                startdate = startdate - 28;
                console.log(startdate);
                adddate(startdate, monthlength);
            }

            if (startdate > 21) {
                startdate = startdate - 21;
                console.log(startdate);
                adddate(startdate, monthlength);
            } else if (startdate > 14) {
                startdate = startdate - 14;
                adddate(startdate, monthlength);
                console.log(startdate);
            } else if (startdate > 7) {
                startdate = startdate - 7;
                adddate(startdate, monthlength);
                console.log(startdate);
            } else {
                startdate = startdate;
                adddate(startdate, monthlength);
                //console.log(startdate)
            }
        }


        

    }
}

export default DatePicker;
