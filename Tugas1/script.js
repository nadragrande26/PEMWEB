let display = document.getElementById('display');
let currentExpression = '';
let lastInput = '';

function appendNumber(number) {
    if (lastInput === '=') {
        currentExpression = '';
        lastInput = '';
    }
    currentExpression += number;
    display.value = currentExpression;
}

function appendOperator(operator) {
    if (currentExpression !== '' && !isOperator(lastInput)) {
        currentExpression += operator === '^' ? '**' : operator;
        display.value = currentExpression;
        lastInput = operator;
    }
}

function isOperator(input) {
    return ['+', '-', '*', '/', '%', '**'].includes(input);
}

function calculateResult() {
    try {
        currentExpression = eval(currentExpression.replace(/\^/g, '**')).toString();
        display.value = currentExpression;
        lastInput = '=';
    } catch (error) {
        display.value = "Error";
        currentExpression = '';
    }
}

function clearDisplay() {
    currentExpression = '';
    display.value = '';
    lastInput = '';
}

function deleteLast() {
    if (currentExpression.length > 0 && lastInput !== '=') {
        currentExpression = currentExpression.slice(0, -1);
        display.value = currentExpression;
    }
}
