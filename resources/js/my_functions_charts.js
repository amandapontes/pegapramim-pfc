$(document).ready(function(){
	 // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 3], 
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300};
 
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart2 = new google.visualization.BarChart(document.getElementById('chart_div2'));
        var chart3 = new google.visualization.LineChart(document.getElementById('chart_div3'));

        function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if (selectedItem) {
            var topping = data.getValue(selectedItem.row, 0);
            alert('The user selected ' + topping);
          }
        }

        google.visualization.events.addListener(chart, 'select', selectHandler);    
        chart.draw(data, options);
        chart2.draw(data, options);
        chart3.draw(data, options);
      }

  $('.datepicker').datepicker({
     startView: 0,
      todayBtn: true,
      clearBtn: true,
      language: "pt-BR",
      multidate: true,
      multidateSeparator: "/",
      calendarWeeks: true,
      autoclose: true,
      todayHighlight: true,
      beforeShowMonth: function (date){
                      switch (date.getMonth()){
                        case 8:
                          return false;
                      }
                  },
      toggleActive: true
  });

});