import DatePicker from "./datepicker.mjs";

const closeDatepickers = () => {
    activatedDatepickers.forEach((active) => {
        if (active.datepickerDiv.className.indexOf("u-div-show") > -1)
            active.datepickerDiv.classList.remove("u-div-show");
    });
};

const datepickerInputs = [];
const datepickerInputElements =
    document.getElementsByClassName("datepicker-input");



for (let i = 0; i < datepickerInputElements.length; i++) {
    datepickerInputs.push(datepickerInputElements[i]);
}

const activatedDatepickers = [];

datepickerInputs.forEach((datepickerInput) => {
    const ID = datepickerInput.getAttribute("id");

    datepickerInput.addEventListener("focus", () => {
        const updatestartdate = document.querySelector(".updatenput");
        const updateenddate = document.querySelector(".updateenddate");
        updatestartdate.value='';
        updateenddate.value = '';
        closeDatepickers();
        const active = activatedDatepickers.find(
            (activated) => activated.uid === ID
        );

        if (!active) {
            const datepicker = new DatePicker({
                id: ID,
                startDate: 3,
                monthlength: 30,
            });

            activatedDatepickers.push(datepicker);
            datepicker.addHTML();

            datepicker.datepickerDiv.addEventListener("click", (event) => {
                event.stopPropagation();
            });
        } else {
            active.datepickerDiv.classList.add("u-div-show");
        }
    });

    datepickerInput.addEventListener("click", (event) => {
        event.stopPropagation();
    });
});
