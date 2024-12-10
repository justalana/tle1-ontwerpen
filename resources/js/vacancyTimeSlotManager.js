//Wait for the page to load before doing anything
window.addEventListener('load', init);

//Global variables
let timeSlotTemplate;
let timeSlotContainer;
let timeSlotIds = [];
let timeSlotCounter = 1;

function init() {

    //Get the template from the document and store the innerHTML for use later
    let timeSlotElement = document.getElementById('timeSlot0');
    timeSlotTemplate = timeSlotElement.innerHTML.repeat(1);

    //Delete the actual element to avoid form requirement problems should one not want to add any time slots
    timeSlotElement.outerHTML = '';

    //Get the time slot container
    timeSlotContainer = document.getElementById('timeSlotContainer');
    timeSlotContainer.addEventListener('click', removeTimeSlot);

    //Get the 'add time slot' button so we can add functionality to it
    let addTimeSlotButton = document.getElementById('addTimeSlot');
    addTimeSlotButton.addEventListener('click', addTimeSlot);

}

function addTimeSlot(e) {
    e.preventDefault();

    //Make sure you don't overwrite or use the existing template by copying it into a new variable
    //Insert the raw innerHTML string from the template into a proper element
    let article = document.createElement('article');
    article.innerHTML = timeSlotTemplate.repeat(1);

    article.classList.add('timeSlot');

    //Grab the current number from the counter and turn it into a string
    const id = timeSlotCounter.toString();

    //Save the id in global array
    timeSlotIds[id] = id;

    //Increment the counter for next time
    timeSlotCounter++;

    //Replace all the relevant ids, names, labels with the new id
    // article.id = article.id.replace(/\d/g, id);
    article.id = 'timeSlot' + id;

    //Finally, add the article to the document
    console.log(article.children)
    timeSlotContainer.appendChild(article);

}

function removeTimeSlot(e) {

    //Check if the clicked thing is the delete button before doing anything else
    if (!e.target.classList.contains('deleteTimeSlot')) {
        return;
    }

    //Preventing the default here or else it breaks the checkbox
    e.preventDefault();

    //Fancy regular expression
    //It just replaces everything in the string that isn't a digit with an empty string
    let timeSlotId = e.target.id.replace(/\D/g, '');

    //Get the correct timeslot
    let timeSlotArticle = document.getElementById(('timeSlot' + timeSlotId));

    //Delete it and remove the id from the global list
    timeSlotArticle.outerHTML = '';
    timeSlotIds[timeSlotId] = '';

}

