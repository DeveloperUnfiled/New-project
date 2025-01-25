const selectCode= document.getElementById('selected-code');
const selectCounty= document.getElementById('county-select');

selectCounty.addEventListener('change', ()=>{
   const selectedValue= selectCounty.value;

   if (selectedValue) {
    selectCode.textContent = "Selected: " + selectedValue;
    } 
    else {
        selectCode.textContent = "Select County";
    }
});
