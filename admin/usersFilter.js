function searchusersChart(label , dataa){
    var ctx = document.getElementById('usersChart').getContext('2d');
console.log(label);
console.log(dataa);
const labels = label;
const data = {
    labels: labels,
    datasets: [{
        label: 'How Many Sellss',
        data: dataa,
        fill: false,
        borderColor:   'rgba(245, 40, 145, 0.8)'
    }]
};

const config = {
    type: 'line',
    data: data,
};

// Create a new instance of the Chart class
var myChart = new Chart(ctx, config);
return myChart;


}




myChartInstance =  searchusersChart([],[]);


document.getElementById('userInput').addEventListener('keydown',function(event){
    if (event.keyCode === 13) {
        const data = this.value;
        $.ajax({
            url: 'phpGetData/getOneUser.php',  // Your PHP script
            type: 'GET',
            data: { data: data },  // Data to send to PHP
            success: function(response) {
                // Handle the response from PHP
                console.log(response);
        
                if (response != 0) {
                    var label = [];
                    var dataa = [];
      
        var phpData = JSON.parse(response);
        console.log(phpData.length);
        console.log("*****************"+phpData);

        if(phpData==data){
                   
            noReasultsDiv();
          
        }

                    for (var i = 0; i < phpData.length; i++) {

                        label[i] =phpData[i].ordate;
                        dataa[i] =phpData[i].total_orders;
                    }
        
                    console.log(label);
                    console.log(dataa);
                    destroyChart(myChartInstance);

                  
        
        
                    myChartInstance = searchusersChart(label, dataa);
                }
            },
            error: function(error) {
                // Handle errors
                console.error(error);
            }
        });
        
    }
})




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function AllusersChart(aLabel,dataa){
    var ctx = document.getElementById('AllusersChart').getContext('2d');
    const labels = aLabel;
const data = {
  labels: aLabel,
  datasets: [{
    label: 'How Many New Users',
    data:dataa,
    backgroundColor: [
     
      'rgba(255, 205, 86, 0.2)',
    
    ],
    borderColor: [
        'rgba(245, 40, 145, 0.8)'
    ,
    ],
    borderWidth: 1
  }]
};

const config = {
    type: 'line',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };
  var myChart = new Chart(ctx, config);
  return myChart;
  

}
var   myChartInstance_AllusersChart;

function writeAllusersChart(data,genre)
{$.ajax({
    url: 'phpGetData/getNewUsers.php',  // Your PHP script
    type: 'GET',
    data: { data: data,
    genre:genre },  // Data to send to PHP
    success: function(response) {
        // Handle the response from PHP
        console.log(response);

        if (response != 0) {
            var label = [];
            var dataa = [];

var phpData = JSON.parse(response);
console.log(phpData.length);
console.log(phpData);

            for (var i = 0; i < phpData.length; i++) {

                label[i] =phpData[i].SignUpDate;
                dataa[i] =phpData[i].how_many_users;
            }

            console.log(label);
            console.log(dataa);

            
destroyChart( myChartInstance_AllusersChart);

              myChartInstance_AllusersChart = AllusersChart(label, dataa);
        }
    },
    error: function(error) {
        // Handle errors
        console.error(error);
    }
});}
writeAllusersChart(7,"All Genres");

document.getElementById('AllusersChartSelectDate').addEventListener('change',function(){
    var genre = document.getElementById('AllusersChartSelectGenre').value;
    console.log("***** "+genre);
    writeAllusersChart(this.value,genre);

})

document.getElementById('AllusersChartSelectGenre').addEventListener('change',function(){
    var data = document.getElementById('AllusersChartSelectDate').value;
    console.log("***** "+data);
    writeAllusersChart( data,this.value);

})