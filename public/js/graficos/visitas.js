const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
let data_visits = [];
let visits = [];
let month = [];
let visit_month = []; 

fetch('http://127.0.0.1:8000/api/visits',{
  method: "GET",
  headers: {
    "Content-Type": "application/json"
  }
}).then(res=>{
  return res.json().then(data=>{
    data_visits =  data.data.items;

    for(let x = 0; x < data_visits.length; x++){
      visits[x] = data_visits[x].visit;
      month[x] = data_visits[x].month - 1;
      visit_month[x] = meses[month[x]];
    }

    return visits, visit_month;

  })
})

setTimeout(()=>{

  const labels = [
    'Enero',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];
  
  const data = {
    labels: visit_month,
    datasets: [{
    label: 'Visitas',
    backgroundColor: 'rgb(0, 255, 59)',
    borderColor: 'rgb(0, 255, 59)',
    data: visits,
    }]
  };
  
  const config = {
    type: 'line',
    data: data,
    options: {}
  };
  
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
},400)