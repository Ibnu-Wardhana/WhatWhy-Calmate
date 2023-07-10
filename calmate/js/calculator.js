const calories = document.querySelector(".calculator .result .calories");
const calculateBtn = document.querySelector(".calculator .result .calculate-button");
const age = document.querySelector(".calculator form #age");
const height = document.querySelector(".calculator form #height");
const weight = document.querySelector(".calculator form #weight");

const calculateBMR = (weight, height, age, gender) => {
  if (gender == "male") {
    return 10 * weight + 6.25 * height - 5 * age + 5;
  }
  return 10 * weight + 6.25 * height - 5 * age - 161;
};

calculateBtn.addEventListener("click", () => {
  let genderValue = document.querySelector(".calculator form input[name='gender']:checked").value;
  let BMR = calculateBMR(weight.value, height.value, age.value, genderValue);
  calories.innerHTML = BMR.toLocaleString("en-US");
});
