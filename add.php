<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="q.png" rel="icon">
  <title>SLIDA | QuotePro</title>
  <!-- Add your styles or link to a stylesheet here -->
  <style>
body {
    font: 62.5%/1 "Myriad Pro", Frutiger, "Lucida Grande", "Lucida Sans", "Lucida Sans Unicode", Verdana, sans-serif;
}

form {
    font-size: 1.4em;
    width: 40em;
}

/* fieldset styling */
fieldset {
    margin: 1em 0; /* space out the fieldsets a little */
    padding: 1em;
    border: 1px solid #ccc;
    background-color: #F5F5F5;
}

/* legend styling */
legend {
    font-weight: bold;
}

form p {
    position: relative;
    width: 100%;
}

label {
    float: left;
    width: 10em;
}

#remember-me label {
    width: 4em;
}

/* style for required labels */
label .required {
    font-size: 0.83em;
    color: #760000;
}

/* style error messages */
label .feedback {
    position: absolute;
    margin-left: 11em;
    left: 200px;
    right: 0;
    font-weight: bold;
    color: #760000;
    padding-left: 18px;
    background: url(https://www.devfuria.com.br/html-css/formularios/intro-formularios-web/error.png) no-repeat left top;
}

input {
    width: 200px;
}

input[type="text"],
textarea {
    border-top: 2px solid #999;
    border-left: 2px solid #999;
    border-bottom: 1px solid #ccc;
    border-right: 1px solid #ccc;
}

input[type="radio"],
input[type="checkbox"],
input[type="submit"] {
    width: auto;
}

/* style form elements on focus */
input:focus,
textarea:focus {
    background: #ffc;
}

input[type="radio"] {
    float: left;
    margin-right: 1em;
}

textarea {
    width: 300px;
    height: 100px;
}

/* entradas facilitada para campo data */
#monthOfBirthLabel,
#yearOfBirthLabel {
    text-indent: -1000em;
    width: 0;
}

#dateOfBirth {
    width: 3em;
    margin-right: 0.5em;
}

#monthOfBirth {
    width: 10em;
    margin-right: 0.5em;
}

#yearOfBirth {
    width: 5em;
}

/* pequeno layout de 2 colunas para checkboxe's*/
#favoriteColor {
    margin: 0;
    padding: 0;
    border: none;
    background: transparent;
}

#favoriteColor h2 {
    width: 10em;
    float: left;
    font-size: 1em;
    font-weight: normal;
}

#favoriteColor div {
    width: 8em;
    float: left;
}

#favoriteColor label {
    width: 3em;
    float: none;
    display: inline;
}

#favoriteColor p {
    margin: 0.3em 0;
}

  </style>
</head>
<body>

<center><form id="comments_form" action="#" method="post">
    <fieldset>
        <legend>Lecture Hall Charges</legend>
        <p>
            <label for="author">Hall Name: <span class="required">(Required)</span></label>
            <input name="hname" id="hname" type="text" />
        </p>
        <p>
            <label for="email">Hall Charge (Per 8 hrs): </label>
            <input name="hcharge" id="hcharge" type="text" />
        </p>
        <p>
            <label for="url">No of Days:</label>
            <input name="nod" id="nod" type="text" />
        </p>
        <p>
            <label for="url">No of Days:</label>
            <input name="nod" id="nod" type="text" />
        </p>
    </fieldset>
    <fieldset>
        <legend>Personal Information</legend>
        <p>
            <label for="placeOfBirth">Place of Birth: </label>
            <select name="placeOfBirth" id="placeOfBirth">
                <option value="USA" selected="selected">USA</option>
                <option value="UK">United Kingdom</option>
            </select>
        </p>
        <p>
            <label for="dateOfBirth">Date of Birth:</label>
            <input name="dateOfBirth" id="dateOfBirth" type="text"  />
            <label id="monthOfBirthLabel" for="monthOfBirth">Month of Birth:</label>
            <select name="monthOfBirth" id="monthOfBirth">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
            </select>
            <label id="yearOfBirthLabel" for="yearOfBirth">Year of Birth:</label>
            <input name="yearOfBirth" id="yearOfBirth" type="text" />
        </p>
        <fieldset id="favoriteColor">
            <legend>Favorite Color:</legend>
            <div>
                <p>
                    <input id="red" name="red" type="checkbox" value="red" />
                    <label for="red">red</label>
                </p>
                <p>
                    <input id="yellow" name="yellow" type="checkbox" value="yellow" />
                    <label for="yellow">yellow</label>
                </p>
                <p>
                    <input id="pink" name="pink" type="checkbox" value="pink" />
                    <label for="pink">pink</label>
                </p>
                <p>
                    <input id="green" name="green" type="checkbox" value="green" />
                    <label for="green">green</label>
                </p>
            </div>
            <div>
                <p>
                    <input id="orange" name="orange" type="checkbox" value="orange" />
                    <label for="orange">orange</label>
                </p>
                <p>
                    <input id="purple" name="purple" type="checkbox" value="purple" />
                    <label for="purple">purple</label>
                </p>
                <p>
                    <input id="blue" name="blue" type="checkbox" value="blue" />
                    <label for="blue">blue</label>
                </p>
                <p>
                    <input id="other" name="other" type="checkbox" value="other" />
                    <label for="other">other</label>
                </p>	
            </div>
        </fieldset>
    </fieldset>
    <fieldset>
        <legend>Comments</legend>
        <p>
            <label for="text">Message: <span class="required">(Required)</span></label>
            <textarea name="text" id="text" cols="20" rows="10"></textarea>
        </p>
    </fieldset>
    <fieldset id="remember-me">
        <legend>Remember Me</legend>
        <p>
            <input id="remember-yes" name="remember" type="radio" value="yes" />
            <label for="remember-yes">Yes</label>
        </p>
        <p>
            <input id="remember-no" name="remember" type="radio" value="no" checked="checked" />
            <label for="remember-no">No</label>
        </p>
    </fieldset>
    <p><input id="submit" name="submit" type="submit"/></p>
</form></center>

</body>
</html>
