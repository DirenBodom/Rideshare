Tasks accomplished:
-Create login form
-Demo design
-Signup page
-Created database with a table that contains the user id, name, and address

Update 1 (1/04/2019):
Removed "Hello World" href from opening page.
Signup sheet now adds a hard coded user to the database

Next features:
-Create php script where the form will post its information to.
	-This form should use REGEX to verify the input
	-Add the user to database.
	-If the user, places incorrect input, display appropiate error.
-Restructure directory to have private and public subfolrders. Place the page containning the users under private, as well as the stylesheet, and handler scripts.
 While the login, signup, and user page are public.

 Update 2 (2/26/2019)
Admin.php:
-Displays user full information
-Removes the from the database once clicking the "remove" button.

TODO:
- Still needs to refresh to show the database current state

Signup.php:
-Validates the first name, last name, email, user name, and password.
-Displays welcome screen after submission.
-Displays errors if input is incorrect or missing.
-Check whether user name exists.

TODO:
-Direct to main page.
-Check if the address entered exists.
-Change the default state to --

index.php
-Check whether user name and input
-Redirect to main page.
-Add forgotten password.
-Add pages on the bottom such as "About"