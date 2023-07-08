function changeTab(tabNum) {
  var tabId = "tab-" + tabNum;
  var tabElement = document.getElementById(tabId);

  if (tabElement.style.display === "block") {
    tabElement.style.display = "none";
  } else {
    tabElement.style.display = "block";
  }

  var tabToggles = document.getElementsByClassName("tab");
  for (let i = 0; i < tabToggles.length; i++) {
    let tabToggle = tabToggles[i];

    if (tabToggle.id === "tab-toggle-" + tabNum) {
      tabToggle.classList.toggle("active");
    } else {
      tabToggle.classList.remove("active");
    }
  }

  var lastTabNum = tabNum - 1;
  if (lastTabNum === 0) {
    lastTabNum = tabToggles.length;
  }
  var lastTabId = "tab-" + lastTabNum;
  var lastTabElement = document.getElementById(lastTabId);
  
  if (lastTabElement.style.display === "block") {
    lastTabElement.style.display = "none";
  }
}