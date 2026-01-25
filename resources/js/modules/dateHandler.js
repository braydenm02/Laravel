/**
 * dateHandler Module
 * Provides functions for date formatting and calculations.
 * @returns dateHandler
 */
export function getDateHandler() {
    dateHandler.init();
    return dateHandler;
}

/**
 * Date Handler Object
 */
const dateHandler = {
    init: function () {
        this.currentdate = new Date().toISOString().split('T')[0];
        this.day = this.currentdate.split('-')[2];
        this.month = this.currentdate.split('-')[1];
        this.year = this.currentdate.split('-')[0];
        this.monthName = this.monthNames[parseInt(this.month, 10) - 1];
        this.auditDate = new Date('2025-08-31');
    },
    formatDate: function (date) {
        const d = new Date(date);
        const month = '' + (d.getMonth() + 1);
        const day = '' + d.getDate();
        const year = d.getFullYear();
        return [year, month.padStart(2, '0'), day.padStart(2, '0')].join('-');
    },
    getWeekStartDate: function (date) {
        const d = new Date(date);
        const day = d.getDay(); // 0 (Sun) to 6 (Sat)
        const diff = d.getDate() - day + (day === 0 ? -6 : 1); // Adjust when day is Sunday
        return this.formatDate(new Date(d.setDate(diff)));
    },
    getMonthStartDate: function (date) {
        const d = new Date(date);
        return this.formatDate(new Date(d.getFullYear(), d.getMonth(), 1));
    },
    monthNames: [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ],
    currentdate: '', day: '', month: '', year: '', monthName: '', auditDate: ''
};