$.datepicker.setDefaults( $.datepicker.regional[ "th" ] );
var currentDate = new Date();

currentDate.setYear(currentDate.getFullYear() + 543);
  // Birth date
  $("#date-of-birth").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: '+443:+543',
    dateFormat: 'dd/mm/yy',
    onSelect: function(date) {
      $("#edit-date-of-birth").addClass('filled');
    }
  });
$('#date-of-birth').datepicker("setDate",currentDate );