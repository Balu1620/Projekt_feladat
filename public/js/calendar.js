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

const myEndDateRangePicker = document.getElementById('myDateRangePickerDisabledDates')
myEndDateRangePicker.addEventListener('endDateChange.coreui.date-range-picker', date => {
  console.log(date.date);
  
})

const myStartDateRangePicker = document.getElementById('myDateRangePickerDisabledDates')
myStartDateRangePicker.addEventListener('startDateChange.coreui.date-range-picker', date => {
  console.log(date.date);
  
})