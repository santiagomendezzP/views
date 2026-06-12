array =[]

var labels = [];
var backgrounds = [];
  // 'Pendiente',
  // 'Aprobados',
  // 'Con inconveniente',
$( document ).ready(function() {
    $.ajax({
      method:"POST",
    url: "./ajax/datos_grafica.php",
    data: {grafica:1}
  }).done(function(datas) {
      let data = JSON.parse(datas);
      data = data[0];
      for (let i = 0; i < data.length; i++) {
         if(data[i][0] == 0 || data[i][0] == 2  ){
           labels.push("Pendiente");
           array.push(data[i][1]);
           backgrounds.push('rgb(255, 243, 13)');
          }else if(data[i][0] == 3 ){
           labels.push("Aprobados");
           array.push(data[i][1]); 
           backgrounds.push('rgb(40, 167, 69)');
          }else{
            labels.push("Con inconveniente");
            array.push(data[i][1]);
            backgrounds.push('rgb(255, 0, 0)');
         }
      }
        data_servicios()
        config_servicios() 
        abrir_servicios()
      
  });

  //grafica 2 TENNDENCIAS
    $.ajax({
      method:"POST",
    url: "./ajax/datos_grafica.php",
    data: {tendencias:1}
  }).done(function(datas) {
      let data = JSON.parse(datas);
      data = data[0];
      for (let i = 0; i < data.length; i++) {
         if(data[i][0] == 0 || data[i][0] == 2  ){
           labels.push("Pendiente");
           array.push(data[i][1]);
           backgrounds.push('rgb(255, 243, 13)');
          }else if(data[i][0] == 3 ){
           labels.push("Aprobados");
           array.push(data[i][1]); 
           backgrounds.push('rgb(40, 167, 69)');
          }else{
            labels.push("Con inconveniente");
            array.push(data[i][1]);
            backgrounds.push('rgb(255, 0, 0)');
         }
      }
        // data_servicios()
        // config_servicios() 
        // abrir_servicios()
      
  });
});

function data_servicios(){
  
  data = {
    labels: labels,
        datasets: [
          {
            label : 'Data',
            backgroundColor:backgrounds, 
            data: array,
          },
        
        ]
            
    };
}   

function config_servicios(){
   config = {
      type: 'pie',
      data: data,
  };
}   

function abrir_servicios(){
   const myCharts = new Chart(
       document.getElementById('chart'),
       config
       );   
}


function dataTendencias(){
   data = {
    labels: generateLabels(),
    datasets: [
      {
        label: 'Dataset',
        data: generateData(),
        borderColor: Utils.CHART_COLORS.red,
        backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red),
        fill: false
      }
    ]
  };
}
function configTendencias(){
   config = {
    type: 'line',
    data: data,
    options: {
      plugins: {
        filler: {
          propagate: false,
        },
        title: {
          display: true,
          text: (ctx) => 'Fill: ' + ctx.chart.data.datasets[0].fill
        }
      },
      interaction: {
        intersect: false,
      }
    },
  };
}
function abrirTendencias(){
  const myCharts = new Chart(
      document.getElementById('chart_2'),
      config
      );   
}