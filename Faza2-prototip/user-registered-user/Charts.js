/*
    Mia Vucinic
*/

CALORIES_CONSUMED_COLOR = "#b9e769";
WATER_COLOR = "#07beb8";
TRAINING_COLOR = "#fe6d73";


function generateNRandomNumbersInRange(n, min, max) {
    array = [];
    for (let i = 0; i < n; i++) {
        array.push(Math.floor(Math.random() * (max - min + 1)) + min);
    }
    return array;
}

const todaysDate = new Date();
let month = todaysDate.getMonth();
daysInMonth = 30;

switch (month) {
    case 0:
        daysInMonth = 31;
        break;
    case 1:
        if ((todaysDate.getYear() % 4 == 0) && (todaysDate.getYear() % 100 != 0 || todaysDate.getYear() % 400 == 0)) {
            daysInMonth = 29;
        }
        else {
            daysInMonth = 28;
        }
        break;
    case 2:
        daysInMonth = 31;
        break;
    case 4:
        daysInMonth = 31;
        break;
    case 6:
        daysInMonth = 31;
        break;
    case 7:
        daysInMonth = 31;
        break;
    case 9:
        daysInMonth = 31;
        break;
    case 11:
        daysInMonth = 31;
        break;
}

array = [];
for (let i = 1; i < daysInMonth; i++) {
    array.push(i);
}

const labelsMonths = [
    'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
];

const labelsWeek = [
    'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
];

const labelsDaysInMonth = array;

myChart0 = null;
myChart1 = null;
myChart2 = null;


function caloriesConsumedData() {
    dataWeek = {
        labels: labelsWeek,
        datasets: [{
            label: 'Week',
            backgroundColor: CALORIES_CONSUMED_COLOR,
            borderColor: CALORIES_CONSUMED_COLOR,
            data: generateNRandomNumbersInRange(7, 0, 10), // INSERT DATA
        }]
    };

    dataMonth = {
        labels: labelsDaysInMonth,
        datasets: [{
            label: 'Month',
            backgroundColor: CALORIES_CONSUMED_COLOR,
            borderColor: CALORIES_CONSUMED_COLOR,
            data: generateNRandomNumbersInRange(daysInMonth, 0, 10), // INSERT DATA
        }]
    };

    dataYear = {
        labels: labelsMonths,
        datasets: [{
            label: 'Year',
            backgroundColor: CALORIES_CONSUMED_COLOR,
            borderColor: CALORIES_CONSUMED_COLOR,
            data: generateNRandomNumbersInRange(12, 0, 10), // INSERT DATA
        }]
    };

    configWeek = {
        type: 'line',
        data: dataWeek,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    configMonth = {
        type: 'line',
        data: dataMonth,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    configYear = {
        type: 'line',
        data: dataYear,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    if (myChart0 != null)
        myChart0.destroy();
    myChart0 = new Chart(
        document.getElementById('myChart0'),
        configWeek
    );

    if (myChart1 != null)
        myChart1.destroy();
    myChart1 = new Chart(
        document.getElementById('myChart1'),
        configMonth
    );

    if (myChart2 != null)
        myChart2.destroy();
    myChart2 = new Chart(
        document.getElementById('myChart2'),
        configYear
    );


}

function waterData() {
    dataWeek = {
        labels: labelsWeek,
        datasets: [{
            label: 'Week',
            backgroundColor: WATER_COLOR,
            borderColor: WATER_COLOR,
            data: generateNRandomNumbersInRange(7, 0, 10), // INSERT DATA
        }]
    };

    dataMonth = {
        labels: labelsDaysInMonth,
        datasets: [{
            label: 'Month',
            backgroundColor: WATER_COLOR,
            borderColor: WATER_COLOR,
            data: generateNRandomNumbersInRange(daysInMonth, 0, 10), // INSERT DATA
        }]
    };

    dataYear = {
        labels: labelsMonths,
        datasets: [{
            label: 'Year',
            backgroundColor: WATER_COLOR,
            borderColor: WATER_COLOR,
            data: generateNRandomNumbersInRange(12, 0, 10), // INSERT DATA
        }]
    };

    configWeek = {
        type: 'line',
        data: dataWeek,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    configMonth = {
        type: 'line',
        data: dataMonth,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    configYear = {
        type: 'line',
        data: dataYear,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    if (myChart0 != null)
        myChart0.destroy();
    myChart0 = new Chart(
        document.getElementById('myChart0'),
        configWeek
    );

    if (myChart1 != null)
        myChart1.destroy();
    myChart1 = new Chart(
        document.getElementById('myChart1'),
        configMonth
    );

    if (myChart2 != null)
        myChart2.destroy();
    myChart2 = new Chart(
        document.getElementById('myChart2'),
        configYear
    );


}

function trainingData() {
    dataWeek = {
        labels: labelsWeek,
        datasets: [{
            label: 'Week',
            backgroundColor: TRAINING_COLOR,
            borderColor: TRAINING_COLOR,
            data: generateNRandomNumbersInRange(7, 0, 10), // INSERT DATA
        }]
    };

    dataMonth = {
        labels: labelsDaysInMonth,
        datasets: [{
            label: 'Month',
            backgroundColor: TRAINING_COLOR,
            borderColor: TRAINING_COLOR,
            data: generateNRandomNumbersInRange(daysInMonth, 0, 10), // INSERT DATA
        }]
    };

    dataYear = {
        labels: labelsMonths,
        datasets: [{
            label: 'Year',
            backgroundColor: TRAINING_COLOR,
            borderColor: TRAINING_COLOR,
            data: generateNRandomNumbersInRange(12, 0, 10), // INSERT DATA
        }]
    };

    configWeek = {
        type: 'line',
        data: dataWeek,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    configMonth = {
        type: 'line',
        data: dataMonth,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    configYear = {
        type: 'line',
        data: dataYear,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    if (myChart0 != null)
        myChart0.destroy();
    myChart0 = new Chart(
        document.getElementById('myChart0'),
        configWeek
    );

    if (myChart1 != null)
        myChart1.destroy();
    myChart1 = new Chart(
        document.getElementById('myChart1'),
        configMonth
    );

    if (myChart2 != null)
        myChart2.destroy();
    myChart2 = new Chart(
        document.getElementById('myChart2'),
        configYear
    );


}
