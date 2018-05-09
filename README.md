# Final-Project-CSCI3308

Feel the "Rush"
By: Boulder Connects

This is a anoymomous datting app where you can connect with people based on where you meet them. 
It keeps you and others anoynomous and only people who want to see and you want to see meet up.
This is a web based program at the moment but we are working on bringing a mobile versions for
more accurate information. 

Github Organization:
Our Github is layed out with everything you need for the application on the main branch, not in a folder. The only file you will need outside of these is saved within the MakeDatabases folder, and that is DB.sql to make the databases. Other than that, the other folders contain our milestone submissions.

Running the App:
Our application can easily be hosted on a local machine, all one needs is the ability to run/host php scripts, and mySQL. There is a file in the GitHub repository, under the MakeDatabase folder called DB.sql, if you copy this text into your mySQL workbench, it will create all the needed tables. Next, open up db.php and change the password/repository name to match that of the location you created the BoulderConnects schema above. Once this is changed, navigate to homepage.php in your browser. From here you can login, or create an account. When you are logged in the profile.php page should open. From here you can click create an event, which will open a tab for you to input information about your event. You can use this to search for other users. When you click find a match, it pulls up a list of your events, where you can search for other users based on. If you and another user enter enough information incommon, you will be displayed their name and email under the my matches tab.

