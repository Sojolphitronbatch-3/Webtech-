// Create calculator container
const calculator = document.createElement("div");
calculator.className = "calculator";

// Create display input
const display = document.createElement("input");
display.type = "text";
display.id = "display";
display.disabled = true;
calculator.appendChild(display);

// Create buttons container
const buttonsContainer = document.createElement("div");
buttonsContainer.className = "buttons";
calculator.appendChild(buttonsContainer);

// Button layout
const buttons = [
    "C", "/", "*", "DEL",
    "7", "8", "9", "-",
    "4", "5", "6", "+",
    "1", "2", "3", "=",
    "0", "."
];

// Function to append buttons dynamically
buttons.forEach(text => {
    const button = document.createElement("button");
    button.textContent = text;
    button.onclick = () => handleButtonClick(text);
    buttonsContainer.appendChild(button);

    // Add class for styling the "0" button to span two columns
    if (text === "0") button.classList.add("zero");
});

// Append calculator to the body
document.body.appendChild(calculator);

// Button click handler function
function handleButtonClick(value) {
    if (value === "C") {
        display.value = "";
    } else if (value === "DEL") {
        display.value = display.value.slice(0, -1);
    } else if (value === "=") {
        try {
            display.value = eval(display.value);
        } catch {
            display.value = "Error";
        }
    } else {
        display.value += value;
    }
}
