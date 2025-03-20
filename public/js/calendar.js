function date() {
  
  let date = document.getElementById("dateStart").value;

  let date2 = document.getElementById("dateEnd").value;

  console.log(date);
}

const today = new Date(); // Mai dátum
today.setDate(today.getDate() - 1);


const myDateRangePickerDisabledDates = document.getElementById('myDateRangePickerDisabledDates')
if (myDateRangePickerDisabledDates) {
    const optionsDateRangePickerDisabledDates = {
        disabledDates: [
            [new Date(2022, 2, 4), new Date(2022, 2, 7)],
            new Date(2022, 2, 16),
            new Date(2022, 3, 16),
        ],
        minDate: new Date(today)
    }

    new coreui.DateRangePicker(document.getElementById('myDateRangePickerDisabledDates'), optionsDateRangePickerDisabledDates)
}

date();

