const app = new Vue({
  el: "#app",
  data: {
    personalInfo: [],
    contactInfo: [],
    skills: []
  }
})



const worker_personalInfo = new Worker('assets/js/worker.getDatabaseInfo.js')
worker_personalInfo.addEventListener('message', function (e) {
  if (e.data.status !== 'success') return;
  // let arr = [];
  e.data.message.forEach(function (tableRow) {
    let row = {};
    Object.entries(tableRow).forEach(function (cell) {
      row[cell[0]] = cell[1];
      // console.log(cell[0] + ': ' + cell[1]);
    })
    // arr.push(row);
    app.personalInfo.push(row);
    // console.log(Object.entries(tableRow))
  })
  // app.personalInfo = arr;
  // console.log(app.personalInfo);
})
worker_personalInfo.postMessage({
  query: 'select * from personal_info'
})


const worker_contactInfo = new Worker('assets/js/worker.getDatabaseInfo.js')
worker_contactInfo.addEventListener('message',
  function (e) {
    if (e.data.status !== 'success') return;
    // let arr = [];
    e.data.message.forEach(function (tableRow) {
      let row = {};
      Object.entries(tableRow).forEach(function (cell) {
        row[cell[0]] = cell[1];
        // console.log(cell[0] + ': ' + cell[1]);
      })
      // arr.push(row);
      app.contactInfo.push(row);
      // console.log(Object.entries(tableRow))
    })
    // app.personalInfo = arr;
    // console.log(app.contactInfo);
  })
worker_contactInfo.postMessage({
  query: 'select * from contact_info'
})


const worker_skills = new Worker('assets/js/worker.getDatabaseInfo.js')
worker_skills.addEventListener('message',
  function (e) {
    if (e.data.status !== 'success') return;
    e.data.message.forEach(function (tableRow) {
      let row = {};
      Object.entries(tableRow).forEach(function (cell) {
        row[cell[0]] = cell[1];
      })
      app.skills.push(row);
    })
  })
worker_skills.postMessage({
  query: 'select * from skills'
})