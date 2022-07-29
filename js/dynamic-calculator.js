const inputTable = document.getElementsByClassName("input-table")
const score = document.getElementById("score")
const extraPoints = document.getElementById("extra-points")

function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function calculate() {
    for (let i = 0; i < inputTable.length; i++) {
        inputTable[i].onchange = function () {
            let a = 0;
            let b = 0;
            for (let x = 0; x < inputTable.length; x++) {
                if (inputTable[x].value != -1) {
                    a = a + Number(inputTable[x].value)
                }
            }
            for (let y = 0; y < inputTable.length; y++) {
                if (inputTable[y].value != -1 && inputTable[y].className != "input-table unlisted") {
                    b = b + 1
                }

            }
            score.value = Math.round((a / b) + Number(extraPoints.value))
        }
    }
    await delay(200)
    calculate()
}

calculate();