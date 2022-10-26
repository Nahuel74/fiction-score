const inputTable = document.getElementsByClassName("input-table")
const score = document.getElementById("score")
const extraPoints = document.getElementById("extra-points")

function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function calculate() {
    for (let i = 0; i < inputTable.length; i++) { //check all the columns
        inputTable[i].oninput = function () {
            if (inputTable[i].value > 10) {
                inputTable[i].value = 10;
            }
            if (inputTable[i].value < -1 && inputTable[i].id != "extra-points") {
                inputTable[i].value = -1;
            }
            if (inputTable[i].value < -10) {
                inputTable[i].value = -10;
            }

            let a = 0;
            let b = 0;
            for (let x = 0; x < inputTable.length; x++) {
                if (inputTable[x].value != -1) { //numerator
                    a = a + Number(inputTable[x].value)
                }
            }
            for (let y = 0; y < inputTable.length; y++) {
                if (inputTable[y].value != -1 && inputTable[y].className != "input-table unlisted") { //denominator
                    b = b + 1
                }

            }
            score.value = Math.round((a / b) + Number(extraPoints.value))
            if (score.value > 10) {
                score.value = 10
            }
            else if (score.value < 0) {
                score.value = 0
            }
        }
    }
    await delay(200)
    calculate()
}

calculate();