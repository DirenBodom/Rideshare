var counter = 1;
var jsonobjects = [];

window.onload = initialize();
function initialize () {
    // Create the JSON object for the initial entry.
    var entry = {
        "entryNum": 0, "destinationtime": null, "availabletime": null,
        "departurelocation": null,
        "addStrt" : null, "city" : null,    // Address
        "state": null, "zip": null,
        "mon": null, "tues": null, "wed": null, "thurs": null, "fri": null, "sat":null, "sun":null
    };
    // Add to the JSON objects list.
    jsonobjects.push(entry);
}
// Prints all the JSON objects
function printJSON() {
    var i;
    for (i = 0; i < jsonobjects.length; i++) {
        console.log('Entry id: ' + jsonobjects[i].entryNum);
        console.log('Destination time: ' + jsonobjects[i].destinationtime);
        console.log('Available time: ' + jsonobjects[i].availabletime);
        console.log('Departing from: ' + jsonobjects[i].departurelocation);

        if (jsonobjects[i].departurelocation === 'other') {
            console.log('The desired address is: ' + jsonobjects[i].addStrt + ', ' +
                jsonobjects[i].city + ', ' + 
                jsonobjects[i].state + ' ' +
                jsonobjects[i].zip);
        }
        console.log('Monday is: ' + jsonobjects[i].mon);
        console.log('Tuesday is: ' + jsonobjects[i].tues);
        console.log('Wednesday is: ' + jsonobjects[i].wed);
        console.log('Thursday is: ' + jsonobjects[i].thurs);
        console.log('Friday is: ' + jsonobjects[i].fri);
        console.log('Saturday is: ' + jsonobjects[i].sat);
        console.log('Sunday is: ' + jsonobjects[i].sun);

        console.log('\n\n');
    }
}
function addEntry(id) {
    //printJSON();
    var formArray = document.forms["form" + id];
    //console.log('From the form itself');
    //console.log('Form id: ' + id);
    //console.log('Destination time: ' + formArray["destinationtime"].value);
    //console.log('Available time: ' + formArray["availabletime"].value);

    // Enter the user input to its corresponding JSON object
    jsonobjects[id].destinationtime = formArray["destinationtime"].value;
    jsonobjects[id].availabletime = formArray["availabletime"].value;
    jsonobjects[id].departurelocation = formArray["departurelocation"].value;

    // If the departure location is set to home, leave the other address as is.
    // Otherwise set them to the user input.
    if (jsonobjects[id].departurelocation === 'other') {
        jsonobjects[id].addStrt = formArray["addStrt"].value;
        jsonobjects[id].city = formArray["city"].value;
        jsonobjects[id].state = formArray["state"].value;
        jsonobjects[id].zip = formArray["zip"].value;
    }

    // Get which days this event will recurr.
    jsonobjects[id].mon = formArray["mon"].checked;
    jsonobjects[id].tues = formArray["tues"].checked;
    jsonobjects[id].wed = formArray["wed"].checked;
    jsonobjects[id].thurs = formArray["thurs"].checked;
    jsonobjects[id].fri = formArray["fri"].checked;
    jsonobjects[id].sat = formArray["sat"].checked;
    jsonobjects[id].sun = formArray["sun"].checked;

    printJSON();
}
function newEntryClick() {
    // First create a new JSON object with entryNum set to counter, other values as null
    var newEntry = {
        "entryNum": counter, "destinationtime": null, "availabletime": null,
        "departurelocation": null,
        "addStrt": null, "city": null,    // Address
        "state": null, "zip": null,
        "mon": null, "tues": null, "wed": null, "thurs": null, "fri": null, "sat": null, "sun": null
    };
    // Add it to the JSON list
    jsonobjects.push(newEntry);

    // Create div which displays the new form for the new entry
    var div = "<div id=" + "entry" + newEntry.entryNum + ">" +
        "<hr>" +
        "<h4>Entry " + (counter + 1) + "</h4>" +
        "<form name=\"form" + counter + "\">Desired Arrival time:<input type=\"time\" name=\"destinationtime\" min=\"0.0\" max=\"24:00\"> <br>" +
        "Earliest Availability:<input type=\"time\" name=\"availabletime\" min=\"0.0\" max\"24:00\"> (Maximum 2 hours before desired arrival time.) <br>" +
        "Departure Location: <input type=\"radio\" name=\"departurelocation\" checked> Home" +
        "<input type=\"radio\" name=\"departurelocation\"> Other <br>" +
        "Other Location Address:<p>StreetAddress:<input type=\"text\" name=\"addStrt\">City:<input type=\"text\" name=\"city\"></p>" +
        "<p>State:<select name=\"state\">" +
            "<option value=\"AL\">Alabama - AL</option>" +
            "<option value=\"AK\">Alaska - AK</option>" +
            "<option value=\"AZ\">Arizona - AZ</option>" +
            "<option value=\"AR\">Arkansas - AR</option>" +
            "<option value=\"CA\">California - CA</option>" +
            "<option value=\"CO\">Colorado - CO</option>" +
            "<option value=\"CT\">Connecticut - CT</option>" +
            "<option value=\"DE\">Delaware - DE</option>" +
            "<option value=\"FL\">Florida - FL</option>" +
            "<option value=\"GA\">Georgia - GA</option>" +
            "<option value=\"HI\">Hawaii - HI</option>" +
            "<option value=\"ID\">Idaho - ID</option>" +
            "<option value=\"IL\">Illinois - IL</option>" +
            "<option value=\"IN\">Indiana - IN</option>" +
            "<option value=\"IA\">Iowa - IA</option>" +
            "<option value=\"KS\">Kansas - KS</option>" +
            "<option value=\"KY\">Kentucky - KY</option>" +
            "<option value=\"LA\">Louisiana - LA</option>" +
            "<option value=\"ME\">Maine - ME</option>" +
            "<option value=\"MD\">Maryland - MD</option>" +
            "<option value=\"MA\">Massachusetts - MA</option>" +
            "<option value=\"MI\">Michigan - MI</option>" +
            "<option value=\"MN\">Minnesota - MN</option>" +
            "<option value=\"MS\">Mississippi - MS</option>" +
            "<option value=\"MO\">Missouri - MO</option>" +
            "<option value=\"MT\">Montana - MT</option>" +
            "<option value=\"NE\">Nebraska - NE</option>" +
            "<option value=\"NV\">Nevada - NV</option>" +
            "<option value=\"NH\">New Hampshire - NH</option>" +
            "<option value=\"NJ\">New Jersey - NJ</option>" +
            "<option value=\"NM\">New Mexico - NM</option>" +
            "<option value=\"NY\">New York - NY</option>" +
            "<option value=\"NC\">North Carolina - NC</option>" +
            "<option value=\"ND\">North Dakota - ND</option>" +
            "<option value=\"OH\">Ohio - OH</option>" +
            "<option value=\"OK\">Oklahoma - OK</option>" +
            "<option value=\"OR\">Oregon - OR</option>" +
            "<option value=\"PA\">Pennsylvania - PA</option>" +
            "<option value=\"RI\">Rhode Island - RI</option>" +
            "<option value=\"SC\">South Carolina - SC</option>" +
            "<option value=\"SD\">South Dakota - SD</option>" +
            "<option value=\"TN\">Tennessee - TN</option>" +
            "<option value=\"TX\">Texas - TX</option>" +
            "<option value=\"UT\">Utah - UT</option>" +
            "<option value=\"VT\">Vermont - VT</option>" +
            "<option value=\"VA\">Virginia - VA</option>" +
            "<option value=\"WA\">Washington - WA</option>" +
            "<option value=\"WV\">West Virginia - WV</option>" +
            "<option value=\"WI\">Wisconsin - WI</option>" +
            "<option value=\"WY\">Wyoming - WY</option>" +
        "</select>Zip Code:<input type=\"number\" name=\"zip\"></p><br>" +
                "Days: (Must select at least one)<br>" +
        "<input type=\"checkbox\" name=\"mon\">Monday" +
        "<input type=\"checkbox\" name=\"tues\"> Tuesday" +
        "<input type=\"checkbox\" name=\"wed\"> Wednesday" +
        "<input type=\"checkbox\" name=\"thurs\"> Thursday" +
        "<input type=\"checkbox\" name=\"fri\">Friday" +
        "<input type=\"checkbox\" name=\"sat\">Saturday" +
        "<input type=\"checkbox\" name=\"sun\">Sunday <br>" +
        "<input type=\"button\" value=\"Save Entry\" onclick=addEntry(" + counter + ")>" +
    "</form><button onClick=\"newEntryClick()\">Add New Entry</button></div>";

    // Get the last entry's ID
    var lastEntry = "#entry" + (counter - 1);

    // Add the new div after the last entry form.
    $(lastEntry).after(div);

    counter++;
    printJSON();
    /*
     * <div id="entry0">
			<hr>
			<h4>Entry 1</h4>
            <form>
				Desired Arrival time:
				<input type="time" name="destinationtime"
					 min="0:00" max="24:00"> <br>
				Earliest Availability:
				<input type="time" name="availabletime"
					 min="0:00" max="24:00"> (Maximum 2 hours before desired arrival time.) <br>
				Departure Location: <input type="radio" name="home" value="home" checked> Home
				<input type="radio" name="other" value="other"> Other <br>
    */
}