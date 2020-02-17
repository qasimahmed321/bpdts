# bpdts

This is A REST based API that uses the API hosted on  https://bpdts-test-app.herokuapp.com developed in PHP

# LONGITUDE AND LATIDUE 

Latidue and Longitude for London are listed as 51.509865, -0.118092 respectively. Distance calculations are done using the Harvesine forumla

All calculations are completed in miles.

All defined static variables are stored in core php class. 

# INSTALLATION
The application is entire standard php based, and can be installed on any LAMP server. PHP must have curl extension enabled to allow API calls.

# USAGE
There are 2 API endpoints. 

This call gets all users in London city
1. index.php?action=london_users&json=true

This call gets all users within 50 miles of London city
2. index.php?action=london_proximity&json=true

The JSON parameter can be set to true to return data in json format or false to return as PHP array 

# EXTENDING
All functions are made to be extendable. The target city can be changed in core.php class where you may change Lat and Long. Furthermore, distance from London is also editable in the parameter in indedx.php
