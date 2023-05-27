const smallBreeds = ["No breed", "Chihuahua", "Tekel", "Beagle", "Bichon Frise", "Border Terrier", "Corgi", "Dachshund", "French Bulldog", "Pug", "Russell Terrier", "Other"]
const mediumBreeds = ["No breed", "Akita", "Australian Shepherd", "Border Collie", "Boxer", "Bulldog", "German Shepherd", "Golden Retriever", "Other"]
const largeBreeds = ["No breed", "Alaskan Malamute", "Great Dane", "Mastiff", "Newfoundland", "Saint Bernard", "Other"]
function validatePassword(inputText, formName) {
  console.log(inputText.value);
  var regex = /(?=.*[!@#$%^&*])(?=.*[a-zA-Z0-9])/
  if (!inputText.value.match(regex)) {
    alert("Password must contain at least a special character eg. !@#$");
    inputText.style.outline = "0.4vh solid rgba(255, 0, 0, 0.5)";
  }
  else {
    formName.onsubmit = ""
    inputText.style.borderColor = "transparent"
  }
}

function validateConfirmPassword(inputText, confirmInputText, formName) {
  console.log(inputText.value);
  console.log(confirmInputText.value);
  var regex = /(?=.*[!@#$%^&*])(?=.*[a-zA-Z0-9])/
  if (!inputText.value.match(regex)) {
    alert("Password must contain at least a special character eg. !@#$");
    inputText.style.outline = "0.4vh solid rgba(255, 0, 0, 0.5)";
    confirmInputText.style.outline = "0.4vh solid rgba(255, 0, 0, 0.5)";
  }
  else if (inputText.value !== confirmInputText.value) {
    alert("Password and confirm password are not the same!");
    inputText.style.outline = "0.4vh solid rgba(255, 0, 0, 0.5)";
    confirmInputText.style.outline = "0.4vh solid rgba(255, 0, 0, 0.5)";
  }
  else {
    formName.onsubmit = ""
  }
}

function dynamicDropdown(input) {
  console.log(input.options[input.selectedIndex].text);
  let breeds = document.getElementById("breedDropDown");
  if (input.options[input.selectedIndex].text === "Small") {
    breeds.disabled = false;
    breeds.innerHTML = "";
    for (const breed in smallBreeds) {
      var option = document.createElement("option");
      option.text = smallBreeds[breed];
      option.value = smallBreeds[breed];
      breeds.add(option);
    }
  }
  else if (input.options[input.selectedIndex].text === "Medium") {
    breeds.disabled = false;
    breeds.innerHTML = "";
    for (const breed in mediumBreeds) {
      var option = document.createElement("option");
      option.text = mediumBreeds[breed];
      option.value = mediumBreeds[breed];
      breeds.add(option);
    }
  }
  else if (input.options[input.selectedIndex].text === "Large") {
    breeds.disabled = false;
    breeds.innerHTML = "";
    for (const breed in largeBreeds) {
      var option = document.createElement("option");
      option.text = largeBreeds[breed];
      option.value = largeBreeds[breed];
      breeds.add(option);
    }
  }
}

function addPictures() {
  var div = document.createElement('div');

  var anchor1 = document.createElement('a');
  anchor1.href = 'https://images.squarespace-cdn.com/content/v1/54397f53e4b0454b94ceed0b/1584031251596-YO308YS7BSALOWSTUV8K/Marin+Humane-+Non-Profit-Animal+Shelter-Branding-San+Francisco-Creative+Agency-Good+Stuff+Partners';
  anchor1.className = "imgAnchor";
  var element = document.createElement("img");
  element.className = "picture"
  element.setAttribute("src", "https://images.squarespace-cdn.com/content/v1/54397f53e4b0454b94ceed0b/1584031251596-YO308YS7BSALOWSTUV8K/Marin+Humane-+Non-Profit-Animal+Shelter-Branding-San+Francisco-Creative+Agency-Good+Stuff+Partners");
  anchor1.appendChild(element);

  var anchor2 = document.createElement('a');
  anchor2.href = 'https://www.volunteerforever.com/wp-content/uploads/2019/06/Dog-Rescue-Shelter-Header.jpg';
  anchor2.className = "imgAnchor";
  var element = document.createElement("img");
  element.className = "picture"
  element.setAttribute("src", "https://www.volunteerforever.com/wp-content/uploads/2019/06/Dog-Rescue-Shelter-Header.jpg");
  anchor2.appendChild(element);

  let pics = document.getElementById("picsList");
  var li1 = document.createElement("li");
  var li2 = document.createElement("li");

  li1.appendChild(anchor1);
  li1.className = "picturePopUp"
  li2.appendChild(anchor2);
  li2.className = "picturePopUp"
  div.appendChild(li1);
  div.appendChild(li2);

  pics.appendChild(div);
  div.className = "picsDiv"
  document.getElementById("viewMore").disabled = true;
}

function deleteButton(){
  console.log("CLICK")
}