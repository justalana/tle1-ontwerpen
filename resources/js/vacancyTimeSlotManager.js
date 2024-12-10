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

    //Collect all the elements in a usable array
    let elements = [];

    //This will break if any of the divs gain or lose any children
    for (const child of article.children) {
        elements.push(child.children[0]);
        elements.push(child.children[1]);
    }

    //Replace all the relevant ids, names, labels with the new id
    article.id = 'timeSlot' + id;

    //Replace text in h3
    //Fancy regular expression
    //It just replaces all the numbers it can find (in this case only 0) in the string with the given id
    elements[0].innerHTML = elements[0].innerHTML.replace(/\d/g, id);

    //Change id of the delete button
    elements[1].id = elements[1].id.replace(/\d/g, id);

    //Change the 'for' in day label
    elements[2].htmlFor = elements[2].htmlFor.replace(/\d/g, id);

    //Change the name and id of day select
    elements[3].id = elements[3].id.replace(/\d/g, id);
    elements[3].name = elements[3].name.replace(/\d/g, id);

    //Change the 'for' in start time label
    elements[4].htmlFor = elements[4].htmlFor.replace(/\d/g, id);

    //Change the name and id of start time input
    elements[5].id = elements[5].id.replace(/\d/g, id);
    elements[5].name = elements[5].name.replace(/\d/g, id);

    //Change the 'for' in end time label
    elements[6].htmlFor = elements[6].htmlFor.replace(/\d/g, id);

    //Change the name and id of end time input
    elements[7].id = elements[7].id.replace(/\d/g, id);
    elements[7].name = elements[7].name.replace(/\d/g, id);

    //Change the 'for' in optional label
    elements[8].htmlFor = elements[8].htmlFor.replace(/\d/g, id);

    //Change the name and id of optional input
    elements[9].id = elements[9].id.replace(/\d/g, id);
    elements[9].name = elements[9].name.replace(/\d/g, id);

    //Finally, add the article to the document
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
    //Note that it's case-sensitive
    let timeSlotId = e.target.id.replace(/\D/g, '');

    //Get the correct timeslot
    let timeSlotArticle = document.getElementById(('timeSlot' + timeSlotId));

    //Delete it and remove the id from the global list
    timeSlotArticle.outerHTML = '';
    timeSlotIds[timeSlotId] = '';

}

