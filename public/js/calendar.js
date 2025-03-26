document.addEventListener('DOMContentLoaded', () => {
    const pickerElement = document.getElementById('myDateRangePickerDisabledDates');
    
    if (pickerElement) {
        //A Laravel által átadott foglalt dátumok
        const bookedDates = window.bookedDates || [];

        //A foglalt dátumok JavaScript Date formátumba konvertálása
        const disabledDates = bookedDates.map(dateStr => {
            const dateParts = dateStr.split('-'); //YYYY-MM-DD formátum
            return new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
        });

        const today = new Date(); //Mai dátum
        today.setDate(today.getDate() - 1); //Tegnapi dátum minimumként

        const optionsDateRangePickerDisabledDates = {
            disabledDates: disabledDates, //Foglalt dátumok beállítása
            minDate: today,
            format: 'yyyy-mm-dd',
            locale: 'hu',
            autoApply: true,
            linkedCalendars: false
        }

        new coreui.DateRangePicker(pickerElement, optionsDateRangePickerDisabledDates);
    }
});